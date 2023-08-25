<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.gallery') }}</h4>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.text') }}</th>
                                <th>{{ __('tran.image') }}</th>
                                {{-- <th>{{ __('tran.state') }}</th>
                                <th>{{ __('tran.action') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gallery  as $item)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $item->text }}</span>
                                    </td>
                                    <td> <img src=" {{ $item->img ?? 'N/A' }}" class="me-75" height="50"
                                            width="100" />
                                    </td>
                                    {{-- <td><span
                                            class="badge rounded-pill badge-glow bg-{{ $item->active == 0 ? 'danger' : 'success' }}">{{ $item->active == 0 ? 'غير مفعل' : 'مفعل' }}</span>
                                    </td>
                                    <td><a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('slider', $item->id) }}">{{ __('tran.edit') }}</a></td>
                                </tr> --}}
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
