<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
<!-- BEGIN: Head-->
@include('layouts.dashboard.head')


<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                                <img src="{{ getimage('logos', $setting->logo_shop) }}" width="50" />

                                <h3 class="text-primary fw-bold ms-1">{{ $setting->name_shop }}</h3>
                            </div>
                            <p class="mb-25">{{ $setting->address_shop }}</p>
                            <p class=" mb-0">{{ $setting->phone_shop }}</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="fw-bold text-end mb-1"># {{ $invo->invoicenumber ?? '' }}</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">{{ __('tran.invodate') }}:</span>
                                <span class="fw-bold">{{ $invo->invoicedate ?? '' }}</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">{{ __('tran.derivername') }}:</span>
                                <span class="fw-bold">{{ $invo->employee->name ?? '' }}</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">{{ __('tran.username') }}:</span>
                                <span class="fw-bold">{{ $invo->useradmin->employee->name ?? '' }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h6 class="mb-2"> {{__('tran.customerdata')}} :</h6>
                                <h6 class="mb-25">{{$invo->user->client_name??''}}</h6>
                                <p class="mb-25">{{$invo->user->region->city->name??'' .' , '. $invo->user->region->name??'' .' , '. $invo->user->client_state??''}}</p>
                                <p class="mb-25">{{$invo->user->client_fhonewhats??''}}</p>

                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h6 class="mb-1">{{__('tran.paymentdetails')}} :</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1">{{__('tran.invopaytayp')}} : </td>
                                        <td><span class="fw-bold">{{$invo->paytayp??''}}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">{{ __('tran.product') }}</th>
                                    <th class="py-1">{{ __('tran.price') }}</th>
                                    <th class="py-1">{{ __('tran.qty') }}</th>
                                    <th class="py-1">{{ __('tran.subtotal') }}</th>
                                    <th class="py-1">{{ __('tran.discount') }}</th>
                                    <th class="py-1">{{ __('tran.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($invo)
                                    @forelse ($invo->salesdetails as $invod)
                                        <tr>
                                            <td class="py-1 ">
                                                {{-- <p class="fw-semibold mb-25 text-nowrap">
                                                    {{ $invod->productdetails->productheader->product_name ?? '' }}</p> --}}

                                                <p class="text-muted text-nowrap">
                                                    {{ $invod->productdetails->productheader->product_name ?? '' }}                                            </p>
                                            </td>
                                            <td class="py-1">
                                                <strong>{{ $invod->sellprice ?? '' }}</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>{{ $invod->quantity ?? '' }}</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>{{ $invod->subtotal ?? '' }}</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>{{ $invod->discount ?? '' }}</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>{{ $invod->grandtotal ?? '' }}</strong>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="18" class="py-1 ps-4"> No Data Here</td>
                                        </tr>
                                    @endforelse
                                @endisset
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0">
                                <span class="fw-bold">{{ __('tran.note') }}:</span>
                                <span  >{{ $invo->note ?? '' }}</span>
                            </p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.subtotal') }}:</p>
                                    <p class="invoice-total-amount">{{ $invo->subtotal ?? '' }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.totaldiscount') }} : </p>
                                    <p class="invoice-total-amount">{{ $invo->salesdetails ? $invo->salesdetails->sum('discount') :''}}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.total_add_amount') }} : </p>
                                    <p class="invoice-total-amount">{{ $invo->total_add_amount ?? '' }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.deliverycost') }}:</p>
                                    <p class="invoice-total-amount">{{ $invo->deliverycost ?? '' }}</p>
                                </div>
                                <hr class="my-50" />
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.invototal') }}:</p>
                                    <p class="invoice-total-amount">{{ $invo->grandtotal ?? '' }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.paymentval') }}:</p>
                                    <p class="invoice-total-amount">{{ $invo->paid ?? '' }}</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">{{ __('tran.remaining') }}:</p>
                                    <p class="invoice-total-amount">{{ $invo->remaining ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span class="fw-bold">{{ __('tran.note') }}:</span>

                            <span>{{ $invo->note ?? '' }}</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('asset/vendors/js/vendors.min.js') }}"></script>

    <script src="{{ asset('asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('asset/js/core/app.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-print.min.js') }}"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>

</html>
