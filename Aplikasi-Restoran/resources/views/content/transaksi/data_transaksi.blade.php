@extends("content.layouts")

@section("page_content")

<div class="col-md-12">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Transaksi
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th>Nama Pembeli</th>
						<th class="text-center">No. Telepon</th>
						<th class="text-center">Status Pemesanan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_pemesanan_menu as $pemesanan_menu)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td>{{ $pemesanan_menu->nama_pembeli }}</td>
							<td class="text-center">{{ $pemesanan_menu->no_hp }}</td>
							<td class="text-center">{{ $pemesanan_menu->status_order }}</td>
							<td class="text-center">
								@if(count($pemesanan_menu->relasi_ke_transaksi) > 0)
								<button disabled class="btn btn-danger btn-sm">
									<i class="fa fa-money"></i> Sudah Bayar
								</button>
								@else
								<a href="{{ url('/bayar_transaksi/'.$pemesanan_menu->id.'/bayar') }}" class="btn btn-success btn-sm">
									<i class="fa fa-money"></i> Bayar
								</a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection