@extends("content.layouts")

@section("page_content")

<form method="POST" action="{{ url('/simpan_data_pemesanan_menu') }}">
	{{ csrf_field() }}
	<div class="col-md-12">
		<div class="panel panel-violet">
			<div class="panel-heading">
				List Data Pemesanan Menu
			</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Kode Menu</th>
							<th>Nama Menu</th>
							<th class="text-center">QTY</th>
							<th class="text-center">Harga Menu</th>
							<th class="text-center">Total </th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_pesanan as $pesanan)
						<tr>
							<input type="hidden" name="id_menu" value="{{ $pesanan->id_menu }}">
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pesanan->relasi_ke_menu->kode_menu }}</td>
							<td>{{ $pesanan->relasi_ke_menu->nama_menu }}</td>
							<td class="text-center">{{ $pesanan->qty }}</td>
							<td class="text-center">Rp. {{ number_format($pesanan->harga) }}</td>
							<td class="text-center">Rp. {{ number_format($pesanan->total) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-violet">
			<div class="panel-heading">
				Data Pembeli
			</div>
			<div class="panel-body pan">
				<div class="form-body pal">
					<div class="form-group">
						<label> Kode Order</label>
						<input type="text" class="form-control" name="kode_order" placeholder="Masukkan Kode Order">
					</div>
					<div class="form-group">
						<label> Nama Pembeli </label>
						<input type="text" class="form-control" name="nama_pembeli" placeholder="Masukkan Nama Pembeli">
					</div>
					<div class="form-group">
						<label> No. Telepon </label>
						<input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. Telepon">
					</div>
					<div class="form-group">
						<label> Kode Meja </label>
						<select class="form-control" name="id_meja">
							<option value="">- Pilih -</option>
							@foreach($data_meja as $meja)
							<option value="{{ $meja->id }}">
								{{ $meja->kode_meja }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-actions text-right pal">
					<button type="submit" class="btn btn-success btn-block">
						<i class="fa fa-plus"></i> Tambah 
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection