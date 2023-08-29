@push('csslive')
    <style>
        .success {
            background-color: rgba(13, 164, 135, 0.1) !important;
            color: #0da487 !important;
        }

        .danger {
            background-color: rgba(255, 114, 114, 0.1) !important;
            color: #ff7272 !important;
        }
    </style>
@endpush
<div>

    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="{{ asset('front/assets/images/inner-page/cover-img.jpg') }}"
                                    class="img-fluid blur-up lazyload" alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img class="blur-up lazyload update_img"
                                            src="{{ Avatar::create($data['user']->client_name)->setFontFamily('Cairo')->toBase64() }}" />
                                        {{-- $data['user']->client_name --}}
                                        {{-- <img src="../assets/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt=""> --}}
                                        {{-- <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ $data['user']->client_name }}</h3>
                                    <h6 class="text-content">{{ $data['user']->client_fhonewhats }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li wire:ignore.self class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button" role="tab"
                                    aria-controls="pills-dashboard" aria-selected="true"><i data-feather="home"></i>
                                    حسابى</button>
                            </li>


                            <li wire:ignore.self class="nav-item" role="presentation">
                                <button class="nav-link" id="notification-tab" data-bs-toggle="pill"
                                    data-bs-target="#notification" type="button" role="tab"
                                    aria-controls="notification" aria-selected="false"><i
                                        data-feather="shopping-bag"></i>{{ __('front.notification') }}</button>
                            </li>
                            <li wire:ignore class="nav-item" role="presentation">
                                <button class="nav-link" id="payd-tab" data-bs-toggle="pill" data-bs-target="#payd"
                                    type="button" role="tab" aria-controls="payd" aria-selected="false"><i
                                        data-feather="shopping-bag"></i>{{ __('front.payd') }}</button>
                            </li>
                            <li wire:ignore.self  class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button" role="tab"
                                    aria-controls="pills-order" aria-selected="false"><i
                                        data-feather="shopping-bag"></i>{{ __('front.myorderstay') }}</button>
                            </li>
                            <li wire:ignore.self class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order-done" type="button" role="tab"
                                    aria-controls="pills-order-done" aria-selected="false"><i
                                        data-feather="shopping-bag"></i>{{ __('front.myorderdone') }}</button>
                            </li>
                            <li wire:ignore.self class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    الملف الشخصي</button>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div wire:ignore.self class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>حسابى</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>



                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/order.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/order.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5 style="color: var(--theme-color);">نقاطى</h5>
                                                        <h3 style="color: var(--theme-color);">
                                                            {{ $data['user']->client_points }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/order.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/order.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5 style="color: var(--theme-color);">رصيدي</h5>
                                                        <h3 style="color: var(--theme-color);">
                                                            {{ $data['user']->client_Balanc }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/wishlist.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/wishlist.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>اجمالى الطلبات السابقة</h5>
                                                        <h3>{{ $data['saleheader']->sum('grandtotal') }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/wishlist.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/wishlist.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>اجمالى الطلبات الحالية</h5>
                                                        <h3>
                                                            <h3>{{ $data['deliveryheader']->sum('grandtotal') }}</h3>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/pending.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/pending.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>عدد منتجات المفضلة</h5>
                                                        <h3>{{ $data['wishlist']->count() }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('front/assets/images/svg/pending.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('front/assets/images/svg/pending.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>عدد منتجات العربة</h5>
                                                        <h3>{{ $data['cart']->count() }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div wire:ignore.self class="tab-pane fade show" id="notification" role="tabpanel"
                                aria-labelledby="notification-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>مدفوعاتى</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box">
                                        <div class="table-responsive">
                                            <table class="table order-table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th scope="col">الصورة</th> --}}
                                                        <th scope="col">العنوان</th>
                                                        <th scope="col">اشعار</th>
                                                        <th scope="col">التاريخ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data['notfiction'] as $item)
                                                        <a href="">
                                                            <tr>
                                                                <td>{{ $item->title }}</td>
                                                                <td>{{ $item->body }}</td>
                                                                <td>{{ Carbon::parse($item->created_at)->translatedFormat('l j F Y') }}
                                                                </td>

                                                        </a>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No Data</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                            <div class="flex flex-row mt-2">
                                                {{ $data['notfiction']->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  wire:ignore.self class="tab-pane fade show" id="payd" role="tabpanel"
                                aria-labelledby="payd-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>مدفوعاتى</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box">
                                        <div class="table-responsive">
                                            <table class="table order-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"> تاريخ</th>
                                                        <th scope="col">رصيد قبل</th>
                                                        <th scope="col">المدفوع</th>
                                                        <th scope="col">الرصيد النهائي</th>
                                                        <th scope="col">ملاحظات</th>
                                                        <th scope="col">نوع العملية</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data['clientpayment'] as $item)
                                                        <a href="">
                                                            <tr>
                                                                <td>{{ Carbon::parse($item->created_at)->translatedFormat('l j F Y') }}
                                                                </td>
                                                                <td>{{ $item->fromeamount }}</td>
                                                                <td>{{ $item->paidamount }}</td>
                                                                <td>{{ $item->newamount }}</td>
                                                                <td>{{ $item->pay_note }}</td>
                                                                <td>{{ $item->payment_method }}</td>
                                                        </a>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No Data</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore.self class="tab-pane fade show" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>طلباتى الحالية</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box" >
                                        <div class="table-responsive">
                                            <table class="table order-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">رقم الطلب</th>
                                                        <th scope="col">التاريخ</th>
                                                        <th scope="col">طريقة الدفع</th>
                                                        <th scope="col">الحالة</th>
                                                        <th scope="col">الاجمالى</th>
                                                        <th scope="col">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data['deliveryheader'] as $item)
                                                        <a href="" >
                                                            <tr>
                                                                <td class="product-image">#{{ $item->invoicenumber }}
                                                                </td>
                                                                <td>{{ Carbon::parse($item->invoicedate)->translatedFormat('l j F Y') }}
                                                                </td>
                                                                <td>#{{ $item->paytayp }}</td>
                                                                <td>
                                                                    @if ($item->type_order == 'تم التوصيل')
                                                                        <label
                                                                            class="success">{{ $item->type_order }}</label>
                                                                    @else
                                                                        <label
                                                                            class="danger">{{ $item->type_order }}</label>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <h6>{{ $item->grandtotal . $Cu }}</h6>
                                                                </td>
                                                                <td>
                                                                    <a href="" wire:click='getopeninvo({{$item->id}})' class="btn btn-success">عرض</a>
                                                                </td>
                                                            </tr>
                                                        </a>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No Data</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div wire:ignore.self class="tab-pane fade show" id="pills-order-done" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>طلباتى السابقة</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box">
                                        <div class="table-responsive">
                                            <table class="table order-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">رقم الطلب</th>
                                                        <th scope="col">تاريخ</th>
                                                        <th scope="col">طريقة الدفع</th>
                                                        <th scope="col">الحالة</th>
                                                        <th scope="col">الاجمالى</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data['saleheader'] as $item)
                                                        <a href="" wire:click='getcloseinvo({{$item->id}})'>
                                                            <tr>
                                                                <td class="product-image">#{{ $item->invoicenumber }}
                                                                </td>
                                                                <td>{{ Carbon::parse($item->invoicedate)->translatedFormat('l j F Y') }}
                                                                </td>
                                                                <td>#{{ $item->paytayp }}</td>
                                                                <td>
                                                                    @if ($item->type_order == 'تم التوصيل')
                                                                        <label
                                                                            class="success">{{ $item->type_order }}</label>
                                                                    @else
                                                                        <label
                                                                            class="danger">{{ $item->type_order }}</label>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <h6>{{ $item->grandtotal . $Cu }}</h6>
                                                                </td>
                                                            </tr>
                                                        </a>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No Data</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore.self class="tab-pane fade show" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>بياناتى</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('front/assets/svg/leaf.svg') }}#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>

                                                            <tr>
                                                                <td>اسم المحل :</td>
                                                                <td>{{ $data['user']->store_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>النشاط:</td>
                                                                <td>{{ $data['user']->cateorya->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td> رقم اخر :</td>
                                                                <td>{{ $data['user']->client_fhoneLeter }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>المحافظة و المنطقة :</td>
                                                                <td>{{ $data['user']->region->city->name . ' - ' . $data['user']->region->name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>العنوان :</td>
                                                                <td>{{ $data['user']->client_state }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                {{-- <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">vicki.pope@gmail.com
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> --}}
                                            </div>

                                            {{-- <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="{{asset('front/assets/images/inner-page/dashboard-profile.png')}}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div> --}}
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
