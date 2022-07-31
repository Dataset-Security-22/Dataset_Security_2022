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
				<i class="fa fa-pencil"></i> Update Order Pesanan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/update_data_order_pesanan') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label class="control-label" for="id_meja"> No. Meja</label>
						<select class="form-control" id="id_meja" name="id_meja">
							<option value="">- Pilih -</option>
							@foreach($data_meja as $meja)
								@if($edit->id_meja == $meja->id)
									<option value="{{ $meja->id }}" selected>{{ $meja->kode_meja }}</option>
								@else
									<option value="{{ $meja->id }}">{{ $meja->kode_meja }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="keterangan"> Keterangan </label>
						<textarea class="form-control" id="keterangan" rows="5" name="keterangan" placeholder="Keterangan">{{ $edit->keterangan }}</textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for="status_order"> Status Order </label>
						<select class="form-control" id="status_order" name="status_order">
							@if($edit->status_order == 1)
							<option value="1" selected>Terpesan</option>
							<option value="2">Disajikan</option>
							@elseif($edit->status_order == 2)
							<option value="1">Terpesan</option>
							<option value="2" selected>Disajikan</option>
							@else
							<option value="">- Pilih -</option>
							@endif
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-pencil"></i> Update </button>
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
									@elseif($order->status_order == 2)
									Sudah di Booking
									@elseif($order->status_order == 3)
									Kosong
									@else
									Error
									@endif
								</td>
								<td class="text-center">
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