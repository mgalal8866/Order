<div>
    <x-breadcrumb name="الاقسام" />
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">

                @empty(!$data['products'])
                    <div class="col-xxl-12 col-lg-12">
                        <div class="title d-block">
                            <h2 class="text-theme font-sm">{{$cat->category_name?? ($categoryid == null?'الكل':'قسم غير موجود')}}</h2>
                        </div>
                        <div
                            class="row row-cols-xxl-5 row-cols-xl-6 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">

                            @forelse ($data['products'] as $product)
                            @livewire('front.compon.product', ['product' => $product], key($product->id))
                                @empty
                                <div>
                                  <h3>لايوجد منتجات حاليا</h3>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </section>

</div>
