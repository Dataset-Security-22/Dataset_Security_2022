@extends("content.layouts.app")

@section("page_header") <i class="fa fa-money"></i> Pembayaran @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"> Dashboard</a></li>
	<li class="active">Pembayaran</li>
</ol>

@endsection

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Data Pembayaran </h3>
			</div>
			<div class="box-body">
				<div class="table table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">ID Tagihan</th>
								<th>Nama Pelanggan</th>
								<th class="text-center">Bulan Tagih</th>
								<th class="text-center">Pemakaian</th>
								<th class="text-center">Status Bayar</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_tagihan as $tagihan)
								<tr>
									<td class="text-center">{{ ++$no }}.</td>
									<td class="text-center">{{ $tagihan->id }}</td>
									<td>{{ $tagihan->lpb_penggunaan->lpb_pelanggan->nama }}</td>
									<td class="text-center">{{ $tagihan->bulan }}</td>
									<td class="text-center">{{ $tagihan->jumlah_meter }}</td>
									<td class="text-center">{{ $tagihan->status }}</td>
									<td class="text-center">
										@if($tagihan->status == "Sudah Bayar")
										<a href="{{ url('/pembayaran/'.$tagihan->id.'/detail-data-pembayaran') }}" class="btn btn-info btn-sm">
											<i class="fa fa-search"></i> Detail Data
										</a>
										@else
										<a href="{{ url('/pembayaran/'.$tagihan->id.'/bayar') }}" class="btn btn-success btn-sm">
											<i class="fa fa-search"></i> Bayar Tagihan
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