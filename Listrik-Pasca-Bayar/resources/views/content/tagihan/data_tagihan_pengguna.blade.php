@extends("content.layouts.app")

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Tagihan Pengguna </h3>
			</div>
			<div class="box-body">
				<div class="table table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">ID Pelanggan</th>
								<th>Nama Pelanggan</th>
								<th class="text-center">Bulan</th>
								<th class="text-center">Tahun</th>
								<th class="text-center">Jumlah Meter</th>
								<th class="text-center">Status Bayar</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_tagihan as $tagihan)
								<tr>
									<td class="text-center">{{ ++$no }}.</td>
									<td class="text-center">{{ $tagihan->lpb_pelanggan->id }}</td>
									<td>{{ $tagihan->lpb_pelanggan->nama }}</td>
									<td class="text-center">{{ $tagihan->bulan }}</td>
									<td class="text-center">{{ $tagihan->tahun }}</td>
									<td class="text-center">{{ $tagihan->jumlah_meter }}</td>
									<td class="text-center">{{ $tagihan->status }}</td>
									<td class="text-center">
										@if($tagihan->status == "Sudah Bayar")
											<a href="{{ url('/lihat_data_pembayaran/'.$tagihan->id.'/lihat_data') }}" class="btn btn-success btn-sm">
												<i class="fa fa-pencil"></i> Lihat Data
											</a>
										@else
											<a href="{{ url('/detail_data_tagihan_pengguna/'.$tagihan->id.'/detail_tagihan') }}" class="btn btn-info btn-sm">
												<i class="fa fa-search"></i> Detail
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
	</div>
</div>

@endsection