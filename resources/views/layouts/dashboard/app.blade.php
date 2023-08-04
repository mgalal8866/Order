<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('layouts.dashboard.head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.dashboard.nav')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.dashboard.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            {{-- <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Home</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Index
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"><i
                                        class="me-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item" href="#"><i
                                        class="me-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item" href="#"><i
                                        class="me-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item" href="#"><i
                                        class="me-1" data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="content-body">
                <!-- Kick start -->

                <!--/ Kick start -->
                @yield('content')
                @isset($slot)
                    {{ $slot }}
                @endisset


                <!-- Page layout -->

                <!--/ Page layout -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    @include('layouts.dashboard.footer')
    <!-- END: Footer-->

    @include('layouts.dashboard.script')
    {{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script> --}}
    <script>
    //     var firebaseConfig = {
    //         apiKey: "AIzaSyBJY0LBM4gH9gYCnjqC7yy23Gjo2CFVch0",
    // authDomain: "elshroq-d4137.firebaseapp.com",
    // projectId: "elshroq-d4137",
    // storageBucket: "elshroq-d4137.appspot.com",
    // messagingSenderId: "309300782707",
    // appId: "1:309300782707:web:69e2c603d3a02754e82c06",
    // measurementId: "G-PEJM2XN1D5",
    //         databaseURL: 'https://project-id.firebaseio.com',
    //     };
    //     firebase.initializeApp(firebaseConfig);
    //     const messaging = firebase.messaging();


    //     messaging
    //         .requestPermission()
    //         .then(function() {
    //             return messaging.getToken()
    //         })
    //         .then(function(response) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //             $.ajax({
    //                 url: '{{ route('store.token') }}',
    //                 type: 'POST',
    //                 data: {
    //                     token: response
    //                 },
    //                 dataType: 'JSON',
    //                 success: function(response) {
    //                     // alert('Token stored.');
    //                 },
    //                 error: function(error) {
    //                     alert(error.messaging);
    //                 },
    //             });
    //         }).catch(function(error) {
    //             alert(error);
    //         });

    //     messaging.onMessage(function(payload) {
    //         const title = payload.notification.title;
    //         const options = {
    //             body: payload.notification.body,
    //             icon: payload.notification.icon,
    //         };
    //         new Notification(title, options);
    //     });
    </script>
</body>
<!-- END: Body-->

</html>
