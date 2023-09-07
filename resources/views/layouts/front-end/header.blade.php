<header class="pb-md-4 pb-0">

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>
                        <a href="/" class="web-logo nav-logo">
                            <img src="{{ getimage('logos',$setting->logo_shop)}}" class="img-fluid blur-up lazyload" alt="">
                        </a>
                          <h3> {{ $setting->name_shop??'' }}</h3>


                        {{-- <div class="middle-box">

                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="I'm searching for..."
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}

                        <div class="rightside-box">
                            {{-- <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div> --}}
                            <ul class="right-side-menu">
                                {{-- <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                {{-- <li class="right-side">
                                    <a href="contact-us.html" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="phone-call"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>24/7 Delivery</h6>
                                            <h5>+91 888 104 2340</h5>
                                        </div>
                                    </a>
                                </li> --}}
                                <li class="right-side">
                                    <a href="{{ route('wishlist') }}" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                                <li class="right-side">

                                    @livewire('front.cart.headercart')
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        {{-- <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div> --}}
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            @guest('client')
                                                <li class="product-box-contain">
                                                    <a href="/login">{{ __('front.login') }}</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="/sign-up">{{ __('front.register') }}</a>

                                                </li>
                                            @endguest
                                            @auth('client')
                                                <li class="product-box-contain">
                                                    <a  href="{{ route('clientlogout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('front.logout') }}</a>
                                                        <form id="logout-form" action="{{ route('clientlogout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="/user/dashboard">حسابى</a>
                                                </li>
                                            @endauth

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        {{--  <button class="dropdown-category">
                            <i data-feather="align-left"></i>
                            <span>الاقسام</span>
                        </button>--}}

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                <li class="onhover-category-list">
                                    <a href="{{route('categoryproduct',['categoryid'=>null])}}" class="category-name">
                                        {{-- <img src="../assets/svg/1/vegetable.svg" alt=""> --}}
                                        <h6>الكل</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>


                                </li>
                                @foreach ( $categorys as $item )
                                <li class="onhover-category-list">
                                    <a href="{{route('categoryproduct',['categoryid'=>$item->id])}}" class="category-name">
                                        {{-- <img src="../assets/svg/1/vegetable.svg" alt=""> --}}
                                        <h6>{{$item->category_name}}</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>


                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">

                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/">{{ __('front.home') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/products/offers">{{ __('front.offers') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/product/search">{{ __('front.search') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/gallery">{{ __('front.gellary') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/about">{{ __('front.about') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="/contactus">{{ __('front.contactus') }}</a>
                                        </li>
                                        @auth('client')
                                            <li class="nav-item dropdown">
                                                <a class="nav-link" href="/user/dashboard">{{ __('front.myaccount') }}</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="header-nav-right">
                        <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                            <i data-feather="zap"></i>
                            <span>Deal Today</span>
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
