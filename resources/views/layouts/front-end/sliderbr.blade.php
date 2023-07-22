<section class="home-search-full pt-0 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">
                    <div>
                        <div class="home-contain rounded-0 p-0">
                            <img src="{{asset('front/assets/images/vegetable/bg-img.jpg')}}"
                                class="img-fluid bg-img blur-up lazyload bg-top" alt="">
                            <div class="home-detail p-center text-center home-overlay position-relative">
                                <div>
                                    <div class="content">
                                        <h1>Get your grocery in 25 minutes</h1>
                                        <h3>Better ingredients, better food, and beverages, at low prices</h3>
                                        <div class="search-box">
                                            {{-- <form > --}}

                                                <input wire:keydown.enter='gotosearch' wire:model.defer='search' type="search" class="form-control"
                                                placeholder="I'm searching for..."
                                                aria-label="Recipient's username">
                                                <i data-feather="search"></i>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
