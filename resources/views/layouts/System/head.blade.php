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
    <title>Order-bay</title>
    {{-- <link rel="apple-touch-icon" href="{{asset('asset/images/ico/apple-icon-120.png')}}"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset/images/ico/favicon.ico')}}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/vendors.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/vendors-rtl.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href={{asset('asset/vendors/css/extensions/sweetalert2.min.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('asset/vendors/css/extensions/toastr.min.css')}}>
    <!-- BEGIN: Theme CSS-->
    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/themes/semi-dark-layout.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
   {{--
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
    --}}

    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/core/menu/menu-types/vertical-menu.css')}}"> --}}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset('asset/vendors/css/forms/select/select2.min.css') }}>

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/custom-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/cust.css')}}">
    {{--
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/style.css')}}"> --}}
    <!-- END: Custom CSS-->
    {{-- @vite([ 'resources/js/app.js']) --}}
    @livewireStyles
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}
    @stack('csslive')
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine-ie11.min.js" integrity="sha512-fTsYx0MbHyjq1vtD1hkb8pg/t06gIUsxiZc1THqiClKqd7bBKitKw/39mrL3bsOfIAi72vIa3BJngjLZXTYxBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}
    <style>
        .navigation .navigation-header ,.navigation ,.header-navbar,body {
            font-family: 'Cairo', 'sans-serif' !important;
        }
    </style>
</head>
<!-- END: Head-->
