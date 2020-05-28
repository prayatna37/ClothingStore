<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://js.stripe.com/v3/"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('assets/css/custom.css')}}" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- @yield('stripe-js') --}}
</head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="font-size:18px;">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/products">Products</a>
                            </li>                                                       
                            <li class="nav-item">
                                <a class="nav-link" href="/products/men">Men</a>
                            </li>   
                            <li class="nav-item">
                                <a class="nav-link" href="/products/women">Women</a>
                            </li>   
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>    
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>                      --}}
                        </ul>
                       

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                               
                            </li> 
                            
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            <p id="" style="font-size:18px;" class="nav-link" v-pre>
                                {{ Auth::user()->name }} 
                            </p>
                                <a class="nav-link" href="/cart">
                                    @if (Cart::instance('default')->count()>0)
                                        <span>Cart<sup>{{Cart::instance('default')->count()}}</sup></span>
                                    @else
                                    <span>Cart</span>
                                    
                                    @endif
                                    
                                </a>
                                <li class="">
                                   

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>

            @include('layouts.footer')
            
        </div>

        <script src="{{URL::to('assets/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{URL::to('assets/js/jquery.slicknav.js')}}"></script>
        <script src="{{URL::to('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::to('assets/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{URL::to('assets/js/mixitup.min.js')}}"></script>
        <script src="{{URL::to('assets/js/main.js')}}"></script>
        @yield('extra-js')
    </body>
</html>
