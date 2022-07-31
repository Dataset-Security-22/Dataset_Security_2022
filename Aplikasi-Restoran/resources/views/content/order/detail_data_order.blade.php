@extends("content.layouts")

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				{{ session("sukses") }}
			</div>
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				{{ session("error") }}
			</div>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-search"></i> Data Order
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<label class="control-label" for="id_meja"> Kode Meja </label>
						<input type="text" class="form-control" id="id_meja" name="id_meja" value="{{ $edit->rs_meja->kode_meja }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label class="control-label" for="tanggal"> Tanggal </label>
						<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $edit->tanggal }}" readonly style="background-color: white;">
					</div>
					<div class="form-group">
						<label class="control-label" for="keterangan"> Keterangan </label>
						<textarea class="form-control" rows="5" id="keterangan" name="keterangan" readonly style="background-color: white;">{{ $edit->keterangan }}</textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for="status_order"> Status Order </label>
						<?php
						if ($edit->status_order == 1) {
							$data = "Terpesan";
						} else if ($edit->status_order == 2) {
							$data = "Disajikan";
						} else {
							$data = "Error";
						}
						?>
						<input type="text" class="form-control" id="status_order" name="status_order" value="{{ $data }}" readonly style="background-color: white;">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Order Pesanan
			</div>
			<div class="panel-body">
				<div class="table table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">No. Meja</th>
								<th class="text-center">Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_order as $order)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $order->rs_meja->kode_meja }}</td>
								<td class="text-center">
									@if($order->status_order == 1)
									Terpesan
									@elseif($order->status_order == 2)
									Sudah di Booking
									@elseif($order->status_order == 3)
									Kosong
									@else
									Error
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/edit_data_order/'.$order->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>
									<a onclick="return confirm('Mau di Hapus')" href="{{ url('/hapus_data_order/'.$order->id.'/hapus') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				List Makanan
			</div>
			<div class="panel-body">
				<div class="table table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Masakan</th>
								<th class="text-center">Stok</th>
								<th class="text-center">Harga</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_masakan as $masakan)
								<tr>
									<td class="text-center">{{ ++$no }}</td>
									<td>{{ $masakan->nama_masakan }}</td>
									<td class="text-center">{{ $masakan->stok_masakan }}</td>
									<td class="text-center">Rp. {{ number_format($masakan->harga) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Data Order
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_data_pesanan_makan') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id_order" value="{{ $edit->id }}">
					<div class="form-group">
						<label class="control-label" for="id_masakan"> Nama Masakan </label>
						<select class="form-control" id="id_masakan" name="id_masakan">
							<option value="">- Pilih -</option>
							@foreach($data_masakan as $masakan)
							<option value="{{ $masakan->id }}">{{ $masakan->nama_masakan }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="stok_order"> Jumlah Beli </label>
						<input type="number" class="form-control" id="stok_order" name="qty" placeholder="0" min="1">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection