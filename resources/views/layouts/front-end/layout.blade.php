<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('layouts.front-end.head')
<body  class="theme-color-6">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('layouts.front-end.header')

    <!-- Header End -->

    <!-- mobile fix menu start -->
    @include('layouts.front-end.menumobile')
    <!-- mobile fix menu end -->

    <!-- Home Section Start -->
    @include('layouts.front-end.sliderbr')
    <!-- Home Section End -->

    <!-- product section start -->
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 d-none d-lg-block">
                    <div class="category-menu menu-xl">
                        <ul>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Vegetables & Fruit</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/cup.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Beverages</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/meats.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Meats & Seafood</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/breakfast.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Breakfast & Dairy</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/frozen.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Frozen Foods</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/biscuit.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Biscuits & Snacks</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/grocery.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Grocery & Staples</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/drink.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Wines & Alcohol Drinks</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/milk.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Milk & Dairies</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{asset('front/assets/svg/1/pet.svg')}}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Pet Foods</a>
                                    </h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="title d-block">
                        <h2 class="text-theme font-sm">Food Cupboard</h2>
                        <p>A virtual assistant collects the products from your list</p>
                    </div>
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{asset('front/assets/images/cake/product/3.png')}}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Peanut Butter Bite Premium Butter Cookies 600 g
                                        </h6>
                                    </a>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-btn-2 addtocart_btn">
                                        <button class="btn addcart-button btn buy-button"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <div class="cart_qty qty-box-2">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="1">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="title d-block">
                        <h2 class="text-theme font-sm">Food Cupboard</h2>
                        <p>A virtual assistant collects the products from your list</p>
                    </div>
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow">
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{asset('front/assets/images/cake/product/1.png')}}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Muffets & Tuffets Whole Wheat Bread 400 g
                                        </h6>
                                    </a>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-btn-2 addtocart_btn">
                                        <button class="btn addcart-button btn buy-button"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <div class="cart_qty qty-box-2">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="1">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->


    <!-- Footer Section Start -->
    @include('layouts.front-end.footer')
    <!-- Footer Section End -->

    <!-- Quick View Modal Box Start -->
    {{-- <div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-sm-4 g-2">
                        <div class="col-lg-6">
                            <div class="slider-image">
                                <img src="{{asset('front/assets/images/product/category/1.jpg')}}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-sidebar-modal">
                                <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                                <h4 class="price">$36.99</h4>
                                <div class="product-rating">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span class="ms-2">8 Reviews</span>
                                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                                </div>

                                <div class="product-detail">
                                    <h4>Product Details :</h4>
                                    <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                        Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                        Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                        muffin I love carrot cake sugar plum dessert bonbon.</p>
                                </div>

                                <ul class="brand-list">
                                    <li>
                                        <div class="brand-box">
                                            <h5>Brand Name:</h5>
                                            <h6>Black Forest</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Code:</h5>
                                            <h6>W0690034</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Type:</h5>
                                            <h6>White Cream Cake</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="select-size">
                                    <h4>Cake Size :</h4>
                                    <select class="form-select select-form-size">
                                        <option selected>Select Size</option>
                                        <option value="1.2">1/2 KG</option>
                                        <option value="0">1 KG</option>
                                        <option value="1.5">1/5 KG</option>
                                        <option value="red">Red Roses</option>
                                        <option value="pink">With Pink Roses</option>
                                    </select>
                                </div>

                                <div class="modal-button">
                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md add-cart-button icon">Add
                                        To Cart</button>
                                    <button onclick="location.href = 'product-left.html';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                        View More Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    {{-- <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Location Modal End -->

    <!-- Cookie Bar Box Start -->
    {{-- <div class="cookie-bar-box">
        <div class="cookie-box">
            <div class="cookie-image">
                <img src="{{asset('front/assets/images/cookie-bar.png')}}" class="blur-up lazyload" alt="">
                <h2>Cookies!</h2>
            </div>

            <div class="cookie-contain">
                <h5 class="text-content">We use cookies to make your experience better</h5>
            </div>
        </div>

        <div class="button-group">
            <button class="btn privacy-button">Privacy Policy</button>
            <button class="btn ok-button">OK</button>
        </div>
    </div> --}}
    <!-- Cookie Bar Box End -->

    <!-- Deal Box Modal Start -->
    {{-- <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{asset('front/assets/images/vegetable/product/10.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{asset('front/assets/images/vegetable/product/11.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{asset('front/assets/images/vegetable/product/12.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{asset('front/assets/images/vegetable/product/13.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Deal Box Modal End -->

    <!-- Tap to top start -->
    {{-- <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div> --}}
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->
    @include('layouts.front-end.script')
</body>

</html>
