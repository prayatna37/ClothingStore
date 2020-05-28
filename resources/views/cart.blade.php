@extends('layouts.app')
@section('content')
       <!-- Cart Page Section Begin -->
     
           
       
    <div class="cart-page">
        <div class="container">
            @include('partials.success')
            @include('partials.error')
            <div class="row">
                <div class="col-md-12">
                    @if (Cart::count()>0)
                    <h2>{{Cart::count()}} items in Cart</h2>
                </div>
            </div>
            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <table class="table" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th scope="col" class="product-h">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="quan">Quantity</th>
                            <th scope="col">Options</th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-col">
                            <a href="{{route('product.details', $item->id)}}">
                                <img src="../storage/{{$item->model->image}}" class="mb-2" alt="">                            
                            {{-- <div class="p-title"> --}}
                            <a class="" href="{{route('product.details', $item->id)}}"><h6>{{$item->name}}</h6></a>
                            {{-- </div> --}}
                            </td>
                        
                            <td class="price-col">{{$item->model->presentPrice()}}</td>
                            <td class="">                                                                  
                                <div class="form-group">                                   
                                    <select class="ml-4 quantity" data-id="{{$item->rowId}}">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                            
                                
                            </td>
                            {{-- <td class="total">{{$item->size}} --}}
                            </td>
                            <td class="product-close">
                                <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger pull-left">Remove</button>
                                </form>

                                <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}                                
                                    <button type="submit" class=" btn btn-outline-dark pull-right">Save For Later</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
                
            </div>
            <hr style="border:1px solid black;">
            <div class="row mt-4">                
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th>Subtotal</th>
                            <td>  {{Cart::Subtotal()}}</td>
                            {{-- <td>  {{ presentPrice(Cart::Subtotal())}}</td> --}}    
                           
                        </tr>
                        <tr>
                          <th>Tax (13%)</th>
                            <td>Rs. {{Cart::tax()}}</td>
                            
                        </tr>
                        <tr>
                          <th>Total</th>
                            <td>Rs. {{Cart::total()}}</td>
                            
                        </tr>                        
                    </tbody>
                </table>
                
            </div>
            <hr style="border:1px solid black;">
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        {{-- <div class="coupon-input">
                            <input type="text" placeholder="Enter cupone code">
                        </div> --}}
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <a href="{{route('cart.clear')}}" class="btn btn-outline-dark mr-3">Clear Cart</a>
                        <a href="{{route('checkout.index', Auth::user()->id)}}" class="btn btn-outline-success">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @else
                    <h3 class="pull-left">No items in cart</h3>
                    <h3 class="pull-right"><a href="/" class="btn btn-outline-dark">Continue Shopping</a></h3>
                    @endif
                </div>
            </div>
            <hr style="border:1px solid black;">
            @if (Cart::instance('saveForLater')->count()>0)
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ Cart::instance('saveForLater')->count() }} items Saved For Later</h2>
                    </div>                    
                </div>
                <div class="row">
                    @foreach (Cart::instance('saveForLater')->content() as $item)
                    <div class="col-md-4">                    
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <img src="/storage/{{$item->model->image}}" class="card-image" alt="">
                                <h5 class="card-title mt-2"><a href="{{route('product.details', $item->id)}}"><h5>{{$item->name}}</h5></a></h5>
                                 <p class="card-text">{{$item->model->presentPrice()}}</p>
                                 <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
            
                                    <button type="submit" class="btn btn-outline-danger pull-left">Remove</button>
                                </form>
            
                                <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
            
                                    <button type="submit" class="btn btn-outline-dark pull-right">Move to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>                    
                    @endforeach
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-8">
                    <a href="{{route('saveForLater.clear')}}" class="btn btn-outline-dark">Clear Save For Later</a>
                    </div>
                </div>
                

            @else
            <div class="row">
                <div class="col-md-12">
                    <h3>No Items Saved For Later</h3>
                </div>
            </div>
                   
            @endif
        </div> 

    </div>

       
            
       
    <!-- Cart Page Section End -->
@endsection
@section('extra-js')
    <script src="path/to/vanilla.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id= element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href='{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            })
        })();
    </script>
    
@endsection