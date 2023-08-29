<!-- latest jquery-->
<script src="{{asset('front/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- jquery ui-->
<script src="{{asset('front/assets/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('front/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap/popper.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('front/assets/js/feather/feather.min.js')}}"></script>
<script src="{{asset('front/assets/js/feather/feather-icon.js')}}"></script>

<!-- Lazyload Js -->
<script src="{{asset('front/assets/js/lazysizes.min.js')}}"></script>

<!-- Slick js-->
<script src="{{asset('front/assets/js/slick/slick.js')}}"></script>
<script src="{{asset('front/assets/js/slick/slick-animation.min.js')}}"></script>
<script src="{{asset('front/assets/js/slick/custom_slick.js')}}"></script>

<!-- Auto Height Js -->
<script src="{{asset('front/assets/js/auto-height.js')}}"></script>

<!-- Fly Cart Js -->
<script src="{{asset('front/assets/js/fly-cart.js')}}"></script>

<!-- Quantity js -->
<script src="{{asset('front/assets/js/quantity-2.js')}}"></script>

<!-- WOW js -->
<script src="{{asset('front/assets/js/wow.min.js')}}"></script>
<script src="{{asset('front/assets/js/custom-wow.js')}}"></script>

<!-- script js -->
<script src="{{asset('front/assets/js/script.js')}}"></script>
@livewireScripts()
  <script>
        window.addEventListener('notifi', event => {
            $.notify({
                icon: "fa fa-check",
                // title: "Success!",
                message: event.detail.message,
            }, {
                element: "body",
                position: null,
                type: event.detail.type,
                allow_dismiss: true,
                newest_on_top: true,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "center",
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 600,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp",
                },
                icon_type: "class",
                template: '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    "</div>" +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    "</div>",
            });
        })
    </script>
@stack('jslive')

