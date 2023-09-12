<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_balance_supplier') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formusers" label="اختار العميل" />
                                <x-selectc id="formusers" emit='selectedItem' :items='$users'
                                    selectnull='جميع العملاء' value='id' display='client_name' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="alert alert-info text-center mt-2">
                            @if (count($usersbalance) ==1 )
                                <h3> رصيد {{ $usersbalance[0]->client_name }}</h3>
                            @endif
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
                                @forelse ($usersbalance as $item)
                                    <tr>
                                        <td>{{ $item->client_name?? 'N/A' }}</td>
                                        <td>{{ $item->client_Balanc ?? 'N/A' }}</td>
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
