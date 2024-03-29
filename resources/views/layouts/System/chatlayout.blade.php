<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('layouts.System.head')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat-list.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">


<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @include('layouts.System.nav')

    @include('layouts.System.menu')

    <div class="app-content content chat-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

            @isset($slot)
                {{ $slot }}
            @endisset

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.System.footer')
    @include('layouts.System.script')
    <script src="{{ asset('app-assets/js/scripts/pages/app-chat.js') }}"></script>
</body>


</html>
