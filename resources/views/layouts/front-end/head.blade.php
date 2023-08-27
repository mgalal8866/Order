<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $setting->name_shop }}">
    <meta name="keywords" content="{{ $setting->name_shop }}">
    <meta name="author" content="{{ $setting->name_shop }}">
    <link rel="icon" href="{{ asset('asset/images/ico/favicon.ico') }}" type="image/x-icon">
    <title>{{ $setting->name_shop }}</title>

    <!-- Google font -->
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    {{-- <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('front/assets/css/vendors/bootstrap.css')}}"> --}}
    <link id="rtl-link" rel="stylesheet" type="text/css"
        href="{{ asset('front/assets/css/vendors/bootstrap.rtl.css') }}">


    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/vendors/font-awesome.css') }}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/vendors/feather-icon.css') }}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/vendors/slick/slick-theme.css') }}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bulk-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/vendors/animate.css') }}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/style.css') }}">
    @livewireStyles()

    <style>
        body {

            font-family: 'Cairo', 'sans-serif' !important;
        }

        @if ($setting->site_color_primary != null)

            .theme-color-6 {
                --theme-color: {{ $setting->site_color_primary }} !important;
                --theme-color-rgb: 221, 87, 30;
            }
        @endif
        /* --theme-color2: linear-gradient(90.56deg, var({{ $setting->site_color_primary }}) 8.46%, var({{ $setting->site_color_primary }}) 62.97%)!important;; */
        header .top-nav {
            padding: 24px 0;
            background-color: {{ $setting->site_color_primary }} !important;
        }
        .product-box.product-box-bg {
                background: #ffffff;
        }
    </style>

    @stack('csslive')

</head>
