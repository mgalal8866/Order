<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_client_moreandless') }} </h4>
                    @if (count($exportdata) > 0)
                        <livewire:dashboard.exportbutton namereport="كشف اعلى واقل العملاء شراء" :data='$exportdata'>
                    @endif
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="formusers" label="اختار العميل" />
                                <x-selectc id="formusers" emit='selectedItem' :items='$userslist'
                                    selectnull='جميع العملاء' value='source_id' display='client_name' />
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
                            @if (count($userspayments) > 0)
                                <h3> كشف حساب  - {{ $username }}</h3>
                            @endif
                            <h4>تاريخ التقرير من {{ $fromdate }} الى {{ $todate }}</h4>
                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.namecustom') }}</th>
                                    <th>{{ __('tran.purchases') }}</th>
                                    <th>{{ __('tran.valuepurchases') }}</th>
                                    <th>{{ __('tran.returned') }}</th>
                                    <th>{{ __('tran.valuereturned') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->client_name ?? 'N/A'  }} </td>
                                        <td>{{ $user->salesheader()->Countpurchase()?? 'N/A' }}</td>
                                        <td>{{ $user->salesheader()->Sumpurchase()?? 'N/A' }}</td>
                                        <td>{{ $user->salesheader()->Countreturned()?? 'N/A' }}</td>
                                        <td>{{ $user->salesheader()->Sumreturned()?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-danger text-center"> No Data Here</td>
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
