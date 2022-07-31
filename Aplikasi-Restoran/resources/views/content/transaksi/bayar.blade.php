@extends("content.layouts")

@section("page_content")

<div class="col-md-4">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Pemesanan 
		</div>
		<div class="panel-body pal">
			<div class="form-body pan">
				<div class="form-group">
					<label> Tanggal Pemesanan </label>
					<input type="text" class="form-control" value="{{ $detail->tanggal_pesan }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Nama Pembeli </label>
					<input type="text" class="form-control" value="{{ $detail->nama_pembeli }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Kode Meja </label>
					<input type="text" class="form-control" value="{{ $detail->relasi_ke_meja->kode_meja }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> Kode Order </label>
					<input type="text" class="form-control" value="{{ $detail->kode_order }}" readonly style="background-color: white;">
				</div>
				<div class="form-group">
					<label> No. Telepon </label>
					<input type="text" class="form-control" value="{{ $detail->no_hp }}" readonly style="background-color: white;">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Pemesanan Menu
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Harga Menu</th>
						<th class="text-center">QTY</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					<?php $total = 0; ?>
					@foreach($detail_menu as $dm)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">Rp. {{ number_format($dm->harga_menu) }}</td>
							<td class="text-center">{{ $dm->jumlah_beli }}</td>
							<td class="text-center">Rp. {{ number_format($dm->total) }}</td>
						</tr>
					<?php $total += $dm->total;  ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Pembayaran Menu
		</div>
		<div class="panel-body pan">
			<form method="POST" action="{{ url('/simpan_data_bayar_transaksi') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_meja" value="{{ $detail->id_meja }}">
				<div class="form-body pal">
					<div class="form-group">
						<label> Kode Transaksi </label>
						<input type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Transaksi">
					</div>
						@foreach($detail_menu as $dm)
							<?php $id_order = $dm->id_order; ?>
						@endforeach
						<input type="hidden" name="id_order" value="{{ $id_order }}">
					<div class="form-group">
						<label> Total </label>
						<input type="text" class="form-control" name="total" placeholder="0" value="{{ $total }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label> Bayar </label>
						<input type="text" class="form-control" name="bayar" placeholder="0">
					</div>
				</div>
				<div class="form-actions text-right pal">
					<button type="submit" class="btn btn-success btn-block">
						<i class="fa fa-plus"></i> Bayar Transaksi
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection