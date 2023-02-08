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
       <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <h6>Get connected with us on social networks:</h6>
                    </div>
                <!-- Left -->
        
                <!-- Right -->
                <div>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #3b5998;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-facebook"></i></a>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #55acee;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-twitter"></i
                    ></a>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #dd4b39;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-google"></i
                    ></a>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #ac2bac;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-instagram"></i
                    ></a>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #0082ca;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-linkedin"></i>
                    </a>
                    <a
                        class="btn text-white btn-floating m-1"
                        style="background-color: #333333;"
                        href="#!"
                        role="button"
                        ><i class="bi bi-github"></i
                    ></a>
                </div>
            </section>
            <!-- Right -->
            <!-- Section: Social media -->
    
            <!-- Section: Links  -->
            <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>Onf
                    </h6>
                    <p style="font-size:0.8rem;">
                    On and Off is a website that allows customers to make any online selling announcements with no restrictions.
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    tools used
                    </h6>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Php</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">bootstrap</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    Useful links
                    </h6>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p style="font-size:0.8rem;">
                    <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p style="font-size:0.8rem;"><i class="fa fa-institution"></i> Lafayette, Tunis, Tunisie</p>
                    <p style="font-size:0.8rem;">
                        <i class="fa fa-envelope"></i> 
                    marouen@gmail.com
                    </p>
                    <p style="font-size:0.8rem;"><i class="bi bi-phone"></i> + 216 234 567 88</p>
                    <p style="font-size:0.8rem;"><i class="bi bi-telephone"></i> + 216 234 567 89</p>
                </div>
                <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            </section>
            <!-- Section: Links  -->
    
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://onf.com/">onf.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>
</html>
