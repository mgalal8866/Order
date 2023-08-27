<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', 'Title')</title>
    <link rel="apple-touch-icon" href="{{ asset('asset/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href={{ asset('asset/images/ico/favicon.ico') }}>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/vendors.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->
    {{-- <link rel="stylesheet" type="text/css" href={{asset('asset/vendors/css/extensions/sweetalert2.min.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('asset/vendors/css/extensions/toastr.min.css')}}> --}}
    <!-- BEGIN: Theme CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css-rtl/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>
        .text-primary,
        a {
            color:  {{ $setting->site_color_primary }} !important
        }

        .bg-light-primary .fc-list-event-dot,
        .btn-primary {
            border-color: #dd571e !important;
        }

        .form-check-input:checked {
            background-color:  {{ $setting->site_color_primary }} !important;
            border-color:  {{ $setting->site_color_primary }} !important;
        }
        .form-check-input:not(:disabled):checked {
    box-shadow: 0 2px 4px 0 rgb(221, 87, 30)!important;
}

        .btn-check:active+.btn-primary,
        .btn-check:checked+.btn-primary,
        .btn-primary.active,
        .btn-primary:active,
        .btn-primary:focus {
            color: #FFF;
            background-color:  {{ $setting->site_color_primary }} !important;
        }

        .btn-primary {
            background-color:  {{ $setting->site_color_primary }} !important
        }

        .navigation .navigation-header,
        .navigation,
        .header-navbar,
        body {
            font-family: 'Cairo', 'sans-serif' !important;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

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
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('asset/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendor/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('asset/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('asset/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/auth-login.min.js') }}"></script>
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
