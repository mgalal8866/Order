<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.product') }}</h4>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.state') }}</th>
                                <th>{{ __('tran.mainsub') }}</th>
                                <th>{{__('tran.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorys  as $category)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $category->category_name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill badge-glow bg-{{ $category->category_active == 0 ? 'danger' : 'success' }}">{{  $category->category_active == 0 ? 'غير مفعل' : 'مفعل'}}</span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill badge-glow bg-{{ $category->parent_id == null ? 'danger' : 'success' }}">{{  $category->parent_id == null ? ' قسم رئيسي' : ' قسم فرعى من  ' . $category->_parent->category_name }}</span>
                                    </td>
                                    <td><a class="btn btn-flat-warning waves-effect" href="{{route('category', $category->id)}}"   >{{__('tran.edit')}}</a></td>
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
