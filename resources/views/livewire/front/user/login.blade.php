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

                    @if ($showotp == true)
                        <div id="varr" class="log-in-box">
                            {{-- style="display:none;" --}}
                            <div class="log-in-title">
                                <h3 class="text-title">سوف تتلقى رسالة تحتوى على كود </h3>
                                <h5 class="text-content">تم الارسال على رقم
                                    <span dir="ltr">{{ Str::mask($this->client_fhonewhats, '*', -11, 8) }}</span>
                                </h5>
                            </div>
                            {{-- <form  wire:submit.prevent="verify()"> --}}
                            {{-- <div id="otp" class="inputs d-flex flex-row justify-content-center">
                            <input class="text-center form-control rounded" type="text" id="first" maxlength="1"
                                placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="second" maxlength="1"
                                placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="third" maxlength="1"
                                placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="fourth" maxlength="1"
                                placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="fifth" maxlength="1"
                                placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="sixth" maxlength="1"
                                placeholder="0">
                            </div> --}}
                            <input type="text" id="verification" class="form-control"
                                placeholder="Verification code">
                            <div class="send-box pt-4">
                                <h5>لم اتلقى كود حتى الان ؟<a href="javascript:void(0)"
                                        class="theme-color fw-bold">اعاده
                                        ارسال</a></h5>
                            </div>

                            <button  class="btn btn-animation w-100 mt-3" type="submit">تحقق</button>
                            {{-- </form> --}}
                        </div>
                        {{-- <form>
                        <input type="text" id="verification" class="form-control" placeholder="Verification code">
                        <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify
                            code</button>
                            </form> --}}
                    @else
                        <div id="login11" class="log-in-box">
                            <div class="log-in-title">
                                <h3>مرحبا بك</h3>
                                <h4>{{ __('front.login') }}</h4>
                            </div>
                            <div class="input-box">
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
                                <a href="/register">{{ __('front.signup') }}</a>
                            </div>
                        </div>
                    @endif

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
