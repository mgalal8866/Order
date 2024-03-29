<div>


    {{-- <livewire:front.slider/> --}}
    <livewire:front.product.search>
        <livewire:front.sliderbar>
            <section class="section-b-space">
                <div class="container-fluid-lg">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-4 d-none d-lg-block">
                            <div class="category-menu menu-xl">
                                <ul>
                                    <li>
                                        <div class="category-list">
                                            {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                            <h5>
                                                <a href="{{ route('categoryproduct', ['categoryid' => null]) }}" >الجميع</a>
                                                {{-- <a wire:click.prevent="selectid(null)" href="">الجميع</a> --}}
                                            </h5>
                                        </div>
                                    </li>
                                    @foreach ($categorys as $category)
                                        <li>
                                            <div wire:ignore.self class="category-list">
                                                {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                                <h5>
                                                     <a href="{{ route('categoryproduct', ['categoryid' => $category->id]) }}" >{{ $category->category_name }}</a>

                                                    {{-- <a wire:click.prevent="selectid({{ $category->id }})" href="">{{ $category->category_name }}</a> --}}
                                                </h5>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-9 col-lg-8">
                            @if (count($data['offers']) >= 1)
                                <div class="title d-block">
                                    <h2 class="text-theme font-sm">{{ __('tran.offer') }}</h2>
                                </div>
                                <div  wire:ignore class="slider-7_1 arrow-slider img-slider">
                                {{-- <div class="slider-6  slick-slider product-wrapper"> --}}
                                    @foreach ($data['offers'] as $index => $product)
                                        @livewire('front.compon.offer', ['product' => $product], key('o'.$index))
                                    @endforeach
                                </div>
                            @endif
                            <div class="title d-block">
                                <h2 class="text-theme font-sm">{{ __('tran.products') }}</h2>
                            </div>
                            <div  wire:ignore.self  class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                                    section-b-space">
                                @foreach ($data['products']  as $index=> $product)
                                    @livewire('front.compon.product', ['product' => $product], key('p'.$index))
                                @endforeach
                            </div>
                            <button type="button" class="btn  mt-sm-4 btn-2 theme-bg-color text-white mend-auto "
                                wire:click="loadmore()">المزيد</button>

                        </div>
                        {{-- @empty(!$data['offers'])
                            <div class="col-xxl-9 col-lg-8">
                                <div class="title d-block">
                                    <h2 class="text-theme font-sm">{{ __('tran.offer') }}</h2>
                                </div>
                                <div
                                    class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">
                                    @foreach ($data['offers'] as $product)
                                    @endforeach
                                </div>
                            </div>
                        @endempty --}}
                        {{-- <div class="col-xxl-9 col-lg-8">
                            <div class="title d-block">
                                <h2 class="text-theme font-sm">{{ __('tran.products') }}</h2>
                            </div>
                            <div
                                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                                section-b-space">
                                @foreach ($data['products'] as $product)
                                    @livewire('front.compon.product', ['product' => $product], key($product->id))
                                @endforeach
                            </div>
                            <button type="button" class="btn  mt-sm-4 btn-2 theme-bg-color text-white mend-auto "
                                wire:click="loadmore()">المزيد</button>
                        </div> --}}
                    </div>
                </div>
            </section>
</div>
