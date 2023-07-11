<div>
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 d-none d-lg-block">
                    <div class="category-menu menu-xl">
                        <ul>

                            @foreach ($data['categorys'] as $category)
                                <li>
                                    <div class="category-list">
                                        {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                        <h5>
                                            <a href="shop-left-sidebar.html">{{ $category->category_name }}</a>
                                        </h5>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="title d-block">
                        <h2 class="text-theme font-sm">Food Cupboard</h2>
                        <p>A virtual assistant collects the products from your list</p>
                    </div>
                    <div
                        class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">
                        @foreach ($data['products'] as $product)
                        <div>
                                <div class="product-box product-white-bg wow fadeIn">
                                    <div class="product-image">
                                        <a  >
                                            <img src="{{  $product->productd_image }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            {{-- <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li> --}}
                                                {{--
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li> --}}

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
                                              {{ $product->productheader->product_name}}
                                            </h6>
                                        </a>

                                        <h6 class="sold weight text-content fw-normal">  {{ $product->unit->unit_name}}</h6>

                                        <h6 class="price theme-color">{{ $product->productd_Sele1}} جم</h6>

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
                            @endforeach



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
                                        <img src="{{ asset('front/assets/images/cake/product/1.png') }}"
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
</div>
