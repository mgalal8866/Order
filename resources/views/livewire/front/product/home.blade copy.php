<div>
    @include('layouts.front-end.sliderbr')

    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 d-none d-lg-block">
                    <div class="category-menu menu-xl">
                        <ul>
                            <li>
                                <div class="category-list">
                                    {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                    <h5>
                                        <a wire:click.prevent="selectid(null)" href="">الجميع</a>
                                    </h5>
                                </div>
                            </li>
                            @foreach ($data['categorys'] as $category)
                                <li>
                                    <div class="category-list">
                                        {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                        <h5>
                                            <a wire:click.prevent="selectid({{ $category->id }})"
                                                href="">{{ $category->category_name }}</a>
                                        </h5>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-8">
                    <div class="title d-block">
                        <h2 class="text-theme font-sm">{{__('tran.offer')}}</h2>
                    </div>
                    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">
                        @foreach ($data['products'] as $product)
                            <div>
                                <div class="product-box product-white-bg wow fadeIn">
                                    <div class="product-image">
                                        <a>
                                            <img src="{{ $product->productd_image }}" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                        @auth('client')
                                        <ul class="product-option">

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <div  wire:ignore>  <a  wire:click.prevent="addtowishlist({{$product->id}})"  href="" class="notifi-wishlist">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                                </a> </div>
                                            </li>
                                        </ul>
                                        @endauth
                                    </div>
                                    <div class="product-detail position-relative">
                                        <a >
                                            <h6 class="name">
                                                {{ $product->productheader->product_name }}
                                            </h6>
                                        </a>

                                        <h6 class="sold weight text-content fw-normal"> {!!$product->Custunit($product->product_header_id) !!}
                                        </h6>

                                        <h6 class="price theme-color">{{ $product->productd_Sele1 }} جم</h6>
                                        @auth('client')

                                        <div class="add-to-cart-btn-2 addtocart_btn">
                                            <button class="btn addcart-button btn buy-button" wire:click.prevent='addtocart({{$product->id}})'><i
                                                    class="fa-solid fa-plus"></i></button>
                                            @if ($product->cart->count() > 0)
                                            <div   @if ($product->cart->count() > 0) style="display:block !important;"  @endif class="cart_qty qty-box-2" >
                                                <div class="input-group">
                                                    <button type="button" class="qty-left-minus" data-type="minus"   data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="{{$product->cart->sum('qty')}}">
                                                    <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
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
                        @endforeach



                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
