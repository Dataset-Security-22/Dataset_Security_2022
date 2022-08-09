@extends("content.layouts.app")

@section("page_header") <i class="fa fa-users"></i> Petugas @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"> Dashboard</a></li>
	<li class="active">Petugas</li>
</ol>

@endsection

@section("page_scripts")
<script type="text/javascript">
	function edit_petugas(nik_petugas) {
		$.ajax({
			url : "{{ url('/petugas/edit') }}",
			type : "GET",
			data : { nik_petugas : nik_petugas },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>
@endsection

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Berhasil!</h4>
			{{ session("sukses") }}
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
			{{ session("error") }}
		</div>
	</div>
</div>
@endif

@if(count($errors) > 0)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus"></i> Tambah Data
				</button>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">NIK</th>
							<th>Nama</th>
							<th class="text-center">No. Telepon</th>
							<th class="text-center">Jenis Kelamin</th>
							<th>Alamat</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_petugas as $petugas)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $petugas->nik_petugas }}</td>
							<td>{{ $petugas->nama }}</td>
							<td class="text-center">{{ $petugas->no_telepon }}</td>
							<td class="text-center">
								@if($petugas->jk == "L")
								Laki - Laki
								@elseif($petugas->jk == "P")
								Perempuan
								@else
								Tidak Ada
								@endif
							</td>
							<td>{{ $petugas->alamat }}</td>
							<td class="text-center">
								<button onclick="edit_petugas({{$petugas->nik_petugas}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
									<i class="fa fa-pencil"></i> Edit
								</button>
								<a onclick="return confirm('Yakin ? Mau di Hapus ?')" href="{{ url('/hapus_data_petugas/'.$petugas->nik_petugas.'/hapus') }}" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/petugas') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nik_petugas"> NIK </label>
								<input type="text" class="form-control" id="nik_petugas" name="nik_petugas" placeholder="Masukkan NIK" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_telepon">No. Telepon</label>
								<input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan No. Telepon" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jk">Jenis Kelamin</label>
								<select class="form-control" id="jk" name="jk">
									<option value="" disabled selected>- Pilih -</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" id="alamat" rows="5" name="alamat" placeholder="Masukkan Alamat"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Data </h4>
			</div>
			<form method="POST" action="{{ url('/petugas') }}">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection