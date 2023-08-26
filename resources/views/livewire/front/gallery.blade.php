<div>
 <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            {{-- <div class="row g-4"> --}}
                <div class="col-xxl-12 col-xl-12 col-lg-12 order-lg-12">
                    <div class="row g-4 ratio_65">
                        
                        @forelse ($gallery as $item )
                        <div class="col-xxl-4 col-sm-6">
                            <div class="blog-box wow fadeInUp" data-wow-delay="0.05s">
                                <div class="blog-image">
                                    <a href="#">
                                        <img src="{{$item->img}}" class="bg-img" alt="">
                                    </a>
                                </div>
                                <div class="blog-contain">
                                    {{-- <div class="blog-label">
                                     <span class="time"><i data-feather="clock"></i> <span>25 Feg, 2022</span></span>
                                     <span class="super"><i data-feather="user"></i> <span>rebeus
                                                hagrid</span></span>
                                    </div> --}}
                                    <a href="#">
                                        <h3>{{$item->text}}</h3>
                                    </a>
                                    {{-- <button onclick="location.href = '#';" class="blog-button">Read More
                                        <i class="fa-solid fa-right-long"></i></button> --}}
                                </div>
                            </div>
                        </div>

                        @empty
                            <h2>لايوجد صور</h2>
                        @endforelse

                    </div>

                </div>

            {{-- </div> --}}
        </div>
    </section>
</div>
