<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_user_sales') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="{{ __('tran.report_user_sales') }}" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-3">
                                <x-label for="formusers" label="اختار المستخدم" />
                                <x-selectc id="formusers" emit='selectedItem' :items='$userdesck'
                                    selectnull='اختيار المستخدم' value='id' display='user_name' />
                            </div>
                            <div class="col-md-3">
                                <x-label for="typeinvo" label="نوع الفاتورة" />
                               <select class=" form-select" >
                                <option value='1'>الكل</option>
                                <option value='1'>مبيعات</option>
                                <option value='1'>مشتريات</option>
                                <option value='1'>مرتجعات</option>
                               </select>
                            </div>
                            <div class="col-md-3">
                                <x-label for="fromdate" label="من" />
                                <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                            </div>
                            <div class="col-md-3">
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
                            {{-- @if (count($shifts) > 0)
                                <h3> تقرير شفت - {{ $username }}</h3>
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
                                    <th>{{ __('tran.namesafe') }}</th>
                                    <th>{{ __('tran.start_shift') }}</th>
                                    <th>{{ __('tran.balance') }}</th>
                                    <th>{{ __('tran.sales') }}</th>
                                    <th>{{ __('tran.returns') }}</th>
                                    <th>{{ __('tran.purchases') }}</th>
                                    <th>{{ __('tran.returns_purchases') }}</th>
                                    <th>{{ __('tran.advance') }}</th>
                                    <th>{{ __('tran.revenues') }}</th>
                                    <th>{{ __('tran.expenses') }}</th>
                                    <th>{{ __('tran.end_shift') }}</th>
                                    <th>{{ __('tran.final_balance') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($salesheader as $item)
                                    <tr>
                                        <td>{{ $shift->safe->safe_name ?? 'N/A' }}</td>
                                        <td>{{ $shift->StartDate ?? 'N/A' }}</td>
                                        <td>{{ $shift->FirstBalance ?? 'N/A' }}</td>
                                        <td>{{ $shift->totalSaels ?? 'N/A' }}</td>
                                        <td>{{ $shift->totalRetrnSaels ?? 'N/A' }}</td>
                                        <td>{{ $shift->totalPorshes ?? 'N/A' }}</td>
                                        <td>{{ $shift->totalRetrnProsh ?? 'N/A' }}</td>
                                        <td>{{ $shift->totalSalfeat ?? 'N/A' }}</td>
                                        <td>{{ $shift->TotalIncome ?? 'N/A' }}</td>
                                        <td>{{ $shift->TotalExprte ?? 'N/A' }}</td>
                                        <td>{{ $shift->EndDate ?? 'N/A' }}</td>
                                        <td>{{ $shift->LastBalance ?? 'N/A' }}</td>
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
