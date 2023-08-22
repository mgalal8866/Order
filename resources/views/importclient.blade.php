<!DOCTYPE html>
<html>


<head>


    <title> Import and Export Excel data to database Using Laravel 5.8 </title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>
    <h6> Import Client
    </h6>
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import Client
            </div>
            <div class="card-body">
                <iframe src="https://www.medawee.com/" style="height:200px;width:300px" title="Iframe Example"></iframe>
                <iframe src="https://www.medawee.com?enablejsapi=1" style="height:200px;width:300px" title="Iframe Example"></iframe>
                <iframe src="https://www.medawee.com/" style="height:200px;width:300px" title="Iframe Example"></iframe>
                <iframe src="https://medawee.com" allowfullscreen="true"  mozallowfullscreen="true"  ></iframe>
                <embed src='https://www.medawee.com/' width='100%' height='100%'    />

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                @if (session()->has('failures'))

                    <table class="table table-danger">
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Errors</th>
                            <th>Value</th>
                        </tr>

                        @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td>{{ $validation->row() }}</td>
                                <td>{{ $validation->attribute() }}</td>
                                <td>
                                    <ul>
                                        @foreach ($validation->errors() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $validation->values()[$validation->attribute()] }}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                @endif

                <form action="{{ route('import_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">
                        Import User Data
                    </button>
                    {{-- <a class="btn btn-warning"
					href="{{ route('export') }}">
							Export User Data
					</a> --}}
                </form>
            </div>
        </div>
    </div>

</body>

</html>
