@extends("content.layouts.app")

@section("page_content")

<br>
<div class="row">
	<div class="col-md-12">
		<div class="form-panel">
			<div class="row">
				<div class="col-md-4">
					<h4><i class="fa fa-user"></i> Data Pelanggan </h4>
					<div class="form-group">
						<label> No. KTP </label>
						<input type="text" class="form-control" value="{{ $detail->no_ktp }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Nama Pelanggan </label>
						<input type="text" class="form-control" value="{{ $detail->nama_pel }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Alamat Pelanggan </label>
						<textarea class="form-control" rows="4" disabled style="background-color: white;">{{ $detail->alamat_pel }}</textarea>
					</div>
					<div class="form-group">
						<label> Telepon Pelanggan </label>
						<input type="text" class="form-control" value="{{ $detail->telp_pel }}" disabled style="background-color: white;">
					</div>
				</div>
				<div class="col-md-4">
					<h4><i class="fa fa-taxi"></i> Data Kendaraan </h4>
					<div class="form-group">
						<label> No. Plat </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->no_plat }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Tarif Perjam </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->tarif_perjam }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Kode Merk </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->re_merk->kode_merk }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Nama Merk </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->re_merk->nama_merk }}" disabled style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Type </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->nama_type }}" disabled style="background-color: white;">
					</div>
				</div>
				<div class="col-md-4">
					<h4><i class="fa fa-money"></i> Data Transaksi </h4>
					<div class="form-group">
						<label> No. Transaksi </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->no_transaksi }}" readonly style="background-color: white;">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Tanggal Pesan </label>
								<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_pesan }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>	Tanggal Pinjam </label>
								<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_pinjam }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Kembali Rencana </label>
								<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_kembali_rencana }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Kembali Realisasi </label>
								<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_kembali_realisasi }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Denda </label>
								@if($detail->re_transaksi->denda == NULL)
								<input type="number" class="form-control" value="0" readonly style="background-color: white;">
								@else
								<input type="number" class="form-control" value="{{ $detail->re_transaksi->denda }}" readonly style="background-color: white;">
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Bayar Rental </label>
								<input type="text" class="form-control" value="{{ $detail->re_transaksi->bayar_rental }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Status Pengembalian </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->status_pengembalian }}" readonly style="background-color: white;">
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<a href="{{ url('/pengembalian') }}" class="btn btn-success btn-block">
					<i class="fa fa-sign-out"></i> Kembali
				</a>
			</div>
		</div>
	</div>
</div>

@endsection