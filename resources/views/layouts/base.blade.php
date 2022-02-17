<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Mavirgo Store</title>
    <meta name="keywords" content="apparel, catalog, clean, fashion, shops" />
    <meta name="description" content="Best ecommerce website for single and multi vendor store.">
    <meta name="author" content="Anthony Okagba">

    <!-- site Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />

    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ecicons.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nouislider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/demo1.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}" />

    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('assets/css/backgrounds/bg-4.css')}}">
</head>
@if (request()->is('shop'))
    <body class="shop_page">
@elseif (request()->is('checkout'))
    <body class="checkout_page">
@else
    <body class="product_page">
@endif
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <header class="ec-header">

        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Free Shipping</span>This Week Order Over - $75
                        </div>
                    </div>

                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">

                            <div class="header-top-curr dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                    <li><a class="dropdown-item" href="#">EUR €</a></li>
                                </ul>
                            </div>

                            <div class="header-top-lan dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">State <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">Abuja</a></li>
                                    <li><a class="dropdown-item" href="#">Lagos</a></li>
                                    <li><a class="dropdown-item" href="#">Enugu</a></li>
                                    <li><a class="dropdown-item" href="#">Anamber</a></li>
                                    <li><a class="dropdown-item" href="#">Imo</a></li>
                                    <li><a class="dropdown-item" href="#">PH</a></li>
                                    <li><a class="dropdown-item" href="#">Delta</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col d-lg-none ">
                        <div class="ec-header-bottons">

                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                    src="{{asset('assets/images/icons/user.svg')}}" class="svg_img header_svg" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @guest
                                        @if (Route::has('register'))
                                            <li>
                                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('checkout')}}">Checkout</a></li>
                                        @if (Route::has('login'))
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        @if(Auth::user()->utype === 'ADM')
                                            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">{{Auth::user()->name}}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('checkout')}}">Checkout</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @elseif(Auth::user()->utype === 'USR')
                                            <li><a class="dropdown-item" href="{{route('user.dashboard')}}">{{Auth::user()->name}}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('checkout')}}">Checkout</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @endif
                                    @endguest
                                </ul>
                            </div>

                            <a href="{{ route('cart') }}" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon">
                                    <img src="{{asset('assets/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" />
                                </div>
                                @if (Cart::count() > 0)
                                    <span class="ec-header-count cart-count-lable">
                                        {{Cart::count()}}
                                    </span>
                                @endif
                            </a>

                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="{{asset('assets/images/icons/menu.svg') }}" class="svg_img header_svg" alt="icon" />
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('pages.header-search')
                
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{route('shop')}}">Products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="{{route('shop')}}">Products</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Elements</a></li>
                        <li><a href="#">Hot Offers</a></li>
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="ec-footer section-space-mt">
        <div class="footer-container">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col text-left footer-bottom-left">
                            <div class="footer-bottom-social">
                                <span class="social-text text-upper">Follow us on:</span>
                                <ul class="mb-0">
                                    <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col text-center footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="ec-copy">Copyright © 2022
                                    <a class="site-name text-upper" href="#">Store</a>. All Rights Reserved</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle">
                        <img src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                    </a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{route('cart')}}" class="toggle-cart ec-header-btn ec-side-toggle">
                        <img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="icon" />
                        @if (Cart::count() > 0)
                            <span class="ec-cart-noti ec-header-count cart-count-lable">
                                {{Cart::count()}}
                            </span>
                        @endif
                    </a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="/" class="ec-header-btn">
                        <img src="assets/images/icons/home.svg" class="svg_img header_svg" alt="icon" />
                    </a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{route('cart')}}" class="ec-header-btn">
                        <img src="assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="icon" />
                        <span class="ec-cart-noti">
                            @if (Cart::count() > 0)
                                {{Cart::count()}}
                            @endif
                        </span>
                    </a>
                </div>
                <div class="ec-nav-panel-icons">
                    @guest
                        <a class="ec-header-btn" href="{{route('login')}}"></a>
                        <img src="assets/images/icons/user.svg" class="svg_img header_svg" alt="icon" />
                    @else
                        @if(Auth::user()->utype === 'ADM')
                            <a class="ec-header-btn" href="{{route('admin.dashboard')}}"></a>
                                <img src="assets/images/icons/user.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                        @elseif(Auth::user()->utype === 'USR')
                            <a class="ec-header-btn" href="{{route('user.dashboard')}}"></a>
                                <img src="assets/images/icons/user.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                        @endif
                    @endguest
                </div>

            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

    <!--Plugins JS-->
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/countdownTimer.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/infiniteslidev2.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>

    <!-- Main Js -->
    <script src="{{ asset('assets/js/vendor/index.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>
