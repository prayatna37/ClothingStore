@extends('layouts.app')
@section('content')
<section class="hero-slider">
    <div class="hero-items owl-carousel">
        <div class="single-slider-item set-bg" data-setbg="{{URL::to('assets/img/slider-1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>2019</h1>
                        <h2>Lookbook.</h2>
                        {{-- <a href="#" class="primary-btn">See More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider-item set-bg" data-setbg="{{URL::to('assets/img/slider-2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>2019</h1>
                        <h2>Lookbook.</h2>
                        {{-- <a href="#" class="primary-btn">See More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider-item set-bg" data-setbg="{{URL::to('assets/img/slider-3.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>2019</h1>
                        <h2>Lookbook.</h2>
                        {{-- <a href="#" class="primary-btn">See More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Features Section Begin -->
  <section class="features-section spad">
    <div class="features-ads">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-features-ads first">
                        <img src="{{URL::to('assets/img/icons/f-delivery.png')}}" alt="">
                        <h4>Free shipping</h4>
                        <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                            esuada aliquet libero viverra cursus. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-features-ads second">
                        <img src="{{URL::to('assets/img/icons/coin.png')}}" alt="">
                        <h4>100% Money back </h4>
                        <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                            aliquet libero viverra cursus. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-features-ads">
                        <img src="{{URL::to('assets/img/icons/chat.png')}}" alt="">
                        <h4>Online support 24/7</h4>
                        <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                            aliquet libero viverra cursus. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- Features Box -->
    <div class="features-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-box-item first-box">
                                <img src="{{URL::to('assets/img/f-box-1.jpg')}}" alt="">
                                <div class="box-text">
                                    <span class="trend-year">2019 Party</span>
                                    <h2>Jewelry</h2>
                                    <span class="trend-alert">Trend Allert</span>
                                    <a href="#" class="primary-btn">See More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-box-item second-box">
                                <img src="{{URL::to('assets/img/f-box-2.jpg')}}" alt="">
                                <div class="box-text">
                                    <span class="trend-year">2019 Trend</span>
                                    <h2>Footwear</h2>
                                    <span class="trend-alert">Bold & Black</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-box-item large-box">
                        <img src="{{URL::to('assets/img/f-box-3.jpg')}}" alt="">
                        <div class="box-text">
                            <span class="trend-year">2019 Party</span>
                            <h2>Collection</h2>
                            <div class="trend-alert">Trend Allert</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
<!-- Features Section End -->


 <!-- Latest Product Begin -->
 <section class="latest-products spad">
    <div class="container">
        <div class="product-filter">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Latest Products</h2>
                    </div>
                    <ul class="product-controls">
                        <li data-filter="*"><a class="" href="/products">Women</a></li>
                        <li data-filter=".dresses"><a class="" href="/products/men">Men</a></li>
                        <li data-filter=".bags"><a class="" href="/products/women">Women</a></li>
                        {{-- <li data-filter=".shoes">Shoes</li>
                        <li data-filter=".accesories">Accesories</li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" id="product-list">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="single-product-item">
                        <figure class="product-overview">
                            <a href="/product/details/{{$product->id}}">
                                <img src="/storage/{{$product->image}}" alt="">
                            </a>                            
                        </figure>
                        <div class="product-text">
                            <a href="{{route('product.details',[$product->id])}}">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <p><span></span>{{$product->presentPrice()}}</p>
                        </div>
                    </div>
                </div>
            @endforeach  
                     
                       
        </div>
    </div>
</section>
<!-- Latest Product End -->

@endsection