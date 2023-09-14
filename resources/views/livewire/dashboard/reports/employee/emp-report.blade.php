<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_emp') }}</h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="report_emp" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="d-flex justify-content-between ">

                    </div>
                    <div class="row">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="scales">المفعلين</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='active' id="scales"
                                    {{ $active == 0 ? 'checked' : '' }} />
                                <label class="form-check-label" for="scales">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.emp_code') }}</th>
                                    <th>{{ __('tran.emp_name') }}</th>
                                    <th>{{ __('tran.emp_phone') }}</th>
                                    <th>{{ __('tran.emp_salery') }}</th>
                                    <th>{{ __('tran.emp_position') }}</th>
                                    <th>{{ __('tran.last_update') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>

                                        <td>{{ $employee->code ?? 'N/A' }}</td>
                                        <td>{{ $employee->name ?? 'N/A' }}</td>
                                        <td>{{ $employee->phone ?? 'N/A' }}</td>
                                        <td>{{ $employee->pay_sel ?? 'N/A' }}</td>
                                        <td>{{ $employee->job->jobs_name ?? 'N/A' }}</td>
                                        <td>{{ $employee->updated_at ?? 'N/A' }}</td>

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
