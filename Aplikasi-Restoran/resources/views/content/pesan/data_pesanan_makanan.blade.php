@extends("content.layouts")

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data List Makanan
			</div>
			<div class="panel-body">
				<div class="table table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Masakan</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_masakan as $masakan)
								<tr>
									<td class="text-center">{{ ++$no }}.</td>
									<td>{{ $masakan->nama_masakan }}</td>
									<td class="text-center">Rp. {{ number_format($masakan->harga) }}.</td>
									<td class="text-center">
										<a href="{{ url('/detail_data_masakan/'.$masakan->id.'/detail') }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail </a>
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