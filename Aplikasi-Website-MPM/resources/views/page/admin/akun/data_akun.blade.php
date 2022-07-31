@extends("page.layouts.template")

@section("page_title", "Data Akun")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Akun</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Akun</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Data Akun
					</h3>
					<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-plus"></i> Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Username</th>
								<th>Nama</th>
								<th class="text-center">Email</th>
								<th class="text-center">Role</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_users as $user)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->nama }}</td>
								<td class="text-center">{{ $user->email }}</td>
								<td class="text-center">{{ $user->getRole->nama_role }}</td>
								<td class="text-center">
									<button onclick="editAkun({{$user->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
										<i class="fa fa-edit"></i> Edit
									</button>
									<form method="POST" action="{{ url('/page/admin/akun/hapus') }}" class="d-inline">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $user->id }}">
										<button type="submit" class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Hapus
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<i class="fa fa-plus"></i> Tambah Data
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ url('/page/admin/akun/tambah') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label for="username"> Username </label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
					</div>
					<div class="form-group">
						<label for="nama"> Nama </label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email"> Email </label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-Mail">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="password"> Password </label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="id_role"> Role </label>
						<select class="form-control" id="id_role" name="id_role">
							<option value="">- Pilih -</option>
							@foreach($data_role as $role)
							<option value="{{ $role->id_role }}">
								{{ $role->nama_role }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Kembali</button>
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<i class="fa fa-plus"></i> Tambah Data
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ url('/page/admin/akun/tambah') }}">
				{{ csrf_field() }}
				<div class="modal-body" id="modal-content-edit">
					
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Kembali</button>
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END -->
@endsection

@section("page_scripts")

<script type="text/javascript">
	function editAkun(id) {
		$.ajax({
			url : "{{ url('/page/admin/akun/edit') }}",
			type : "GET",
			data : { id : id },
			success : function(data) {
				$("#modal-content-edit").html(data);
				return true;
			}
		});
	}
</script>

@stop