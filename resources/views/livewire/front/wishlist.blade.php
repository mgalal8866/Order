<div>
    <x-breadcrumb name="Wishlist" />
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @foreach ($wish as $w)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                        <div class="product-box-3 h-100">
                            <div class="product-header">
                                <div class="product-image">
                                    <a>
                                        <img src="{{ $w->productd_image }}" class="img-fluid blur-up lazyload"
                                            alt="">
                                    </a>
                                    <div class="product-header-top">
                                        <a class="btn wishlist-button"  wire:click='removewishlist({{$w->id}})'>
                                            <div wire:ignore><i data-feather="x"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">{{ $w->productheader->product_name }}</span>
                                    <a>
                                        <h5 class="name">{{ $w->productd_barcode }}</h5>
                                    </a>
                                    <h6 class="unit mt-1">{{ $w->unit->unit_name }}</h6>
                                    <h5 class="price">
                                        <span class="theme-color">{{ $w->productd_Sele1 }} جم</span>
                                        <del>{{ $w->productd_Sele2 }}</del>
                                    </h5>

                                    <div class="add-to-cart-box bg-white mt-2">
                                        <button class="btn btn-add-cart addcart-button">{{ __('tran.addcart') }}
                                            <span class="add-icon bg-light-gray">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group bg-white">
                                                <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="0">
                                                <button type="button" class="qty-right-plus bg-gray" data-type="plus"
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
                @endforeach
            </div>
        </div>
    </section>
</div>
