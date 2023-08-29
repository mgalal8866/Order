<div>
    <x-breadcrumb name="العربة" />
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @forelse ($cartlist as $index => $c)
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


                                                            <li class="text-content">{{ __('tran.unit') }} :
                                                                <span class="text-title">
                                                                </span> {!! $c->Custunit() !!}
                                                            </li>

                                                            @if ($c['isoffer'] == 1)
                                                                <li class="text-content text-danger">
                                                                    {{-- <span class="text-title ">تاريخ انتهاء العرض : </span>({{ Carbon\Carbon::createFromTimeString($c['EndOferDate'])->translatedFormat('l j F Y') }}) --}}
                                                                    <span class="text-title ">تاريخ انتهاء العرض :
                                                                    </span>({{ $c['EndOferDate'] }})
                                                                </li>
                                                            @endif

                                                            {{-- <li class="text-content"><span class="text-title"> </span>
                                                            </li> --}}
                                                            {{-- <li>
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
                                                            </li> --}}

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
                                                        </li>

                                                            <li>
                                                                <h5>Total: $35.10</h5>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price">
                                                <h4 class="table-title text-content">{{ __('tran.price') }}</h4>
                                                <h5>
                                                    @if ($c['isoffer'] == 1)
                                                        {{ $c['productd_Sele2'] }}{{ $currency }}
                                                        <del class="text-content">
                                                            {{ $c['productd_Sele1'] }}{{ $currency }} </del>
                                                    @else
                                                        {{ $c['productd_Sele1'] }}{{ $currency }}
                                                    @endif

                                                </h5>
                                                @if ($c['isoffer'] == 1)
                                                    <h6 class="theme-color">{{ __('tran.yousave') }} :
                                                        {{ $c['productd_Sele1'] - $c['productd_Sele2'] }}{{ $currency }}
                                                    </h6>
                                                @endif
                                            </td>

                                            <td class="quantity">
                                                <h4 class="table-title text-content">{{ __('tran.qty') }}</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            {{-- qty-left-minus  qty-right-plus"   value="{{$c['cart']['qty']}}" --}}
                                                            <button type="button" class="btn "
                                                                wire:click.prevent="minus('{{ $index }}')">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input"
                                                                type="text" name="quantity" {{-- value="{{ $c['cart']['qty'] }}"> --}}
                                                                value="{{ $c['productheader']['product_isscale'] == 1 ? $c['cart']['qty'] : number_format((float) $c['cart']['qty'], 0, '.', '') }} ">
                                                            {{-- wire:model="cartlist.{{ $index }}.cart.0.qty"> --}}
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

                                                <h5>{{ $c['isoffer'] == 1 ? $c['cart']['qty'] * $c['productd_Sele2'] : $c['cart']['qty'] * $c['productd_Sele1'] }}
                                                    {{ $currency }}</h5>
                                            </td>

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="save" href=""
                                                    wire:click.prevent="saveforlater('{{ $c['id'] }}')">حفظ
                                                    للمفضلة</a>
                                                <a class="" href=""
                                                    wire:click.prevent="removefromcart('{{ $index }}')">{{ __('tran.removecart') }}</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            العربه فارغة - لا يوجد منتجات
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($cartlist->count() > 0)
                    <div class="col-xxl-3">
                        <div class="summery-box p-sticky">
                            <div class="summery-header">
                                <h3></h3>
                            </div>

                            <div class="summery-contain">
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">تطبيق الكوبون</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" wire:model="coupon" class="form-control"
                                            id="exampleFormControlInput1" placeholder="ادخل الكوبون"
                                            {{ $cul['coupondisc'] > 0 ? 'disabled' : '' }}>
                                        @if ($cul['coupondisc'] > 0)
                                            <button class="btn-apply" wire:click.prevent="removecoupon()">X</button>
                                        @else
                                            <button class="btn-apply" wire:click.prevent="usecoupon()"
                                                {{ $cul['coupondisc'] > 0 ? 'disabled' : '' }}>تطبيق</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">ملاحظات </h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" wire:model.debounce="note" class="form-control"
                                            id="exampleFormControlInput13" placeholder="اكتب ملاحظاتك">
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <h4>طريقه الدفع</h4>
                                        <h4 class="price">
                                            <select wire:model="selectdeferreds">
                                                <option selected value="0">كاش</option>
                                                @if ($cul['deferreds'] == 1)
                                                    <option value="1">اجل</option>
                                                @endif
                                            </select>
                                        </h4>
                                    </li>
                                    <li>
                                        <h4>اجمالى الاصناف</h4>
                                        <h4 class="price"> {{ $cul['subtotal'] }}{{ $currency }}</h4>
                                    </li>
                                    @if ($cul['totaldiscount'] != 0)
                                        <li>
                                            <h4>اجمالى التوفير</h4>
                                            <h4 class="price"> {{ $cul['totaldiscount'] }}{{ $currency }}</h4>
                                        </li>
                                    @endif

                                    <li>
                                        <h4>خصم الكوبون</h4>
                                        <h4 class="price">(-)
                                            {{ $cul['coupondisc'] . '  ' . ($cul['coupontype'] == 0 ? ' % ' : $currency ) }}
                                        </h4>
                                    </li>

                                    <li class="align-items-start">
                                        <h4>التوصيل</h4>
                                        <h4 class="price text-end">0 {{ $currency }}</h4>
                                    </li>
                                </ul>
                            </div>

                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h4>الاجمالى ({{ $currency }})</h4>
                                    <h4 class="price theme-color">{{ $cul['finalsubtotal'] }}{{ $currency }}</h4>
                                </li>
                            </ul>

                            <div class="button-group cart-button">
                                <ul>
                                    @if ($setting->minimum_products > count($cartlist))
                                        <li>
                                            <button class="btn btn-info text-danger fw-bold">
                                                ({{ $setting->minimum_products }}) الحد الادنى لعدد للمنتجات </button>
                                        </li>
                                    @elseif ($setting->minimum_financial > $this->cul['subtotal'])
                                        <li>
                                            <button class="btn btn-info text-danger fw-bold">
                                                ({{ $setting->minimum_financial }}) الحد الادنى لسعر الشراء </button>
                                        </li>
                                    @else
                                        <li>
                                            <button wire:click="pleaceorder()"
                                                class="btn btn-animation proceed-btn fw-bold">استكمال الطلب</button>
                                        </li>
                                    @endif

                                    <li>
                                        <button onclick="location.href = '/';"
                                            class="btn btn-light shopping-button text-dark">
                                            <i class="fa-solid fa-arrow-left-long"></i>الرجوع للتسوق</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
</div>

@push('jslive')
    <script>
        window.addEventListener('notifi', event => {
            $.notify({
                icon: "fa fa-check",
                // title: "Success!",
                message: event.detail.message,
            }, {
                element: "body",
                position: null,
                type: event.detail.type,
                allow_dismiss: true,
                newest_on_top: true,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "center",
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 600,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp",
                },
                icon_type: "class",
                template: '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    "</div>" +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    "</div>",
            });
        })
    </script>
@endpush
