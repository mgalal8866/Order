<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.units') }}</h4>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.state') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($units  as $unit)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $unit->unit_name }}</span>
                                    </td>
                                    <td><span
                                            class="badge rounded-pill badge-glow bg-{{ $unit->unit_active == 0 ? 'danger' : 'success' }}">{{ $unit->unit_active == 0 ? 'غير مفعل ' : 'مفعل' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('unit', $unit->id) }}">{{ __('tran.edit') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="alert alert-danger text-center"> No Data Here</td>
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
