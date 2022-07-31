@extends("content.layouts")

@section("page_content")

<div class="col-md-6">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Detail Data Pembayaran Transaksi
		</div>
		<div class="panel-body pan">
			<div class="form-body pal">
				<div class="form-group">
					<label> Kode Transaksi </label>
					<input type="text" class="form-control" value="{{ $detail->kode_transaksi }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Bayar </label>
					<input type="text" class="form-control" value="{{ $detail->bayar }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Total </label>
					<input type="text" class="form-control" value="{{ $detail->total }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Kembalian </label>
					<input type="text" class="form-control" value="{{ $detail->kembali }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Status Transaksi </label>
					<input type="text" class="form-control" value="{{ $detail->status_transaksi }}" disabled style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Pemesanan Menu
		</div>
		<div class="panel-body pan">
			<div class="form-body pal">
				<div class="form-group">
					<label> Tanggal Pesan </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_pemesanan_menu->tanggal_pesan }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Nama Pembeli </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_pemesanan_menu->nama_pembeli }}">
				</div>
				<div class="form-group">
					<label> Kode Meja </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_pemesanan_menu->relasi_ke_meja->kode_meja }}" disabled style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Kode Order </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_pemesanan_menu->kode_order }}">
				</div>
				<div class="form-group">
					<label> No. Telepon </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_pemesanan_menu->no_hp }}">
				</div>
			</div>
		</div>
	</div>
</div>

@endsection