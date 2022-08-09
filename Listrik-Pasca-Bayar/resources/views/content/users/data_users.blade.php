@extends("content.layouts.app")

@section("page_content")

<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-plus"></i> Tambah Data Users</h3>
			</div>
			<form method="POST" action="{{ url('/simpan_data_users') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label> ID </label>
						<input type="text" class="form-control" name="id">
					</div>
					<div class="form-group">
						<label> Nama </label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label> Alamat </label>
						<textarea class="form-control" name="alamat" rows="5"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> No. Telepon </label>
								<input type="text" class="form-control" name="no_telepon">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Saldo </label>
								<input type="number" class="form-control" name="saldo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Biaya Admin </label>
								<input type="text" class="form-control" name="biaya_admin">	
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Username </label>
								<input type="text" class="form-control" name="username">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Password </label>
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Role </label>
								<select class="form-control" name="role">
									<option value="">- Pilih -</option>
									<option value="1">Admin</option>
									<option value="2">Petugas</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block">
							<i class="fa fa-plus"></i> Tambah
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-users"></i> Data Users</h3>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Name</th>
							<th>Email</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_users as $user)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td class="text-center">
									<a href="" class="btn btn-warning btn-sm">
										<i class="fa fa-pencil"></i> Update
									</a>
									<a onclick="return confirm('Mau di Hapus ?')" href="" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> Delete 
									</a>
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