<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.invoiceclose') }}</h4>

                </div>
                <div class="card-body ">
                    <div class="row mb-2">
                        <div class="col-3 col-md-3">
                            <label class="form-label" for="name">بحث (باسم العميل او رقم التليفون )</label>
                            <input type="text" wire:model='search' id="search" name="search"
                                class="form-control" required />
                        </div>
                    {{-- </div>
                    <div class="row mb-3"> --}}
                        <div class="col-md-3">
                            <x-label for="fromdate" label="من" />
                            <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                        </div>
                        <div class="col-md-3">
                            <x-label for="todate" label="الى" />
                            <x-daterange id="todate" wire:model.lazy='todate' :date='$todate' />
                        </div>

                    </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.namecustom') }}</th>
                                <th>{{ __('tran.storename') }}</th>
                                <th>{{ __('tran.phonecustom') }}</th>
                                <th>{{ __('tran.invoicenumber') }}</th>
                                <th>{{ __('tran.invodate') }}</th>
                                <th>{{ __('tran.invototal') }}</th>
                                <th>{{ __('tran.invodesc') }}</th>
                                <th>{{ __('tran.invopaytayp') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices  as $invo)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $invo->user->client_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>

                                        <span class="fw-bold">{{ $invo->user->store_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $invo->user->client_fhonewhats ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $invo->invoicenumber ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        {{ $invo->invoicedate ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $invo->grandtotal ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $invo->totaldiscount ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $invo->paytayp    ?? 'N/A' }}
                                    </td>
                                    <td><a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('invodetails-close', [$invo->id]) }}">{{ __('tran.invodetails') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="18" class="alert alert-danger text-center"> No Data Here</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>

                </div>
                <div class="card-footer  d-flex justify-content-center">
                    {{ $invoices->links() }}
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
