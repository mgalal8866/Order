<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_balance_supplier') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton  namereport="report_balance_supplier" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formsuppliers" label="اختار المورد" />
                                <x-selectc id="formsuppliers" emit='selectedItem' :items='$suppliers'
                                    selectnull='جميع الموردين' value='id' display='Supplier_name' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="alert alert-info text-center mt-2">
                            @if (count($suppliersbalance) ==1 )
                                <h3> رصيد {{ $suppliersbalance[0]->Supplier_name }}</h3>
                            @endif
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
                                    <th>{{ __('tran.namecustom') }}</th>
                                    <th>{{ __('tran.balance') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliersbalance as $item)
                                    <tr>
                                        <td>{{ $item->Supplier_name?? 'N/A' }}</td>
                                        <td>{{ $item->Supplier_Balance ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="alert alert-danger text-center"> No Data Here</td>
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
