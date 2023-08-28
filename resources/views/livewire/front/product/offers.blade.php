<div>
    <x-breadcrumb name="العروض" />
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">

                @empty(!$data['offers'])
                    <div class="col-xxl-9 col-lg-8">
                        <div class="title d-block">
                            <h2 class="text-theme font-sm">{{ __('tran.offer') }}</h2>
                        </div>
                        <div
                            class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                              section-b-space">

                            @forelse ($data['offers'] as $product)
                                @livewire('front.compon.product', ['product' => $product],:wire:key="$loop->index")
                            @empty
                                <div>
                                    <h3>لايوجد عروض حاليا</h3>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </section>


</div>
