@extends('layouts.app')
@section('content')
      <!-- Product Page Section Beign -->      
    <div class="container">        
        <div class="row">
            <div class="col-lg-6">               
                <div class="product-img">
                    <figure>
                        <img src="/storage/{{$product->image}}" alt="">                        
                    </figure>
                </div> 
                        
            </div>
            <div class="col-lg-6">
                <div class="product-content">
                    <h2>{{$product->name}}</h2>
                    <div class="pc-meta">
                        <h5>{{$product->presentPrice()}}</h5>                        
                    </div>
                    <p>{{$product->description}}</p>
                    <ul class="tags">
                        <li><span>Category :</span> {{$product->category}}</li>
                        <li><span>Size :</span> {{$product->size}}</li>
                        @if($product->quantity)
                            <li><span style="color:#39FF14;">Available</span></li>                         
                                
                        @else
                            <li><span style="color:red;">Out Of Stock</span></li>                                 
                        @endif
                    </ul>
                    {{-- <div class="product-quantity">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="0" name="quantity" id="">
                        </div>
                    </div>                     --}}
                    <form action="{{route('cart.store')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <select class="custom-select" name="size">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="arge">Large</option>
                            <option value="extralarge">Extra Large</option>
                        </select>

                        @if (Auth::check())
                            <div class="row mt-4 ml-1">
                                @include('partials.success')
                                @include('partials.error')
                            </div>
                            @if($product->quantity)
                                                    
                                
                            <button type="submit" class="primary-btn pc-btn mt-4">Add to Cart</button>
                            <a class="ml-3 primary-btn pc-btn mt-4" href="/cart">
                                @if (Cart::instance('default')->count()>0)
                                    <span>Goto Cart<sup>{{Cart::instance('default')->count()}}</sup></span>
                                @else
                                <span>Goto Cart</span>
                                
                                @endif
                                
                            </a>
                            @endif
                            
                                               
                        @else
                            <a href="/login" class="primary-btn pc-btn mt-4">Login In to Buy</a></li>
                        @endif
                        
                                            
                            
                        
                    </form>                 
                </div>
            </div>
        </div>
    </div>

    <!-- Product Page Section End -->
@endsection