@extends("content.layouts.app")

@section("page_header") <i class="fa fa-money"></i> Detail Data Pembayaran @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
	<li><a href="{{ url('/pembayaran') }}"> Pembayaran</a></li>
	<li class="active">Detail Data Pembayaran</li>
</ol>

@endsection

@section("page_content")

<div class="row">
	<div class="col-md-4">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-user"></i> Data Pelanggan</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label> ID Pelanggan </label>
					<input type="text" class="form-control" value="{{ $detail->id_pelanggan }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> No. Meter </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->no_meter }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Nama Pelanggan </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->nama }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Alamat </label>
					<textarea class="form-control" rows="5" readonly style="background-color: white;">{{ $detail->lpb_pelanggan->alamat }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-pencil"></i> Data Penggunaan </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> ID Penggunaan </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->id_penggunaan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tanggal Cek </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->tgl_cek }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Bulan </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->bulan }}" readonly style="background-color: white;">
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tahun </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->tahun }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Awal </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->meter_awal }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Meter Akhir </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_penggunaan->meter_akhir }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Tarif </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Kode Tarif </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_tarif->kode_tarif }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<label> Golongan </label>
						<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_tarif->golongan }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Daya </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_tarif->daya }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tarif PerKwh </label>
							<input type="number" class="form-control" value="{{ $detail->lpb_pelanggan->lpb_tarif->tarif_perkwh }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Pembayaran </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label> Tanggal Bayar </label>
							<input type="text" class="form-control" value="{{ $detail->tgl_bayar }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label> Bulan Bayar </label>
							<input type="text" class="form-control" value="{{ $detail->bulan_bayar }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label> Tahun Bayar </label>
							<input type="text" class="form-control" value="{{ $detail->tahun_bayar }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Waktu Bayar </label>
					<input type="text" class="form-control" value="{{ $detail->waktu_bayar }}" readonly style="background-color: white;">
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label> Jumlah Bayar </label>
							<input type="number" class="form-control" value="{{ $detail->jumlah_bayar }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label> Biaya Admin </label>
							<input type="number" class="form-control" value="{{ $detail->biaya_admin }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label> Total Akhir </label>
							<input type="number" class="form-control" value="{{ $detail->total_akhir }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Bayar </label>
							<input type="number" class="form-control" value="{{ $detail->bayar }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Kembali </label>
							<input type="number" class="form-control" value="{{ $detail->kembali }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Tagihan </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Bulan </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_tagihan->bulan }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tahun </label>
							<input type="text" class="form-control" value="{{ $detail->lpb_tagihan->tahun }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Jumlah Meter </label>
							<input type="number" class="form-control" value="{{ $detail->lpb_tagihan->jumlah_meter }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tarif Per Kwh </label>
							<input type="number" class="form-control" value="{{ $detail->lpb_tagihan->tarif_perkwh }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Jumlah Bayar </label>
					<input type="number" class="form-control" value="{{ $detail->lpb_tagihan->jumlah_bayar }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Status Bayar </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_tagihan->status }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="{{ url('/pembayaran') }}" class="btn btn-danger btn-block">
			<i class="fa fa-refresh"></i> Kembali
		</a>
	</div>
</div>

@endsection