@extends("content.layouts.app")

@section("page_content")

<br>
<div class="row">
	<div class="col-md-4">
		<div class="form-panel">
			<h4><i class="fa fa-user"></i> Data Anggota</h4>
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
	</div>
	<div class="col-md-4">
		<div class="form-panel">
			<h4><i class="fa fa-taxi"></i> Data Kendaraan </h4>
			<div class="form-group">
				<label> No. Plat </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->no_plat }}" disabled style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Tahun Kendaraan </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->tahun }}" disabled style="background-color: white;">
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
				<label> Nama Type </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_kendaraan->re_type->nama_type }}" disabled style="background-color: white;">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-panel">
			<h4><i class="fa fa-money"></i> Data Transaksi </h4>
			<div class="form-group">
				<label> No. Transaksi </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->no_transaksi }}" disabled style="background-color: white;">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> Tanggal Pesan </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_pesan }}" disabled style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label> Tanggal Pinjam </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_pinjam }}" disabled style="background-color: white;">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label> Bayar Rental </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->bayar_rental }}" disabled style="background-color: white;">
			</div>
			<div class="form-group">
				<label> Nama Sopir </label>
				<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->nama_sopir }}" disabled style="background-color: white;">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label> Tarif Sopir </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->re_sopir->tarif_perjam }}" disabled style="background-color: white;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label> Tanggal Kembali </label>
						<input type="text" class="form-control" value="{{ $detail->re_transaksi->tgl_kembali_realisasi }}" disabled style="background-color: white;">
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-panel">
			<form method="POST" action="{{ url('/update_data_pengembalian') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $detail->re_transaksi->id }}">
				<input type="hidden" name="id_kendaraan" value="{{ $detail->re_transaksi->id_kendaraan }}">
				<input type="hidden" name="id_sopir" value="{{ $detail->re_transaksi->id_sopir }}">
				<div class="row">
					<div class="col-md-6">
						<h4><i class="fa fa-sign-out"></i> Data Pengembalian </h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label> Kilometer Kembali </label>
									<input type="text" class="form-control" name="kilometer_kembali" placeholder="0">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label> BBM Kembali </label>
									<input type="text" class="form-control" name="bbm_kembali" placeholder="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label> Kondisi Mobil Kembali </label>
							<input type="text" class="form-control" name="kondisi_mobil_kembali" placeholder="Masukkan Data Kondisi Mobil">
						</div>
						<div class="form-group">
							<label> Kerusakan </label>
							<input type="text" class="form-control" name="kerusakan" placeholder="Masukkan Kondisi Kerusakan Mobil">
						</div>
					</div>
					<div class="col-md-6">
						<?php
						$sekarang = date('Y-m-d');
						$tgl_realisasi_kembali = $detail->re_transaksi->tgl_kembali_realisasi;
						$awal = strtotime($sekarang);
						$kembali = strtotime($detail->re_transaksi->tgl_kembali_realisasi);
						$diff = $awal - $kembali;
						$hari = floor($diff / 864 / 100);
						$denda = 50000 * $hari;
						?>
						<!-- End -->
						@if($sekarang <= $tgl_realisasi_kembali)
						<center>
							<div style="padding-top: 100px;">
								<h4>Tidak Ada Denda</h4>	
							</div>
						</center>
						@elseif($sekarang >= $tgl_realisasi_kembali)
						<h4><i class="fa fa-money"></i> Data Denda </h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label> Tanggal Kembali Realisasi</label>
									<input type="date" class="form-control" value="{{ $detail->re_transaksi->tgl_kembali_realisasi }}" readonly style="background-color: white;">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label> Tanggal Sekarang </label>
									<input type="date" class="form-control" value="{{ date('Y-m-d') }}" readonly style="background-color: white;">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label> Denda </label>
							<input type="number" class="form-control" name="denda" value="{{ $denda }}" readonly style="background-color: white;">
						</div>
						<div class="form-group">
							<label> Bayar Denda Pengembalian </label>
							<input type="number" class="form-control" name="bayar_denda_pengembalian" placeholder="0">
						</div>
						@else
						<center>
							<h4>Data Tidak Jelas</h4>
						</center>
						@endif
					</div>
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">
						<i class="fa fa-sign-out"></i> Pengembalian
					</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Pengembalian -->
</div>

@endsection