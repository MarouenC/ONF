<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overall.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href ="{{ url("/") }}" class="navbar-brand"><img src="/personal_images/logo no background.png" alt="onf-logo" style=" height: 2.7rem;" ></a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <form class="d-flex" method="GET" action="{{ url("/product") }}">
                            <input class="form-control search-bar" name="search" type="search" placeholder="Search Product" aria-label="Search" >
                            <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search "></i></button>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                                <li class="nav-item-danger mx-1">
                                    <a class="nav-link" aria-current="page" href="{{ url("/") }}">Home</a>
                                </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if(auth()->user()->role=='admin')
                            <li class="nav-item-danger mx-1">
                                <a href="\profile" class="nav-link" aria-current="page" >users</a>
                            </li>
                            @endif
                            <li class="nav-item-danger mx-1">
                                <a href="\cart\{{ Auth::user()->id }}" class="nav-link" aria-current="page" ><i class="bi bi-cart-fill "></i> Cart</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                                        profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <li class="nav-item makePost mx-1">
                                <a href ="{{ url('/product/create') }}" button type="button " class="btn btn-danger add-product-link"><span>+ Add Product</span></a> </button>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top:4rem;">
            @yield('content')
        </main>
        <!--footer-->
        <div class="container pt-5 ">
            <footer class="row ">
            <div class="col-2"><p><a class="footer-link" href="#">Help</a></p></div>
            <div class="col-2"><p><a class="footer-link" href="#">Contact us</a></p></div>
            <div class="col-2"><p><a class="footer-link" href="#">Conditions of Use</a></p></div>
            <div class="col-2"><p><a class="footer-link" href="#">Privacy Notice</a></p></div>
            <div class="col-2"><p><a class="footer-link" href="#">Homepage</a></p></div>
            <div class="col-2"><p> &copy; 2022  Onf.com, Inc. or its affiliates</p></div>
            </footer>
        </div>
    </div>
</body>
</html>
