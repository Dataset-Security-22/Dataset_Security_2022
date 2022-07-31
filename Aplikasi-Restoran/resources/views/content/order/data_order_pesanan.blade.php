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
				<i class="fa fa-plus"></i> Tambah Order Pesanan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/simpan_data_order_pesanan') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label" for="id_meja"> No. Meja</label>
						<select class="form-control" id="id_meja" name="id_meja">
							<option value="">- Pilih -</option>
							@foreach($data_meja as $meja)
								<option value="{{ $meja->id }}">{{ $meja->kode_meja }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="keterangan"> Keterangan </label>
						<textarea class="form-control" id="keterangan" rows="5" name="keterangan" placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for="status_order"> Status Order </label>
						<select class="form-control" id="status_order" name="status_order">
							<option value="">- Pilih -</option>
							<option value="1">Terpesan</option>
							<option value="2">Disajikan</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-shopping-car"></i> Data Order Pesanan
			</div>
			<div class="panel-body">
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
									@else
									Disajikan
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/transaksi_data/'.$order->id.'/transaksi') }}" class="btn btn-success btn-sm"><i class="fa fa-money"></i> Transaksi </a>
									<a href="{{ url('/detail_data_order/'.$order->id.'/detail') }}" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Detail </a>
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

@endsection