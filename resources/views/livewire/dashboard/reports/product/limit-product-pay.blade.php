<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_limit_product') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="report_limit_product" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formproducts" label="اختار الصنف" />
                                <x-selectc id="formproducts" emit='selectedItem' :items='$productlist'
                                    selectnull='جميع الاصناف' value='id' display="productheader" lvl2="product_name"
                                    display2="unit" displaylvl2="unit_name" />

                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <span class="alert alert-info text-center mt-2">


                            <div class="spinner-border text-info" role="status" wire:loading>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div   wire:loading>
                                <span class="visually-hidden">Loading...</span>
                                <h6>جارى تحميل التقرير</h6>
                            </div>

                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.product') }}</th>
                                    <th>{{ __('tran.qtystock') }}</th>
                                    <th>{{ __('tran.qty') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($products as $product)
                                    <tr>

                                        <td>{{ $product->productheader()->Countpurchase()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Sumpurchase()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Countreturned()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Sumreturned()?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse --}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
    </script>
@endpush
