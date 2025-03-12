<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                support@email.com
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                +012-345-6789
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->
@php
    $collection = collect(session('carts'));
@endphp
<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}">@lang('menu.home')</a>
                    <a href="{{ route('products') }}"
                        class="nav-item nav-link {{ Request::routeIs('products') ? 'active' : '' }}">{{ __('menu.product') }}</a>
                    <a href="{{ route('cart') }}"
                        class="nav-item nav-link {{ Request::routeIs('cart') ? 'active' : '' }}">{{ __('menu.cart') }}</a>
                    <a href="{{ route('checkout') }}"
                        class="nav-item nav-link {{ Request::routeIs('checkout') ? 'active' : '' }}">{{ __('menu.checkout') }}</a>
                    <a href="{{ route('my-account') }}"
                        class="nav-item nav-link {{ Request::routeIs('my-account') ? 'active' : '' }}">{{ __('menu.myaccount') }}</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-toggle="dropdown">{{ __('menu.morepages') }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('wishlist') }}" class="dropdown-item">{{ __('menu.wishlist') }}</a>
                            <a href="{{ route('login') }}" class="dropdown-item">{{ __('menu.login') }}</a>
                            <a href="{{ route('contact') }}" class="dropdown-item">{{ __('menu.contact') }}</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-toggle="dropdown">{{ __('menu.userAccount') }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('register') }}" class="dropdown-item">{{ __('menu.register') }}</a>
                            @auth
                                <a href="{{ route('logout') }}" class="dropdown-item">{{ __('menu.logout') }}</a>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item">{{ __('menu.login') }}</a>
                            @endauth
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-toggle="dropdown">{{ __('menu.languages') }}</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('selectLang', 'vi') }}" class="dropdown-item">VI</a>
                            <a href="{{ route('selectLang', 'en') }}" class="dropdown-item">EN</a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('front/img/logo.png') }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="wishlist.html" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="{{ route('cart') }}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>({{ $collection->count() }})</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->
