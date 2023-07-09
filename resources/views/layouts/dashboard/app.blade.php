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
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyASFQiDiY62XTCm7KE9Xx5K03wippJBWqo",
        authDomain: "order-48bfc.firebaseapp.com",
        projectId: "order-48bfc",
        storageBucket: "order-48bfc.appspot.com",
        messagingSenderId: "324270172795",
        appId: "1:324270172795:web:d2f7354ffcee3d9fc810de",
        measurementId: "G-4DX5NRLD86",
        databaseURL: 'https://project-id.firebaseio.com',
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();


        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        // alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error.messaging);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });

    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
</script>
</body>
<!-- END: Body-->

</html>
