<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.invoiceopen') }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.invoicenumber') }}</th>
                                <th>{{ __('tran.invodate') }}</th>
                                <th>{{ __('tran.invototal') }}</th>
                                <th>{{ __('tran.invodesc') }}</th>
                                <th>{{ __('tran.invopaytayp') }}</th>
                                <th>{{ __('tran.invostate') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices  as $invo)
                                <tr>
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

                                    <td><span
                                            class="badge rounded-pill badge-glow bg-{{ $invo->satus_delivery == 1 ? 'danger' : 'success' }}">{{ $invo->satus_delivery == 1 ? 'غير متممة' : 'متممة'}}</span>
                                    </td>
                                    <td><a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('invodetails', $invo->id) }}">{{ __('tran.invodetails') }}</a>
                                    </td>
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
