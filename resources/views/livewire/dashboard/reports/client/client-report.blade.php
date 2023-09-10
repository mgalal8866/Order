<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header border-bottom p-1">
                    <h4 class="card-title">{{ __('tran.report_users') }}</h4>
                    <livewire:dashboard.exportbutton :routeprint='route("home")' :data='$exportdata' :header='$exportheader'>
                </div>
                <div class="card-body ">
                    <div class="d-flex justify-content-between ">

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="pages">{{ __('show') }}</label>
                            <select class="form-select" wire:model="pg" name="pages" id="pages">
                                <option value="30"> 30 </option>
                                <option value="40"> 40 </option>
                                <option value="50"> 50 </option>
                                <option value="100"> 100 </option>
                                <option value="200"> 200 </option>
                            </select>
                        </div>

                        <div class="col-md-10">
                            <label class="form-label" for="search">بحث</label>
                            <input type="text" wire:model.lazy='search' id="search" name="search"
                            class="form-control" />

                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.client_code') }}</th>
                                    <th>{{ __('tran.namecustom') }}</th>
                                    <th>{{ __('tran.phonecustom') }}</th>
                                    <th>{{ __('tran.phonecustom') }}</th>
                                    <th>{{ __('tran.balance') }}</th>
                                    <th>{{ __('tran.points') }}</th>
                                    <th>{{ __('tran.address') }}</th>
                                    <th>{{ __('tran.last_update') }}</th>
                                    <th>{{ __('tran.paymenets') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td> <span class="fw-bold">{{ $user->code_client ?? 'N/A' }}</span> </td>
                                        <td>{{ $user->client_name ?? 'N/A' }}</td>
                                        <td>{{ $user->client_fhonewhats ?? 'N/A' }}</td>
                                        <td>{{ $user->client_fhoneLeter ?? 'N/A' }}</td>
                                        <td>{{ $user->client_Balanc ?? 'N/A' }}</td>
                                        <td>{{ $user->client_points ?? 'N/A' }}</td>
                                        <td>{{ $user->client_state ?? 'N/A' }}</td>
                                        <td>{{ $user->updated_at ?? 'N/A' }}</td>
                                        <td><a class="btn btn-sm btn-outline-danger" href="{{route('report.client_payed',['id'=>1])}}">عرض</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="card-footer  d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
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
