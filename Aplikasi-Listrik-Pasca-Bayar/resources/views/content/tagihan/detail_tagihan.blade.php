@extends("content.layouts.app")

@section("page_header") <i class="fa fa-search"></i> Detail Tagihan Pengguna @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Tarif</li>
</ol>

@stop

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

<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-folder-open"></i> Tagihan Pengguna </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label> ID Penggunaan </label>
					<input type="text" class="form-control" value="{{ $detail->id_penggunaan }}" readonly style="background-color: white;">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Bulan </label>
							<input type="text" class="form-control" value="{{ $detail->bulan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tahun </label>
							<input type="text" class="form-control" value="{{ $detail->tahun }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Awal </label>
							<input type="text" class="form-control" value="{{ $detail->meter_awal }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Akhir </label>
							<input type="text" class="form-control" value="{{ $detail->meter_akhir }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Tanggal Cek </label>
					<input type="text" class="form-control" value="{{ $detail->tgl_cek }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-user"></i> Data Pelanggan </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> ID Pelanggan </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->id_pelanggan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> No. Meter </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->no_meter }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Nama </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->nama }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> ID Tarif </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_tarif->kode_tarif }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Alamat </label>
					<textarea class="form-control" rows="5" readonly style="background-color: white;">{{ $detail->lpb_pelanggan->alamat }}</textarea>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Tagihan </h3>
			</div>
			<form method="POST" action="{{ url('/tagihan-pengguna') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_penggunaan" value="{{ $detail->id_penggunaan }}">
				<div class="box-body">
					<div class="form-group">
						<label> ID Pelanggan </label>
						<input type="text" class="form-control" name="id_pelanggan" value="{{ $detail->lpb_pelanggan->id_pelanggan }}" readonly style="background-color: white;">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Bulan </label>
								<input type="text" class="form-control" name="bulan" value="{{ date('m') }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tahun </label>
								<input type="text" class="form-control" name="tahun" value="{{ date('Y') }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Jumlah Meter </label>
								<?php
									$jumlah = $detail->meter_akhir - $detail->meter_awal;
								?>
								<input type="text" class="form-control" name="jumlah_meter" value="{{ $jumlah }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tarif PerKwH</label>
								<input type="text" class="form-control" name="tarif_perkwh" value="{{ $detail->lpb_pelanggan->lpb_tarif->tarif_perkwh }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Jumlah Bayar </label>
						<?php
							$total_bayar = $jumlah * $detail->lpb_pelanggan->lpb_tarif->tarif_perkwh;
						?>
						<input type="number" class="form-control" name="jumlah_bayar" value="{{ $total_bayar }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary btn-block btn-sm">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection