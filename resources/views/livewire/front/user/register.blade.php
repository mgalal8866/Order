<div>
    <x-breadcrumb name="Login" />
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('asset/images/sign-up.png') }}" class="img-fluid" alt="sign-up">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-8 col-lg-8 col-sm-8 mx-auto">
                {{-- <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto"> --}}

                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>مرحبا بك </h3>
                            <h4>تسجيل مستخدم جديد</h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" wire:submit.prevent="registerion">
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
                                            <input style="border: groove" wire:model.lazy='password'
                                                type="password" class="form-control" id="password"
                                                placeholder="{{ __('front.password') }}">
                                            <label for="password">{{ __('front.password') }}</label>
                                            @error('password')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input id="namecust" type="text" class="form-control"
                                                wire:model.defer="namecust" required>
                                            <label for="namecust">{{ __('front.namecust') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input id="store_name" type="text" class="form-control"
                                                wire:model.defer="store_name" required>
                                            <label for="store_name">{{ __('front.store_name') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input id="client_state" type="text" class="form-control"
                                                wire:model.defer="client_state" required>
                                            <label for="client_state">{{ __('front.client_state') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input id="client_code" type="text" class="form-control"
                                                wire:model.defer="client_code">
                                            <label for="client_code">{{ __('front.client_code') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <input type="text" class="form-control" wire:model.defer="phone2" >
                                            <label for="phone2">{{ __('front.phone2') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-control" wire:model.lazy="question1_id" required>
                                                <option value="0">اختار السؤال الاول</option>
                                                @foreach ($question as $item)
                                                    <option value="{{ $item->id }}">{{ $item->question }}</option>
                                                @endforeach
                                            </select>
                                            <label for="question1">{{ __('front.question1') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating theme-form-floating">
                                            <input id="answer1" type="text" class="form-control"
                                                wire:model.defer="answer1" required>
                                            <label for="answer1">{{ __('front.answer1') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-control" wire:model.lazy="question2_id" required>
                                                <option value="0">اختار السؤال الثانى</option>
                                                @foreach ($question as $item)
                                                    <option value="{{ $item->id }}">{{ $item->question }}</option>
                                                @endforeach
                                            </select>
                                            <label for="question2">{{ __('front.question2') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating theme-form-floating">
                                            <input id="answer2" type="text" class="form-control"
                                                wire:model.defer="answer2" required>
                                            <label for="answer2">{{ __('front.answer2') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-control" wire:model.lazy="selectcity" required>
                                                <option value="0">اختار المدينة</option>
                                                @foreach ($citys as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="city">{{ __('front.city') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-control" wire:model="selectstate" required>
                                                <option value="0">اختار المنطقة</option>
                                                @foreach ($states as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="state">{{ __('front.state') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating">
                                            <select id="nashat" class="form-control" wire:model="selectnashat" required>
                                                <option value="0">اختار النشاط</option>
                                                @foreach ($nashat as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="nashat">{{ __('front.nashat') }}</label>
                                        </div>
                                    </div>

                                    {{-- <div class="col-12">
                                        <div class="forgot-box">
                                            <div class="form-check ps-0 m-0 remember-box">
                                                <input class="checkbox_animated check-box" type="checkbox"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">I agree with
                                                    <span>Terms</span> and <span>Privacy</span></label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">تسجيل</button>
                                    </div>
                                </form>

                        </div>
                        <div class="other-log-in">
                            <h6></h6>
                        </div>
                        <div class="sign-up-box">
                            <h4>تمتلك حساب بالفعل ؟</h4>
                            <a href="/login">تسجيل دخول</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
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
        //         size: "invisible"
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
        //         @this.set('showotp', 2);
        //         // console.log(coderesult);

        //     }).catch(function(error) {
        //         $("#error").text(error.message);
        //         $("#error").show();
        //     });
        // })



        // function verify() {
        //     var code = $("#verification").val();
        //     coderesult.confirm(code).then(function(result) {
        //         @this.set('showotp', 3);
        //         // window.livewire.emit('verify')
        //     }).catch(function(error) {
        //         console.log(error.message);;
        //     });
        // }
    </script>
@endpush
