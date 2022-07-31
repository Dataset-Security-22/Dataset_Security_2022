@extends("content.layouts.app")

@section("page_header", "Akun")

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissable fade-show">
			{{ session("sukses") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissable fade-show">
			{{ session("error") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Input Akun</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/tambah_akun') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email"> Email </label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda">
					</div>
					<div class="form-group">
						<label for="password"> Password </label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda">
					</div>
					<div class="form-group">
						<label for="name"> Nama </label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Anda">
					</div>
					<div class="form-group">
						<label for="role"> Role </label>
						<select class="form-control" id="role" name="role">
							<option value="">- Pilih -</option>
							<option value="1">Admin</option>
							<option value="2">Petugas</option>
							<option value="3">Guru</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-fw fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-users"></i> Data Admin</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Email</th>
								<th>Name</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_akun as $akun)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $akun->email }}</td>
								<td>{{ $akun->name }}</td>
								<td class="text-center">
									<a href="{{ url('/admin/'.$akun->id.'/ganti_password') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Ganti Password </a>
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data {{ $akun->name }} ?')" href="{{ url('/admin/'.$akun->id.'/hapus_akun') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
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

@endsection