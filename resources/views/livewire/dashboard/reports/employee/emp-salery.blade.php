<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.employee_advance') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="{{ __('tran.employee_advance') }}" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formusers" label="اختار الموظف" />
                                <x-selectc id="formusers" emit='selectedItem' :items='$employees'
                                    selectnull='الجميع' value='id' display='name' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="fromdate" label="من" />
                                <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="todate" label="الى" />
                                <x-daterange id="todate" wire:model.lazy='todate' :date='$todate' />
                            </div>
                            {{-- <div class="col-md-4 align-self-center mt-2">
                                <div class="text-center">
                                    <button class="btn btn-success " wire:click='filterdate'>بحث</button>
                                </div>
                            </div> --}}

                        </div>
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
                        <span class="alert alert-info text-center mt-2">
                            {{-- @if (count($statements) > 0)
                                <h3> تقرير سلفيات الموظفين  {{ $username }}</h3>
                            @endif --}}
                            <h4>تاريخ التقرير من {{ $fromdate }} الى {{ $todate }}</h4>
                            <div class="spinner-border text-info" role="status" wire:loading>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div wire:loading>
                                <span class="visually-hidden">Loading...</span>
                                <h6 class="text-danger">جارى تحميل التقرير</h6>
                            </div>
                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.name_emp') }}</th>
                                    <th>{{ __('tran.type_advance') }}</th>
                                    <th>{{ __('tran.details') }}</th>
                                    <th>{{ __('tran.amount') }}</th>
                                    <th>{{ __('tran.username') }}</th>
                                    <th>{{ __('tran.namesafe') }}</th>
                                    <th>{{ __('tran.date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($statements as $statement)
                                    <tr>
                                        <td>{{ $statement->employee->name ?? 'N/A' }}</td>
                                        <td>{{ $statement->Statements_Type ?? 'N/A' }}</td>
                                        <td>{{ $statement->Statements_TypeDetils ?? 'N/A' }}</td>
                                        <td>{{ $statement->Amount ?? 'N/A' }}</td>
                                        <td>{{ $statement->userdesck->user_name ?? 'N/A' }}</td>
                                        <td>{{ $statement->safe->safe_name ?? 'N/A' }}</td>
                                        <td>{{ $statement->created_at ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse --}}
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
