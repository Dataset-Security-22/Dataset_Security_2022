@extends("content.layouts")

@section("page_content")

<div class="col-md-4">
	<div class="panel panel-green">
		<div class="panel-heading">
			Input Users
		</div>
		<div class="panel-body pan">
			<form method="POST" action="{{ url('/simpan_data_users') }}">
				{{ csrf_field() }}
				<div class="form-body pal">
					<div class="form-group">
						<label> Name </label>
						<input type="text" class="form-control" name="name" placeholder="Masukkan Nama ">
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="email" class="form-control" name="email" placeholder="Masukkan Email">
					</div>
					<div class="form-group">
						<label> Password </label>
						<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
					</div>
					<div class="form-group">
						<label> Role </label>
						<select class="form-control" name="role">
							<option value="">- Pilih -</option>
							<option value="1">Admin</option>
							<option value="2">Petugas</option>
						</select>
					</div>
				</div>
				<div class="form-actions text-right pal">
					<button type="submit" class="btn btn-success btn-block">
						<i class="fa fa-plus"></i> Tambah 
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="panel panel-green">
		<div class="panel-heading">
			Data Users
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th>Name</th>
						<th>Email</th>
						<th class="text-center">Role</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_users as $users)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td>{{ $users->name }}</td>
							<td>{{ $users->email }}</td>
							<td class="text-center">
								@if($users->role == 1)
									Admin
								@elseif($users->role == 2)
									Petugas
								@else
									Tidak Ada
								@endif
							</td>
							<td class="text-center">
								<a href="" class="btn btn-warning btn-sm">
									<i class="fa fa-fw fa-pencil"></i> Ganti Password
								</a>
								<a href="" class="btn btn-danger btn-sm">
									<i class="fa fa-fw fa-trash-o"></i> Delete 
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection