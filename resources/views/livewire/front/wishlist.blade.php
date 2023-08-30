<div>
    <x-breadcrumb name="Wishlist" />
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @forelse ($wish as $index=> $product)
                <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                    <div class="product-box-3 h-100">
                        <div class="product-header">
                            <div class="product-image">
                                <a>
                                    <img src="{{ $product->productd_image }}" class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <div class="product-header-top">
                                    <a class="btn wishlist-button" wire:click='removewishlist({{ $product->id }})'>
                                        <div wire:ignore><i data-feather="x"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-footer">
                            <div class="product-detail">
                                <span class="span-name">{{ $product->productheader->product_name }}</span>
                                <a>
                                    <h5 class="name">{{ $product->productd_barcode }}</h5>
                                </a>
                                <h6 class="unit mt-1">{{ $product->unit->unit_name }}</h6>
                                <h5 class="price">
                                    <span class="theme-color">{{ $product->productd_Sele1 }} جم</span>
                                    <del>{{ $product->productd_Sele2 }}</del>
                                </h5>

                                @if ($product->productheader->stock->sum('quantity') > 0)
                            @auth('client')
                                <div class="add-to-cart-box bg-white">
                                    <button class="btn btn-add-cart addcart-button"
                                        wire:click.prevent='addtocart({{ $product }})'>Add
                                        <span class="add-icon bg-light-orange">
                                            <i class="fa-solid fa-plus"></i>
                                        </span>
                                    </button>


                                    @if (!empty($product->cart->qty) > 0)
                                        <div
                                            class="cart_qty qty-box "@if ($product->cart->qty > 0) style="display:block !important;" @endif>
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus"
                                                    wire:click.prevent='qtydecrement({{ $product->id }})'>
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text" name="quantity"
                                                    value="{{ $product->productheader->product_isscale == 1 ? $product->cart->qty : number_format($product->cart->qty, 0, '.', '') }}">
                                                <button type="button" wire:click.prevent='qtyincrement({{ $product}})'
                                                    class="qty-right-plus">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endauth
                        @else
                            @auth('client')
                                <div class="add-to-cart-box bg-white">
                                    <button class="btn btn-add-cart addcart-button">
                                        غير متوفر
                                    </button>
                                </div>
                            @endauth
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                        المفضلة فارغه
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
