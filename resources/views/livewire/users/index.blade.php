<div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Users</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user )
            <tr>
                <td>
                    <span class="fw-bold">{{ $user->client_name}}</span>
                </td>
                <td>{{ $user->client_fhonewhats}}</td>
                <td>

                </td>
                <td><span class="badge rounded-pill badge-light-primary me-1">Active {{$user->client_Active}}</span></td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
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
                </td>
            </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>
