@extends('layouts.app')
@section('content')

    <div class="container">
        @include('partials.success')
        
        <div class="row d-flex justify-content-center">
            <h2>ThankYou For Your Order!</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <h4>Hope You had a wonderful Shopping Experience</h4>
        </div>
        <div class="row d-flex justify-content-center">
            <h3><a href="/" class="btn btn-outline-dark">Continue Shopping</a></h3>
        </div>
    </div>


@endsection 