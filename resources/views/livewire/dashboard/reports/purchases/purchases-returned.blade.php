<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_purchases_returned') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="{{__('tran.report_purchases_returned')}}" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formusers" label="اختار المورد" />
                                <x-selectc id="formusers" emit='selectedItem' :items='$suppliers'
                                    selectnull='اختيار المورد' value='id' display='Supplier_name' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="fromdate" label="من" />
                                <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="todate" label="الى" />
                                <x-daterange id="todate" wire:model.lazy='todate' :date='$todate' />
                            </div>
                            {{-- <div class="col-md-4 align-self-center mt-2">
                                <div class="text-center">
                                    <button class="btn btn-success " wire:click='filterdate'>بحث</button>
                                </div>
                            </div> --}}

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

                            <h4>تاريخ التقرير من {{ $fromdate }} الى {{ $todate }}</h4>
                            <div class="spinner-border text-info" role="status" wire:loading>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div   wire:loading>
                                <span class="visually-hidden">Loading...</span>
                                <h6 class="text-danger"  >جارى تحميل التقرير</h6>
                            </div>
                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.num_invo') }}</th>
                                    <th>{{ __('tran.name_supplier') }}</th>
                                    <th>{{ __('tran.date') }}</th>
                                    <th>{{ __('tran.total') }}</th>
                                    {{-- <th>{{ __('tran.user') }}</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($purchases as $purchas)
                                    <tr>
                                        <td>{{ $purchas->invoice_Number ?? 'N/A' }}</td>
                                        <td>{{ $purchas->supplier->Supplier_name ?? 'N/A' }}</td>
                                        <td>{{Carbon::parse( $purchas->created_at)->format('Y/m/d') ?? 'N/A' }}</td>
                                        <td>{{ $purchas->Grand_Total ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="alert alert-danger text-center"> No Data Here</td>
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
