@extends("content.layouts.app")

@section("page_header") <i class="fa fa-pencil"></i> Penggunaan @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
	<li class="active">Penggunaan</li>
</ol>

@endsection

@section("page_scripts")
<script type="text/javascript">
	function edit_penggunaan(id_penggunaan) {
		$.ajax({
			url : "{{ url('/penggunaan/edit') }}",
			type : "GET",
			data : { id_penggunaan : id_penggunaan },
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
				@if(Auth::user()->role == 1)
				<h3 class="box-title"> Data Penggunaan </h3>
				@else
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus"></i> Tambah Data
				</button>
				@endif
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">ID Penggunaan</th>
							<th class="text-center">ID Pelanggan</th>
							<th>Nama Pelanggan</th>
							<th class="text-center">Meter Awal</th>
							<th class="text-center">Meter Akhir</th>
							<th class="text-center">Tanggal Cek</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_penggunaan as $penggunaan)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $penggunaan->id_penggunaan }}</td>
								<td class="text-center">{{ $penggunaan->lpb_pelanggan->id_pelanggan }}</td>
								<td>{{ $penggunaan->lpb_pelanggan->nama }}</td>
								<td class="text-center">{{ $penggunaan->meter_awal }}</td>
								<td class="text-center">{{ $penggunaan->meter_akhir }}</td>
								<td class="text-center">{{ $penggunaan->tgl_cek }}</td>
								<td class="text-center">

								@if(Auth::user()->role == 1)
									<a href="{{ url('/penggunaan/'.$penggunaan->id_penggunaan.'/detail') }}" class="btn btn-info btn-sm">
										<i class="fa fa-search"></i> Detail
									</a>
								@else
									@if($penggunaan->lpb_tagihan != NULL)
									<button disabled onclick="edit_penggunaan({{$penggunaan->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
										<i class="fa fa-pencil"></i> Edit
									</button>
									<button disabled class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> Hapus
									</button>
									@else
									<button onclick="edit_penggunaan({{$penggunaan->id_penggunaan}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
										<i class="fa fa-pencil"></i> Edit
									</button>
									<a onclick="return confirm('Yakin ? Mau di Hapus ?')" href="{{ url('/penggunaan/'.$penggunaan->id_penggunaan.'/hapus') }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> Hapus 
									</a>
									@endif
								@endif
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
			<form method="POST" action="{{ url('/penggunaan') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_petugas" value="{{ Auth::user()->id }}">
				<div class="modal-body">
					<div class="form-group">
						<label for="id_penggunaan">ID Penggunaan</label>
						<?php
							$data = DB::table("penggunaan")
								->count();

							if ($data == 0) {
								$kode = 10042001;
							} else {
								$id_penggunaan = DB::table("penggunaan")
										->max("id_penggunaan");

								$kode = $id_penggunaan + 1;
							}
						?>
						<input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="{{ $kode }}" readonly>
					</div>
					<div class="form-group">
						<label for="id_pelanggan">Nama Pelanggan</label>
						<select class="form-control" name="id_pelanggan">
							<option value="" disabled selected>- Pilih -</option>
							@foreach($data_pelanggan as $pelanggan)
								<?php
									$data = DB::table("penggunaan")
										->where("id_pelanggan", $pelanggan->id_pelanggan)
										->where("bulan", date("m"))
										->where("tahun", date("Y"))
										->first();
								?>

								@if(!$data)
								<option value="{{ $pelanggan->id_pelanggan }}">
									{{ $pelanggan->nama }}
								</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Bulan </label>
								<input type="text" class="form-control" name="bulan" value="{{ date('m') }}" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tahun </label>
								<input type="text" class="form-control" name="tahun" value="{{ date('Y') }}" readonly>
							</div>							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Meter Awal </label>
								<input type="number" class="form-control" name="meter_awal" placeholder="0">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Meter Akhir </label>
								<input type="number" class="form-control" name="meter_akhir" placeholder="0">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Tanggal Cek </label>
						<input type="date" class="form-control" name="tgl_cek" value="{{ date('Y-m-d') }}" readonly>
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
			<form method="POST" action="{{ url('/penggunaan') }}">
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