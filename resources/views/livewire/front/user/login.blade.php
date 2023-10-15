<div>
    <x-breadcrumb name="Login" />

    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('asset/images/log-in.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div id="login11" class="log-in-box">
                        <div class="log-in-title">
                            <h3>مرحبا بك</h3>
                            <h4>{{ __('front.login') }}</h4>
                        </div>
                        <div class="input-box">
                            @if (session()->has('error'))
                                <div class="alert alert-danger mb-2">{{ session('error') }}</div>
                            @endif
                            <form class="row g-4" wire:submit.prevent="login">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input style="border: groove" wire:model.lazy='client_fhonewhats'
                                            type="client_fhonewhats" class="form-control" id="phone"
                                            placeholder="{{ __('front.phone') }}">
                                        <label for="phone">{{ __('front.phone') }}</label>
                                        @error('client_fhonewhats')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input style="border: groove" wire:model.lazy='password' type="password"
                                            class="form-control" id="password"
                                            placeholder="{{ __('front.password') }}">
                                        <label for="password">{{ __('front.password') }}</label>
                                        @error('password')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                wire:model.lazy='remember' id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">تذكرنى</label>
                                        </div>
                                        <a href="/resetpassword" class="forgot-password">نسيت الرقم السرى ؟</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div wire:ignore id="recaptcha-container"></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center"
                                        type="submit">{{ __('front.login') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="/sign-up">{{ __('front.signup') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('jslive')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    {{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script> --}}

    <script>
        // var firebaseConfig = {
        //     apiKey: "AIzaSyASFQiDiY62XTCm7KE9Xx5K03wippJBWqo",
        //     authDomain: "order-48bfc.firebaseapp.com",
        //     projectId: "order-48bfc",
        //     storageBucket: "order-48bfc.appspot.com",
        //     messagingSenderId: "324270172795",
        //     appId: "1:324270172795:web:d2f7354ffcee3d9fc810de",
        //     measurementId: "G-4DX5NRLD86",
        //     databaseURL: 'https://project-id.firebaseio.com',
        // };
        // firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        // window.onload = function() {
        //     render();
        // };

        // function render() {
        //     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        //         // size: "invisible"
        //     });
        //     recaptchaVerifier.render();
        // }

        // window.addEventListener('sendOTP', e => {
        //     firebase.auth().settings.appVerificationDisabledForTesting = true;
        //     firebase.auth().signInWithPhoneNumber(e.detail.phone, window.recaptchaVerifier).then(function(
        //         confirmationResult) {
        //         window.confirmationResult = confirmationResult;
        //         coderesult = confirmationResult;
        //         // window.livewire.emit('success', coderesult);
        //         @this.set('showotp', true);
        //         // console.log(coderesult);

        //     }).catch(function(error) {
        //         $("#error").text(error.message);
        //         $("#error").show();
        //     });
        // })



        // function verify() {
        //     var code = $("#verification").val();
        //     coderesult.confirm(code).then(function(result) {
        //         window.livewire.emit('verify')
        //     }).catch(function(error) {
        //         console.log(error.message);;
        //     });
        // }
    </script>
@endpush
