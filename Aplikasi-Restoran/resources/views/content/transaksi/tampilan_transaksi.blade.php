@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-money"></i> Data Transaksi
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Tanggal Order</th>
							<th class="text-center">Harga Makan</th>
							<th class="text-center">Bayar</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_transaksi as $transaksi)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $transaksi->tanggal }}</td>
								<td class="text-center">Rp. {{ number_format($transaksi->harga_makan) }}</td>
								<td class="text-center">Rp. {{ number_format($transaksi->bayar) }}</td>
								<td class="text-center">{{ $transaksi->status_transaksi }}</td>
								<td class="text-center">
									<a href="" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>
									<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection