@extends("content.layouts.app")

@section("page_content")

<div class="row mt">
	<div class="col-md-4">
		<div class="form-panel">
			<h4><i class="fa fa-user"></i> Data Anggota</h4>
			<div class="form-group">
				<label> No. KTP </label>
				<input type="text" class="form-control" value="{{ $detail->no_ktp }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Pelanggan </label>
				<input type="text" class="form-control" value="{{ $detail->nama_pel }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Alamat Pelanggan </label>
				<textarea class="form-control" rows="4" readonly style="background-color: white;">{{ $detail->alamat_pel }}</textarea>
			</div>
			<div class="form-group">
				<label> No. Telepon </label>
				<input type="text" class="form-control" value="{{ $detail->telp_pel }}" readonly style="background-color: white;">
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-panel">
			<h4><i class="fa fa-car"></i> Data Kendaraan </h4>
			<div class="form-group">
				<label> No. Plat </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->no_plat }}" readonly style="background-color: white;">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> Tahun </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->tahun }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label> Tarif Perjam </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->tarif_perjam }}" readonly style="background-color: white;">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label> Status Rental </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->status_rental }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Merk </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->re_merk->nama_merk }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Type </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->nama_type }}" readonly style="background-color: white;">
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-panel">
			<h4><i class="fa fa-user"></i> Data Sopir </h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> ID Sopir </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->id_sopir }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label> No. SIM </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->no_sim }}" readonly style="background-color: white;">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label> Nama Sopir </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->nama_sopir }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Alamat Sopir </label>
				<textarea class="form-control" rows="4" readonly style="background-color: white;">{{ $detail->re_transaksi->re_sopir->alamat_sopir }}</textarea>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> Telepon Sopir </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->telp_sopir }}" readonly style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label> Tarif Perjam </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->tarif_perjam }}" readonly style="background-color: white;">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-panel">
			<h4><i class="fa fa-user"></i> Data Pemilik </h4>
			<div class="form-group">
				<label> Kode Pemilik </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_pemilik->kode_pemilik }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Pemilik </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_pemilik->nama_pemilik }}" readonly style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Alamat Pemilik </label>
				<textarea class="form-control" rows="4" readonly style="background-color: white;">{{ $detail->re_transaksi->re_kendaraan->re_pemilik->alamat_pemilik }}</textarea>
			</div>
			<div class="form-group">
				<label> Telepon Pemilik </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_pemilik->telp_pemilik }}" readonly style="background-color: white;">
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<a href="{{ url('/transaksi') }}" class="btn btn-danger btn-block">
			<i class="fa fa-refresh"></i> Kembali
		</a>
	</div>
</div>

@endsection