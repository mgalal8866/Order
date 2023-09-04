<div>
    <div class="card outline-success">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.users') }}</h4>
            {{-- <button class="btn btn-success ">اضافه مستخدم</button> --}}
        </div>
        <x-table.table-responsive>
            <x-slot name="thead">
                <x-table.th>#</x-table.th>
                <x-table.th>{{__('name')}}</x-table.th>
                <x-table.th>{{__('phone')}}</x-table.th>
                <x-table.th>{{__('status')}}</x-table.th>
                {{-- <x-table.th>Actions</x-table.th> --}}
            </x-slot>
            <x-table.tbody>
                @foreach ($users as $index=>$user )
                <x-table.tr>
                    <x-table.td> <span class="fw-bold">{{($users->currentpage()-1) * $users->perpage() + $index + 1 }}</span></x-table.td>
                    <x-table.td> <span class="fw-bold">{{ $user->client_name}}</span></x-table.td>
                    <x-table.td><span class="fw-bold">{{ $user->store_name}}</span></x-table.td>
                    <x-table.td>{{ $user->client_fhonewhats}}</x-table.td>
                    {{-- <x-table.td><span class="badge rounded-pill badge-light-primary me-1">Active</span></x-table.td> --}}
                    {{-- <x-table.td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                data-bs-toggle="dropdown">
                                <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                    <i data-feather="edit-2" class="me-50"></i>
                                    <span>Edit</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </x-table.td> --}}
                </x-table.tr>
                @endforeach
            </x-table.tbody>


        </x-table.table-responsive>

    </div>
    <div class="card-footer  d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
