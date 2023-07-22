<div>
    <!-- Search Bar Section Start -->
    <section class="search-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>ابحث فى الكشكول بالاسم او الباركود </h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="search-box">
                        <div class="input-group">
                            <input type="text" wire:model='search' class="form-control" placeholder=""
                                aria-label="Example text with button addon">
                            <button class="btn theme-bg-color text-white m-0" type="button"
                                id="button-addon1">ابحث</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Bar Section End -->

    <!-- Product Section Start -->
    <section class="section-b-space">
        <div class="col-xxl-9 col-lg-8">
            <div
                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">
                @forelse ($results as $product)
                    <div>

                        <div class="product-box product-box-bg wow fadeIn">
                            <div class="product-image">
                                <a>
                                    <img src="{{ $product->productd_image }}" class="img-fluid blur-up lazyload"
                                        alt=" {{ $product->productheader->product_name }}">
                                </a>
                                @auth('client')
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <div wire:ignore> <a wire:click.prevent="addtowishlist({{ $product->id }})"
                                                    href="" class="notifi-wishlist">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-heart">
                                                        <path
                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                        </path>
                                                    </svg>
                                                </a> </div>
                                        </li>
                                    </ul>
                                @endauth
                            </div>
                            <div class="product-detail">
                                <a href="">
                                    <h6 class="name">
                                        {{ $product->productheader->product_name }}
                                    </h6>
                                </a>
                                <h6 class="sold weight text-content fw-normal"> {!! $product->Custunit($product->product_header_id) !!}</h6>

                                <h6 class="price theme-color">{{ $product->productd_Sele1 }} جم</h6>

                                @auth('client')
                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button"
                                            wire:click.prevent='addtocart({{ $product->id }})'>Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        @if ($product->cart->count() > 0)
                                            <div
                                                class="cart_qty qty-box "@if ($product->cart->count() > 0) style="display:block !important;" @endif>
                                                <div class="input-group">
                                                    <button type="button" class="qty-left-minus"
                                                        wire:click.prevent='qtydecrement({{ $product->id }})'>
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="{{ $product->cart->sum('qty') }}">
                                                    <button type="button"
                                                        wire:click.prevent='qtyincrement({{ $product->id }})'
                                                        class="qty-right-plus">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>



    </section>
    <!-- Product Section End -->
</div>
