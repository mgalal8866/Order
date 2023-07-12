<div>
    <x-breadcrumb name="Login" />

    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>مرحبا بك</h3>
                            <h4>{{__('front.login')}}</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" wire:submit.prevent="login">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input wire:model.lazy='phone' type="phone" class="form-control" id="phone" placeholder="{{__('front.phone')}}">
                                        <label for="phone">{{__('front.phone')}}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">{{__('front.login')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="/register">{{__('front.signup')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
