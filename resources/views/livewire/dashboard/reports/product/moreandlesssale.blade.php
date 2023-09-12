<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_client_moreandless') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="كشف اعلى واقل العملاء شراء" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formproducts" label="اختار الصنف" />
                                <x-selectc id="formproducts" emit='selectedItem' :items='$productlist'
                                    selectnull='جميع الاصناف' value='id' display="productheader"  lvl2="product_name" display2="unit"  displaylvl2="unit_name"/>

                            </div>
                            <div class="col-md-4">
                                <x-label for="fromdate" label="من" />
                                <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="todate" label="الى" />
                                <x-daterange id="todate" wire:model.lazy='todate' :date='$todate' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-2">
                            <label for="pages">عرض</label>
                            <select class="form-select" wire:model="pg" name="pages" id="pages">
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                        </div> --}}
                        <span class="alert alert-info text-center mt-2">
                            @if (count($productspayments) > 0)
                                <h3> كشف حساب  - {{ $username }}</h3>
                            @endif
                            <h4>تاريخ التقرير من {{ $fromdate }} الى {{ $todate }}</h4>
                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.product') }}</th>
                                    <th>{{ __('tran.qty') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->productheader->product_name . ' ' . $product->unit->unit_name ?? 'N/A'  }} </td>
                                        {{-- <td>{{ $product->salesdetails->sale_header->invoicetype == 0 ?'مبيعات':'مرتجع' }} </td> --}}
                                        <td>{{ $product->salesdetails->sum('quantity')?? 'N/A'  }} </td>
                                        {{-- <td>{{ $product->productheader()->Countpurchase()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Sumpurchase()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Countreturned()?? 'N/A' }}</td>
                                        <td>{{ $product->productheader()->Sumreturned()?? 'N/A' }}</td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse
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
