<div>
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate product-wrapper no-arrow">
                        @foreach ($sliders as $item)
                            <div>
                                <div class="banner-contain-2 hover-effect">
                                    <img src="{{$item->image}}" class="bg-img rounded-3 blur-up lazyload" alt="">
                                    <div
                                        class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                        <div>
                                            <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                            <h3>Save upto 50%</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
