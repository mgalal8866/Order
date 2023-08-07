<!-- BEGIN: Vendor JS-->
<script src="{{ asset('asset/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->



<!-- BEGIN: Theme JS-->
<script src="{{asset('asset/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('asset/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{ asset('asset/js/core/app-menu.js') }}"></script>
<script src="{{ asset('asset/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
{{-- <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script> --}}

@stack('alpine-plugins')
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    var getUrl = window.location;
    // $(".navigation a[href='" + getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2] + "']").closest('.nav-item').find('.nav-item').addClass('active');
    // $(".navigation a[href='" + getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2] + "']").closest('.item').find('.sub-item').addClass('active');
    // $(".navigation a[href='" + getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2] + "']").closest('.item').find('.sub-item').find("a[href='" + getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2] + "']").addClass('active');
    $(".navigation a[href='" + getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl
        .pathname.split('/')[2] + "'] >div").addClass('active');
    // $(".navigation a[href='" + window.location.href + "'] >div").addClass('active');
    // $(".navigation a[href='" + window.location.href + "']").addClass('active');
    $(".navigation a[href='" + window.location.href + "']").closest('li').addClass('active');

    $(window).on('load', function() {




        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });
    if (window.location.hash === "#_=_") {
        history.replaceState ?
            history.replaceState(null, null, window.location.href.split("#")[0]) :
            window.location.hash = "";
    }
</script>
@yield('js')

@stack('jslive')
@vite([ 'resources/js/app.js'])
@livewireScripts
<!-- END: Body-->
