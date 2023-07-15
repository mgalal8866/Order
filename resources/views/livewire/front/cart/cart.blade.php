<div>
    <x-breadcrumb name="Cart" />
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @foreach ($cartlist as $index => $c)
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="product-left-thumbnail.html" class="product-image">
                                                        <img src="{{ $c['productd_image'] }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a
                                                                    href="product-left-thumbnail.html">{{ $c['productheader']['product_name'] }}</a>
                                                            </li>


                                                            <li class="text-content"><span
                                                                    class="text-title">{{ __('tran.unit') }} :
                                                                </span>{{ $c['unit']['unit_name'] }}</li>

                                                            <li class="text-content"><span class="text-title"> </span>
                                                            </li>
                                                            <li>
                                                                <h5 class="text-content d-inline-block">
                                                                    {{ __('tran.price') }} :</h5>
                                                                <span>{{ $c['productd_Sele2'] }}</span>
                                                                <span
                                                                    class="text-content">{{ $c['productd_Sele1'] }}</span>
                                                            </li>
                                                            <li>
                                                                <h5 class="saving theme-color">{{ __('tran.yousave') }}
                                                                    : {{ $c['productd_Sele1'] - $c['productd_Sele2'] }}
                                                                </h5>
                                                            </li>

                                                            {{-- <li class="quantity-price-box">
                                                            <div class="cart_qty">
                                                                <div class="input-group">
                                                                    <button type="button" class="btn qty-left-minus"
                                                                        >
                                                                        <i class="fa fa-minus ms-0"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="btn qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus ms-0"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li> --}}

                                                            <li>
                                                                <h5>Total: $35.10</h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price">
                                                <h4 class="table-title text-content">{{ __('tran.price') }}</h4>
                                                <h5> {{ $c['productd_Sele2'] }}<del
                                                        class="text-content">{{ $c['productd_Sele1'] }}</del></h5>
                                                <h6 class="theme-color">{{ __('tran.yousave') }} :
                                                    {{ $c['productd_Sele1'] - $c['productd_Sele2'] }}</h6>
                                            </td>

                                            <td class="quantity">
                                                <h4 class="table-title text-content">{{ __('tran.qty') }}</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            {{-- qty-left-minus  qty-right-plus"   value="{{$c['cart'][0]['qty']}}" --}}
                                                            <button type="button" class="btn "
                                                                wire:click.prevent="minus('{{ $index }}')">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input"
                                                                type="text" name="quantity"
                                                                wire:model="cartlist.{{ $index }}.cart.0.qty">
                                                            <button type="button" class="btn "
                                                                wire:click.prevent="pluse('{{ $index }}')"
                                                                data-field="">
                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="subtotal">
                                                <h4 class="table-title text-content">{{ __('tran.subtotal') }}</h4>
                                                <h5>{{ $c['cart'][0]['qty'] * $c['productd_Sele2'] }}</h5>
                                            </td>

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="save notifi-wishlist" href="javascript:void(0)">Save for
                                                    later</a>
                                                <a class=" close_button"
                                                    wire:click.prevent="removefromcart('{{ $index }}')">{{ __('tran.removecart') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="text" wire:model="coupon" class="form-control"
                                        id="exampleFormControlInput1" placeholder="ادخل الكوبون"
                                        {{ $coupondisc > 0 ? 'disabled' : '' }}>
                                    @if ($coupondisc > 0)
                                        <button class="btn-apply" wire:click.prevent="removecoupon()">X</button>
                                    @else
                                        <button class="btn-apply" wire:click.prevent="usecoupon()"
                                            {{ $coupondisc > 0 ? 'disabled' : '' }}>Apply</button>
                                    @endif
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$125.65</h4>
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price">(-) {{ $coupondisc }}</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (USD)</h4>
                                <h4 class="price theme-color">$132.58</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = 'checkout.html';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('jslive')
    <script>

        window.addEventListener('notifi', event => {
            $.notify({
                icon: "fa fa-check",
                title: "Success!",
                message: event.detail.message,
            }, {
                element: "body",
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right",
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp",
                },
                icon_type: "class",
                // template: '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                //     '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                //     '<span data-notify="icon"></span> ' +
                //     '<span data-notify="title">{1}</span> ' +
                //     '<span data-notify="message">{2}</span>' +
                //     '<div class="progress" data-notify="progressbar">' +
                //     '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                //     "</div>" +
                //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
                //     "</div>",
            });
        })
    </script>
@endpush
