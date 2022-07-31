@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_petugas(nik) {
		$.ajax({
			url : "{{ url('/edit_petugas') }}",
			type : "GET",
			data : { nik : nik },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>

@endsection

@section("page_content")

<div class="row mt">
	<div class="col-md-12">
		<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Tambah
		</button>
		<br><br>
		<div class="content-panel">
			<h4><i class="fa fa-user"></i> Data Petugas </h4>
			<section id="unseen">
				<div class="table-responsive">
					<table id="data" class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">NIK</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th class="text-center">No. HP</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_petugas as $petugas)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $petugas->nik }}</td>
								<td>{{ $petugas->nama_kar }}</td>
								<td>{{ $petugas->alamat_kar }}</td>
								<td class="text-center">{{ $petugas->telp_kar }}</td>
								<td class="text-center">
									<button onclick="edit_petugas({{$petugas->nik}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/petugas/'.$petugas->nik.'/delete') }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
</div>

<!-- Awal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/simpan_data_petugas') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label> NIK Karyawan </label>
						<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Karyawan">
					</div>
					<div class="form-group">
						<label> Nama Karyawan </label>
						<input type="text" class="form-control" name="nama_kar" placeholder="Masukkan Nama Karyawan">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> No. Telepon Karyawan </label>
								<input type="text" class="form-control" name="telp_kar" placeholder="Masukkan No. Telepon">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Jenis Kelamin </label>
								<select class="form-control" name="jenis_kelamin">
									<option value="">- Pilih -</option>
									<option value="Laki - Laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Alamat Karyawan </label>
						<textarea class="form-control" name="alamat_kar" rows="5" placeholder="Masukkan Alamat Karyawan"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div> 
<!-- Akhir Modal -->

<!-- Awal Modal Update -->
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Update Data</h4>
			</div>
			<form method="POST" action="{{ url('/update_data_petugas') }}">
				{{ csrf_field() }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div> 
<!-- Akhir Modal -->

@endsection