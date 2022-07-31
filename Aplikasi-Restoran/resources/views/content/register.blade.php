@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5>Input</h5>
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_register') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email"> Email</label>
						<input type="text" class="form-control" name="email" placeholder="Masukkan Email">
					</div>
					<div class="form-group">
						<label for="password"> Password </label>
						<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-plus"></i> Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5>Data</h5>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">NO.</th>
							<th>Email</th>
							<th class="text-center">Password</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_login as $login)
							<tr>
								<td class="text-center">{{ ++$no }}</td>
								<td>{{ $login->email }}</td>
								<td class="text-center">
									<a href="{{ url('/admin/'.$login->id.'/edit_data_login') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>
									<a href="{{ url('/admin/'.$login->id.'/delete_data_login') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection