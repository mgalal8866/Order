<div>


    {{-- <livewire:front.slider/> --}}
    <livewire:front.product.searchproduct>
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
                                            <a wire:click.prevent="selectid(null)" href="">الجميع</a>
                                        </h5>
                                    </div>
                                </li>
                                @foreach ($categorys as $category)
                                    <li>
                                        <div class="category-list">
                                            {{-- <img src="{{asset('front/assets/svg/1/vegetable.svg')}}" class="blur-up lazyload" alt=""> --}}
                                            <h5>
                                                <a wire:click.prevent="selectid({{ $category->id }})"
                                                    href="">{{ $category->category_name }}</a>
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @empty($data['offers'])
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
                    @endempty
                    <div class="col-xxl-9 col-lg-8">
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
                    </div>
                </div>
            </div>
        </section>
</div>
