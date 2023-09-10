<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_paymenets_users') }}   {{$clientpayments[0]->clientpay_source->client_name??''}}</h4>
                    <livewire:dashboard.exportbutton :routeprint='route("home")' :data='$exportdata' :header='$exportheader'>
                </div>
                <div class="card-body ">
                    <div class="d-flex justify-content-between ">

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


                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.fromeamount') }}</th>
                                    <th>{{ __('tran.paidamount') }}</th>
                                    <th>{{ __('tran.newamount') }}</th>
                                    <th>{{ __('tran.payment_method') }}</th>
                                    {{-- <th>{{ __('tran.last_update') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientpayments as $clientpay)
                                    <tr>
                                        <td>{{ $clientpay->fromeamount ?? 'N/A' }}</td>
                                        <td>{{ $clientpay->paidamount ?? 'N/A' }}</td>
                                        <td>{{ $clientpay->newamount ?? 'N/A' }}</td>
                                        <td>{{ $clientpay->payment_method ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="alert alert-danger text-center"> No Data Here</td>
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
