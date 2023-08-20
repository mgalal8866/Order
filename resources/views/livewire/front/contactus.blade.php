<div>
    <!-- Contact Box Section Start -->
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="row">
                            {{-- <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="{{ asset('front/assets/images/inner-page/contact-us.png') }}"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div> --}}
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>تواصل بنا</h3>
                                </div>

                                <div class="contact-detail">
                                    <div class="row g-4">
                                        @empty(!$setting->phone_shop)
                                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                <div class="contact-detail-box">
                                                    <div class="contact-icon">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </div>
                                                    <div class="contact-detail-title">
                                                        <h4>تليفون</h4>
                                                    </div>

                                                    <div class="contact-detail-contain">
                                                        <p>{{ $setting->phone_shop }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endempty

                                        {{-- <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-detail-title">
                                                    <h4>بريد الكترونى</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>elshrou@.com</p>
                                                </div>
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div> --}}


                                        @empty(!$setting->address_shop)
                                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                <div class="contact-detail-box">
                                                    <div class="contact-icon">
                                                        <i class="fa-solid fa-building"></i>
                                                    </div>
                                                    <div class="contact-detail-title">
                                                        <h4>العنوان</h4>
                                                    </div>

                                                    <div class="contact-detail-contain">
                                                        <p>{{ $setting->address_shop }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endempty
                                        @empty(!$setting->facebook)
                                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                <div class="contact-detail-box">
                                                    <div class="contact-icon">

                                                        <i class="fa-brands fa-facebook"></i>
                                                    </div>
                                                    <div class="contact-detail-title">
                                                        <h4>فيس بوك</h4>
                                                    </div>

                                                    <div class="contact-detail-contain">
                                                        <p>{{ $setting->facebook }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endempty
                                        @empty(!$setting->youtube)
                                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                                <div class="contact-detail-box">
                                                    <div class="contact-icon">
                                                  <i class="fa-brands fa-youtube"></i>
                                                    </div>
                                                    <div class="contact-detail-title">
                                                        <h4>فيس بوك</h4>
                                                    </div>

                                                    <div class="contact-detail-contain">
                                                        <p>{{ $setting->youtube }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endempty
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    {{-- <div class="title d-xxl-none d-block">
                        <h2>Contact Us</h2>
                    </div> --}}
                    <div class="right-sidebar-box">
                        <div class="contact-image">
                            <img src="{{ asset('front/assets/images/inner-page/contact-us.png') }}"
                                class="img-fluid blur-up lazyloaded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->

    <!-- Map Section Start -->
    <section class="map-section">
        <div class="container-fluid p-0">

            <div class="map-box">
                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?q={{ $setting->lat?? '31.2409959'}},{{ $setting->long ??'29.998174'}}&hl=es;z=14&amp;output=embed"></iframe>
            </div>
        </div>
    </section>
</div>
