<div>
    <div class="product-box product-box-bg wow fadeIn">
        <div class="product-image">
            <a>
                <img src="{{ $product->productd_image ?? '' }}" class="img-fluid lazyload"
                    alt=" {{ $product->productheader->product_name ?? '' }}">
            </a>
            @auth('client')
                <ul class="product-option">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="المفضلة">
                        <div > <a wire:click.prevent="addtowishlist({{ $product->id ?? '' }})" href=""
                              >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                @if(!empty($product->wishlist->count())) fill="red" style="color: red" @else   fill="none" @endif
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-heart">
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
                <h6 class="name ">
                    {{ $product->productheader->product_name ?? '' }}
                </h6>
                <h6 class=" ">
                    {{ $product->productd_barcode ?? '' }}
                </h6>
            </a>
            <h6 class="name theme-color">
                {{ $product->Qtystockapi($product->productheader->stock->sum('quantity')) }}
                </h6>
            <h6 class="sold weight text-content fw-normal">@if($product->productheader->product_isscale == 0) {!! $product->Custunit($product->product_header_id) ?? '' !!} @else  بالوزن  @endif</h6>
            @if ($product->isoffer == 0)
            <h6 class="price theme-color">{{ $product->productd_Sele1 ?? '' }} جم</h6>
            @else

            <h6 class="price theme-color">{{ $product->productd_Sele2 }} جم   <span style="color:green"> بدلا </span><del style="color: gray"> {{$product->productd_Sele1}} جم </del></h6>
            @if ($product->isoffer != 0) <h6 style="color: red"> عرض :     {{ $product->EndOferDate}}</h6> @endif

            @endif
            @if ($product->productheader->stock->sum('quantity') > 0)
                @auth('client')
                    <div class="add-to-cart-box bg-white">
                        <button class="btn btn-add-cart addcart-button"
                            wire:click.prevent='addtocart({{ $product->id }})'>Add
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
                                        value="{{ $product->cart->qty }}">
                                    <button type="button" wire:click.prevent='qtyincrement({{ $product->id }})'
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
                    <button class="btn btn-add-cart addcart-button" >
                        غير متوفر
                    </button>
                </div>
                @endauth
            @endif
        </div>
    </div>
</div>
