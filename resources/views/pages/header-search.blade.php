<div class="ec-header-bottom d-none d-lg-block">
    <div class="container position-relative">
        <div class="row">
            <div class="ec-flex">

                <div class="align-self-center">
                    <div class="header-logo">
                        <a href="/"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Site Logo" /><img
                                class="dark-logo" src="{{asset('assets/images/logo/dark-logo.png')}}" alt="Site Logo"
                                style="display: none;" /></a>
                    </div>
                </div>

                <div class="align-self-center">
                    <div class="header-search">
                        <form class="ec-btn-group-form" method="GET" action="{{route('product.search')}}">
                            @csrf
                            <input class="form-control" name="search" placeholder="Enter Your Product Name..." type="text">
                            <button class="submit" type="submit"><img src="{{asset('assets/images/icons/search.svg')}}"
                                    class="svg_img header_svg" alt="" /></button>
                        </form>
                    </div>
                </div>

                <div class="align-self-center">
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

                        <a href="{{ route('cart')}}" class="ec-header-btn">
                            <div class="header-icon">
                                <img src="{{asset('assets/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" />
                            </div>
                            @if (Cart::count() > 0)
                                <span class="ec-header-count cart-count-lable">
                                    {{Cart::count()}}
                                </span>
                            @endif
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ec-header-bottom d-lg-none">
    <div class="container position-relative">
        <div class="row ">

            <div class="col">
                <div class="header-logo">
                    <a href="/"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Site Logo" /><img
                            class="dark-logo" src="{{asset('assets/images/logo/dark-logo.png')}}" alt="Site Logo"
                            style="display: none;" /></a>
                </div>
            </div>

            <div class="col">
                <div class="header-search">
                    <form class="ec-btn-group-form" method="GET" action="{{route('product.search')}}">
                        @csrf
                        <input class="form-control" name="search" placeholder="Enter Your Product Name..." type="text">
                        <button class="submit" type="submit"><img src="{{asset('assets/images/icons/search.svg')}}"
                                class="svg_img header_svg" alt="icon" /></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
