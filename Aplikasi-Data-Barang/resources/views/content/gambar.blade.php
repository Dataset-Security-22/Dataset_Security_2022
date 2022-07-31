<!DOCTYPE html>
<html>
<head>
	<title>Gambar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

@if(session("sukses"))
	<div class="alert alert-success">
		{{ session("sukses") }}
	</div>
@endif

@if(session("error"))
	<div class="alert alert-danger">
		{{ session("error") }}
	</div>
@endif

<form method="POST" action="{{ url('/save_gambar') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td> Gambar :</td>
			<td>
				<input type="file" name="gambar">
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit"> Tambah </button>
			</td>
		</tr>
	</table>
</form>

</body>
</html>