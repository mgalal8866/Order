<footer class="section-t-space">
    <div class="container-fluid-lg">
        <div class="service-section">
            <div class="row g-3">
                <div class="col-12">
                    <div class="service-contain">
                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{asset('front/assets/svg/product.svg')}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>كل اللى تحتاجهة موجود</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{asset('front/assets/svg/delivery.svg')}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>توصيل</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{asset('front/assets/svg/discount.svg')}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>خصومات</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="{{asset('front/assets/svg/market.svg')}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>افضل سعر</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="index.html">
                                <img src="{{$setting->logo_shop}}"  width="50" class="blur-up lazyload" alt="">
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>We are a friendly bar serving a variety of cocktails, wines and beers. Our bar is a
                                perfect place for a couple.</p>

                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a href="javascript:void(0)">{{$setting->address_shop}}</a>
                                </li>
                                <li>
                                    <i data-feather="mail"></i>
                                    <a href="javascript:void(0)">support@fastkart.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-title">
                        <h4>الاقسام</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="{{route('categoryproduct',['categoryid'=>null])}}" class="text-content">الكل</a>
                            </li>
                            @foreach ( $categorys as $cate)

                            <li>
                                <a href="{{route('categoryproduct',['categoryid'=>$cate->id])}}" class="text-content">{{$cate->category_name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>


                <div class="col-xl-2 col-sm-3">
                    <div class="footer-title">
                        <h4>المساعدة</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            {{-- <li>
                                <a href="order-success.html" class="text-content">طلباتى</a>
                            </li> --}}
                            <li>
                                <a href="/user/dashboard" class="text-content">حسابى</a>
                            </li>
                            {{-- <li>
                                <a href="order-tracking.html" class="text-content">تتبع الطلب</a>
                            </li> --}}
                            <li>
                                <a href="/wishlist" class="text-content">المفضلة</a>
                            </li>
                            <li>
                                <a href="/product/search" class="text-content">البحث</a>
                            </li>
                            {{-- <li>
                                <a href="faq.html" class="text-content">FAQ</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>تواصل معنا</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Hotline 24/7 :</h6>
                                        <h5>{{$setting->phone_shop}}</h5>
                                    </div>
                                </div>
                            </li>

                            {{-- <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Email Address :</h6>
                                        <h5>fastkart@hotmail.com</h5>
                                    </div>
                                </div>
                            </li> --}}

                            <li class="social-app mb-0">
                                <h5 class="mb-2 text-content">تحميل التطبيق :</h5>
                                <ul>
                                    <li class="mb-0">
                                        <a href="https://play.google.com/store/apps/details?id=net.elshroq.order" target="_blank">
                                            <img src="{{asset('front/assets/images/playstore.svg')}}" class="blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="https://www.apple.com/in/app-store/" target="_blank">
                                            <img src="{{asset('front/assets/images/appstore.svg')}}" class="blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©2023 Mohamed Galal All rights reserved</h6>
            </div>

            {{-- <div class="payment">
                <img src="{{asset('front/assets/images/payment/1.png')}}" class="blur-up lazyload" alt="">
            </div> --}}

            {{-- <div class="social-link">
                <h6 class="text-content">Stay connected :</h6>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.pinterest.com/" target="_blank">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</footer>
