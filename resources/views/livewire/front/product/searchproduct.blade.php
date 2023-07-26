<div>
    <!-- Search Bar Section Start -->
    <section class="search-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>ابحث فى الكشكول بالاسم او الباركود </h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="search-box">
                        <div class="input-group">
                            <input type="text" wire:model='search' class="form-control" placeholder="ابحث بالاسم او الباركود"
                                aria-label="Example text with button addon" >
                            <button class="btn theme-bg-color text-white m-0" type="button"
                                id="button-addon1" >ابحث</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Bar Section End -->

    <!-- Product Section Start -->
    <section class="section-b-space">
        <div class="col-xxl-9 col-lg-8">
            <div
                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2 g-sm-4 g-3 no-arrow
                        section-b-space">


                    @forelse ($results as $product)
                         @livewire('front.compon.product', ['product' => $product], key($product->id))
                    @empty
                    <div class="search-box">

                        <div class="row title d-block text-center">لايوجد نتائج للبحث   {{$search}} </div>
                    </div>
                    @endforelse

            </div>
        </div>



    </section>
    <!-- Product Section End -->
</div>
