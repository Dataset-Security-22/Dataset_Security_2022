@extends("content.layouts.app")

@section("page_header") <i class="fa fa-search"></i> Detail Data Penggunaan @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"> Dashboard</a></li>
	<li><a href="{{ url('/tagihan-pengguna') }}"> Tagihan Pengguna</a></li>
	<li class="active">Lihat Data</li>
</ol>

@endsection

@section("page_content")

<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Penggunaan </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label> ID Penggunaan </label>	
					<input type="text" class="form-control" value="{{ $lihat->id_penggunaan }}" readonly style="background-color: white;">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Bulan </label>
							<input type="text" class="form-control" value="{{ $lihat->bulan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tahun </label>
							<input type="text" class="form-control" value="{{ $lihat->tahun }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Awal </label>
							<input type="text" class="form-control" value="{{ $lihat->meter_awal }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Akhir </label>
							<input type="text" class="form-control" value="{{ $lihat->meter_akhir }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Tanggal Cek </label>
					<input type="text" class="form-control" value="{{ $lihat->tgl_cek }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Pelanggan </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> ID Pelanggan </label>
							<input type="text" class="form-control" value="{{ $lihat->lpb_pelanggan->id_pelanggan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> No. Meter </label>
							<input type="text" class="form-control" value="{{ $lihat->lpb_pelanggan->no_meter }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Nama </label>
							<input type="text" class="form-control" value="{{ $lihat->lpb_pelanggan->nama }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Kode Tarif </label>
							<input type="text" class="form-control" value="{{ $lihat->lpb_pelanggan->lpb_tarif->kode_tarif }}" readonly style="background-color: white;">	
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Alamat </label>
					<textarea class="form-control" rows="5" readonly style="background-color: white;">{{ $lihat->lpb_pelanggan->alamat }}</textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="{{ url('/tagihan-pengguna') }}" class="btn btn-danger ">
			<i class="fa fa-refresh"></i> Kembali
		</a>
	</div>
</div>

@endsection