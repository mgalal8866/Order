<div>
    <x-breadcrumb name="Login" />

    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/log-in.png"
                            class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>مرحبا بك</h3>
                            <h4>{{ __('front.login') }}</h4>
                        </div>

                        <div class="input-box">
                            <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                            {{-- <form>
                                <label>Phone Number:</label>
                                <input type="text" id="number" class="form-control" placeholder="+91 ********">
                                <div wire:ignore id="recaptcha-container"></div>
                                <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send
                                    OTP</button>
                            </form> --}}
                            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

                            <form>
                                <input type="text" id="verification" class="form-control"
                                    placeholder="Verification code">
                                <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify
                                    code</button>
                            </form>
                            <form class="row g-4" wire:submit.prevent="login">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input wire:model.lazy='phone' type="phone" class="form-control"
                                            id="phone" placeholder="{{ __('front.phone') }}">
                                        <label for="phone">{{ __('front.phone') }}</label>
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
                </div>
            </div>
        </div>
    </section>
</div>
@push('jslive')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    {{-- <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script> --}}
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
    </script>
    <script type="text/javascript">
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        window.addEventListener('sendOTP', e => {

            firebase.auth().signInWithPhoneNumber(e.detail.phone, window.recaptchaVerifier).then(function(
                confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                Livewire.emit('success', coderesult);
                console.log(coderesult);
                // $("#successAuth").text("Message sent");
                // $("#successAuth").show();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        })

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {
                 data = @this.susses;
            })
        });

        function verify() {
            var code = $("#verification").val();

            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
@endpush
