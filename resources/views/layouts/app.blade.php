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
            <div class="footer-offer">
                <div class="container">
                    <div class="row">
                        <div class="text-center footer-off-msg">
                            <span>Win a contest! Get this limited-editon</span>
                            <a href="#" target="_blank">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top section-space-footer-p">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 ec-footer-contact">
                            <div class="ec-footer-widget">
                                <div class="ec-footer-logo"><a href="#"><img src="assets/images/logo/footer-logo.png"
                                            alt=""><img class="dark-footer-logo" src="assets/images/logo/dark-logo.png"
                                            alt="Site Logo" style="display: none;" /></a></div>
                                <h4 class="ec-footer-heading">Contact us</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">71 Pilgrim Avenue Chevy Chase, east california.</li>
                                        <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+2349082388267">+234 908 238 8267</a></li>
                                        <li class="ec-footer-link"><span>Email:</span><a href="#"><span class="__cf_email__" data-cfemail="">info@mavirgostore.com.ng</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-info">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Information</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="">About us</a></li>
                                        <li class="ec-footer-link"><a href="">FAQ</a></li>
                                        <li class="ec-footer-link"><a href="">Delivery Information</a></li>
                                        <li class="ec-footer-link"><a href="">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-account">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Account</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="">My Account</a></li>
                                        <li class="ec-footer-link"><a href="">Order History</a></li>
                                        <li class="ec-footer-link"><a href="">Wish List</a></li>
                                        <li class="ec-footer-link"><a href="">Specials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Services</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="">Discount Returns</a></li>
                                        <li class="ec-footer-link"><a href="">Policy & policy </a></li>
                                        <li class="ec-footer-link"><a href="">Customer Service</a></li>
                                        <li class="ec-footer-link"><a href="">Term & condition</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 ec-footer-news">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Newsletter</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">Get instant updates about our new products and
                                            special promos!</li>
                                    </ul>
                                    <div class="ec-subscribe-form">
                                        <form id="ec-newsletter-form" name="ec-newsletter-form" method="post"
                                            action="#">
                                            <div id="ec_news_signup" class="ec-form">
                                                <input class="ec-email" type="email" required=""
                                                    placeholder="Enter your email here..." name="ec-email" value="" />
                                                <button id="ec-news-btn" class="button btn-primary" type="submit" name="subscribe" value="">
                                                    <i class="ecicon eci-paper-plane-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <div class="ec-copy">Copyright © 2021-2022
                                    <a class="site-name text-upper" href="#">Mavirgo<span>.Store</span></a>. All Rights Reserved</div>
                            </div>
                        </div>

                        <div class="col footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-end">
                                <div class="payment-link">
                                    <img src="assets/images/icons/payment.png" alt="">
                                </div>

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

    <div class="ec-style ec-right-bottom">
        <div class="ec-panel">
            <div class="ec-header">
                <strong>Need Help?</strong>
                <p>Chat with us on WhatsApp</p>
            </div>
            <div class="ec-body">
                <ul>
                    <li>
                        <a class="ec-list" data-number="2349082388267"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <div class="ec-img-cont">
                                    <img src="{{ asset('assets/images/whatsapp/profile_01.jpg')}}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon"></span>
                                </div>
                                <div class="ec-user-info">
                                    <span>Anthony Okagba</span>
                                    <p>Anthony left 2 mins ago</p>
                                </div>
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ec-right-bottom">
            <div class="ec-box">
                <div class="ec-button rotateBackward">
                    <img class="whatsapp" src="{{ asset('assets/images/common/whatsapp.png')}}" alt="whatsapp icon">
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
