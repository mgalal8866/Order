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
                                <img src="{{ getimage('logos',$setting->logo_shop)}}" width="50"  />

                                <h3 class="text-primary fw-bold ms-1">{{$setting->name_shop}}</h3>
                            </div>
                            <p class="mb-25">{{$setting->address_shop}}</p>
                            <p class=" mb-0">{{$setting->phone_shop}}</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="fw-bold text-end mb-1"># {{$invo->invoicenumber??''}}</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">{{__('tran.invodate')}}:</span>
                                <span class="fw-bold">{{$invo->invoicedate??''}}</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">{{__('tran.derivername')}}:</span>
                                <span class="fw-bold">{{$invo->employee->name??''}}</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">{{__('tran.username')}}:</span>
                                <span class="fw-bold">{{$invo->useradmin->employee->name??''}}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h6 class="mb-1">Invoice To:</h6>
                            <p class="mb-25">Thomas shelby</p>
                            <p class="mb-25">Shelby Company Limited</p>
                            <p class="mb-25">Small Heath, B10 0HF, UK</p>
                            <p class="mb-25">718-986-6062</p>
                            <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h6 class="mb-1">Payment Details:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1">Total Due:</td>
                                        <td><strong>$12,110.55</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">Bank name:</td>
                                        <td>American Bank</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">Country:</td>
                                        <td>United States</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">IBAN:</td>
                                        <td>ETD95476213874685</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1">SWIFT code:</td>
                                        <td>BR91905</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">{{__('tran.product')}}</th>
                                    <th class="py-1">{{__('tran.price')}}</th>
                                    <th class="py-1">{{__('tran.qty')}}</th>
                                    <th class="py-1">{{__('tran.subtotal')}}</th>
                                    <th class="py-1">{{__('tran.discount')}}</th>
                                    <th class="py-1">{{__('tran.total')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1 ps-4">
                                        <p class="fw-semibold mb-25">Native App Development</p>
                                        <p class="text-muted text-nowrap">
                                            Developed a full stack native app using React Native, Bootstrap & Python
                                        </p>
                                    </td>
                                    <td class="py-1">
                                        <strong>$60.00</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>30</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>$1,800.00</strong>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="py-1 ps-4">
                                        <p class="fw-semibold mb-25">Ui Kit Design</p>
                                        <p class="text-muted text-nowrap">Designed a UI kit for native app using
                                            Sketch, Figma & Adobe XD</p>
                                    </td>
                                    <td class="py-1">
                                        <strong>$60.00</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>20</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>$1200.00</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0"><span class="fw-bold">Salesperson:</span> <span
                                    class="ms-75">Alfie Solomons</span></p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Subtotal:</p>
                                    <p class="invoice-total-amount">$1800</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Discount:</p>
                                    <p class="invoice-total-amount">$28</p>
                                </div>
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Tax:</p>
                                    <p class="invoice-total-amount">21%</p>
                                </div>
                                <hr class="my-50" />
                                <div class="invoice-total-item">
                                    <p class="invoice-total-title">Total:</p>
                                    <p class="invoice-total-amount">$1690</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span class="fw-bold">Note:</span>
                            <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                                future freelance
                                projects. Thank You!</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('asset/vendors/js/vendors.min.js') }}"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('asset/js/core/app.js') }}"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-print.min.js') }}"></script>
    <!-- END: Page JS-->

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
<!-- END: Body-->

</html>
