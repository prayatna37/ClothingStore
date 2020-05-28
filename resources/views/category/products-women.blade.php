@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2 d-flex justify-content-center">
                <h1>Women's Products</h1>
            </div>
            @foreach ($products as $product)   
             
                @if ($product->category=='women')  
                <div class="col-md-4">
                    <div class="single-product-item">
                        <figure class="product-overview">
                            <a href="/product/details/{{$product->id}}">
                                <img src="../storage/{{$product->image}}" alt="">
                            </a>                            
                        </figure>
                        <div class="product-text">
                            <a href="{{route('product.details',[$product->id])}}">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <p>{{$product->presentPrice()}}</>
                        </div>
                    </div>
                </div>
                @endif   

               
            
            
            @endforeach
        </div>
        <div class="col-md-12">
            {{$products->links()}}
        </div>
    </div>
 
@endsection