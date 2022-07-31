@extends("content.layouts")

@section("page_content")

<div class="col-md-12">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Data Pembayaran Transaksi 
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Kode Transaksi</th>
						<th class="text-center">Status Transaksi</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_transaksi as $transaksi)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $transaksi->kode_transaksi }}</td>
							<td class="text-center">{{ $transaksi->status_transaksi }}</td>
							<td class="text-center">
								<a href="{{ url('/detail_pembayaran/'.$transaksi->id.'/detail') }}" class="btn btn-primary btn-sm">
									<i class="fa fa-fw fa-search"></i> Detail Pembayaran
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection