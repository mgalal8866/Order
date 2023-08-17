<!DOCTYPE html>
<html>

<head>
	<title> Import and Export Excel data to database Using Laravel 5.8 </title>
	<link rel="stylesheet"
		href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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
				<form action="{{ route('import_user') }}"
					method="POST"
					enctype="multipart/form-data">
					@csrf
					<input type="file" name="file"
						class="form-control">
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
