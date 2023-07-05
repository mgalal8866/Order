<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.slider') }}</h4>
                        
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.state') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders  as $slider)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $slider->name }}</span>
                                    </td>
                                    <td> <img src=" {{ $slider->image ?? 'N/A' }}" class="me-75" height="50"
                                            width="100" />
                                    </td>
                                    <td><span
                                            class="badge rounded-pill badge-glow bg-{{ $slider->active == 0 ? 'danger' : 'success' }}">{{ $slider->active == 0 ? 'غير مفعل' : 'مفعل' }}</span>
                                    </td>
                                    <td><a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('slider', $slider->id) }}">{{ __('tran.edit') }}</a></td>
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
