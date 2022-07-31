@extends("content.layouts")

@section("page_content")

<div class="col-md-12">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Pesanan Menu
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
						<th class="text-center">Total Pesanan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_pesanan as $pesanan)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pesanan->relasi_ke_menu->kode_menu }}</td>
							<td>{{ $pesanan->relasi_ke_menu->nama_menu }}</td>
							<td class="text-center">
								<form method="POST" action="{{ url('/update_data_pesanan') }}">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{ $pesanan->id }}">
									<input type="hidden" name="id_menu" value="{{ $pesanan->id_menu }}">
									<input type="number" name="qty" value="{{ $pesanan->qty }}" style="text-align: center; border-radius: 3px;">
									<input type="submit" value="Update" style="background-color: yellow; color: black; border-radius: 3px;">
								</form>
							</td>
							<td class="text-center">Rp. {{ number_format($pesanan->harga) }}</td>
							<td class="text-center">Rp. {{ number_format($pesanan->total) }}</td>
							<td class="text-center">
								<a onclick="return confirm('Pesanan Mau di Cancel ?')" href="{{ url('/delete_pesanan/'.$pesanan->id.'/delete') }}" class="btn btn-danger btn-sm">
									<i class="fa fa-refresh"></i> Cancel
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<a href="{{ url('/dashboard') }}" class="btn btn-danger btn-sm">
				<i class="fa fa-refresh"></i> Pesan Lagi
			</a>
			<a href="{{ url('/data_pesan_menu') }}" class="btn btn-success btn-sm">
				<i class="fa fa-pencil"></i> Pesan Menu
			</a>
		</div>
	</div>
</div>

@endsection