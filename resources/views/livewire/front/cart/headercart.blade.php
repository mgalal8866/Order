<div>

        <div class="onhover-dropdown header-badge">
            <button type="button" class="btn p-0 position-relative header-wishlist">
                <i data-feather="shopping-cart"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge">{{ $count }}
                        {{-- <span class="visually-hidden">unread messages</span> --}}
                    </span>
            </button>

            <div class="onhover-div">
                <ul class="cart-list">
                @foreach ( $cartlist as $item )


                    <li class="product-box-contain">
                        <div class="drop-cart">
                            <a href="product-left-thumbnail.html" class="drop-image">
                                <img src="{{ asset('front/assets/images/vegetable/product/1.png') }}"
                                    class="blur-up lazyload" alt="elshrouk">
                            </a>

                            <div class="drop-contain">
                                <a href="product-left-thumbnail.html">

                                    <h5>{{ $item->productdetails->productheader->product_name}}</h5>
                                </a>
                                <h6><span>{{  $item->qty}} x </span>{{  $item->productdetails->productd_Sele1}}</h6>
                                <button class="close-button close_button">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <div class="price-box">
                    <h5>Total :</h5>
{{$item->sum('qty') }} {{ $item->productdetails()->sum('productd_Sele1')}}
                    <h4 class="theme-color fw-bold">{{$item->sum('qty') * $item->productdetails()->sum('productd_Sele1')}}</h4>
                </div>

                <div class="button-group">
                    <a href="{{ route('cart') }}"
                        class="btn btn-sm cart-button">{{ __('front.viewcart') }}</a>
                    <a href="checkout.html"
                        class="btn btn-sm cart-button theme-bg-color
                    text-white">{{ __('front.checkout') }}</a>
                </div>
            </div>
        </div>

</div>
