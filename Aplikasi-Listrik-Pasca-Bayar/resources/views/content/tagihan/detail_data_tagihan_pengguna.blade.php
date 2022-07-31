@extends("content.layouts.app")

@section("page_content")

<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Detail Data Tagihan Pengguna </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label> Bulan </label>
					<input type="text" class="form-control" value="{{ $detail->bulan }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Tahun </label>
					<input type="text" class="form-control" value="{{ $detail->tahun }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Jumlah Meter </label>
					<input type="number" class="form-control" value="{{ $detail->jumlah_meter }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Tarif Per KwH</label>
					<input type="text" class="form-control" value="{{ $detail->tarif_perkwh }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Jumlah Bayar </label>
					<input type="text" class="form-control" value="{{ $detail->jumlah_bayar }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Status Bayar </label>
					<input type="text" class="form-control" value="{{ $detail->status }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Penggunaan </h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label> ID Penggunaan </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->id }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> ID Pelanggan </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->id_pelanggan }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Nama Pelanggan </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->lpb_pelanggan->nama }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Meter Awal </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->meter_awal }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Meter Akhir </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->meter_akhir }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Tanggal Cek </label>
					<input type="text" class="form-control" value="{{ $detail->lpb_penggunaan->tgl_cek }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Bayar Tagihan Pengguna </h3>
			</div>
			<form method="POST" action="{{ url('/simpan_data_pembayaran') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_pelanggan" value="{{ $detail->lpb_pelanggan->id }}">
				<input type="hidden" name="id_tagihan" value="{{ $detail->id }}">
				<div class="box-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label> Tanggal Bayar </label>
								<input type="text" class="form-control" name="tgl_bayar" value="{{ date('d') }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Bulan Bayar </label>
								<input type="text" class="form-control" name="bulan_bayar" value="{{ date('m') }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label> Tahun Bayar </label>
								<input type="text" class="form-control" name="tahun_bayar" value="{{ date('Y') }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								 <label> Jumlah Bayar </label>
								 <input type="number" class="form-control" name="jumlah_bayar" value="{{ $detail->jumlah_bayar }}" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Biaya Admin </label>
								<input type="number" class="form-control" name="biaya_admin" value="{{ Auth::user()->biaya_admin }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Total Akhir </label>
						<?php
							$total_akhir = $detail->jumlah_bayar + Auth::user()->biaya_admin;
						?>
						<input type="number" class="form-control" name="total_akhir" value="{{ $total_akhir }}">
					</div>
					<div class="form-group">
						<label> Bayar </label>
						<input type="number" class="form-control" name="bayar" placeholder="0">
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary btn-block">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection