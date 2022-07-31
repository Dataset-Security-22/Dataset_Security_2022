@extends("content.layouts.app")

@section("page_content")

<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
			<h4><i class="fa fa-sign-out"></i> Data Pengembalian</h4>
			<section id="unseen">
				<table id="data" class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">No. Transaksi</th>
							<th class="text-center">Tanggal Pesan</th>
							<th>Nama Pelanggan</th>
							<th class="text-center">Telepon Pelanggan</th>
							<th class="text-center">Status Rental </th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_pelanggan as $pelanggan)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pelanggan->re_transaksi->no_transaksi }}</td>
							<td class="text-center">{{ $pelanggan->re_transaksi->tgl_pesan }}</td>
							<td>{{ $pelanggan->nama_pel }}</td>
							<td class="text-center">{{ $pelanggan->telp_pel }}</td>
							<td class="text-center">{{ $pelanggan->re_transaksi->status_pengembalian }}</td>
							<td class="text-center">
								@if($pelanggan->re_transaksi->status_pengembalian == "Sudah di Kembalikan")
								<a href="{{ url('/detail_pengembalian_rental/'.$pelanggan->id.'/rental_kembali') }}" class="btn btn-warning btn-sm">
									<i class="fa fa-search"></i> Detail
								</a>
								@elseif($pelanggan->re_transaksi->status_pengembalian == "Belum di Kembalikan")
								<a href="{{ url('/detail_pengembalian/'.$pelanggan->id.'/pengembalian') }}" class="btn btn-info btn-sm">
									<i class="fa fa-search"></i> Detail
								</a>
								@else
								Tidak Jelas
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</section>
		</div>
	</div>
</div>

@endsection