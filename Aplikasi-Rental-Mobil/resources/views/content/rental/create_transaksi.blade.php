@extends("content.layouts.app")

@section("page_content")

<form method="POST" action="{{ url('/simpan_data_transaksi') }}">
	{{ csrf_field() }}
	<input type="hidden" name="id_kendaraan" value="{{ $detail->id }}">
	<div class="row mt">
		<div class="col-md-4">
			<div class="form-panel">
				<h4 class="mb"><i class="fa fa-taxi"></i> Data Kendaraan </h4>
				<div class="form-group">
					<label> No. Transaksi </label>	
					<input type="text" class="form-control" name="no_transaksi" placeholder="Masukkan No. Transaksi">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> Tanggal Pesan </label>
							<input type="date" class="form-control" name="tgl_pesan">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Tanggal Pinjam </label>
							<input type="date" class="form-control" name="tgl_pinjam">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Tanggal Kembali Rencana </label>
					<input type="date" class="form-control" name="tgl_kembali_rencana">
				</div>
				<div class="form-group">
					<label> Tanggal Kembali Realisasi </label>
					<input type="date" class="form-control" name="tgl_kembali_realisasi">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-panel">
				<h4 class="mb"><i class="fa fa-building"></i> Data BBM </h4>
				<div class="form-group">
					<label> Kilometer Perjam </label>
					<input type="text" class="form-control" name="kilometer_perjam" placeholder="Masukkan Kilometer Perjam">
				</div>
				<div class="form-group">
					<label> BBM Pinjam </label>
					<input type="number" class="form-control" name="bbm_pinjam" placeholder="0">
				</div>
				<div class="form-group">
					<label> Kondisi Mobil Pinjam </label>
					<input type="text" class="form-control" name="kondisi_mobil_pinjam" placeholder="Masukkan Kondisi Mobil Pinjam">
				</div>
				<div class="form-group">
					<label> Nama Sopir </label>
					<select class="form-control" name="id_sopir">
						<option value="">- Pilih -</option>
						@foreach($data_sopir as $sopir)
						<option value="{{ $sopir->id_sopir }}">
							{{ $sopir->nama_sopir }} - Rp. {{ number_format($sopir->tarif_perjam) }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-panel">
				<h4 class="mb"><i class="fa fa-taxi"></i> Data Pelanggan </h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label> No. KTP </label>
							<input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No. KTP ">
						</div>					
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label> Telepon Pelanggan </label>
							<input type="text" class="form-control" name="telp_pel" placeholder="Masukkan Telepon Pelanggan">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label> Nama Pelanggan </label>
					<input type="text" class="form-control" name="nama_pel" placeholder="Masukkan Nama Pelanggan">
				</div>
				<div class="form-group">
					<label> Alamat Pelanggan </label>
					<textarea class="form-control" rows="4" name="alamat_pel" placeholder="Masukkan Alamat Pelanggan"></textarea>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt">
		<div class="col-md-12">
			<button type="submit" class="btn btn-success btn-block">
				Tambah
			</button>
		</div>
	</div>
</form>

@endsection