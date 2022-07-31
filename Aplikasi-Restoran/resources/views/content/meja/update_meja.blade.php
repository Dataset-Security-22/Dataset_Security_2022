@extends("content.layouts")

@section("page_content")

<div class="col-md-4">
	<div class="panel panel-yellow">
		<div class="panel-heading">
			Update Data Meja
		</div>
		<div class="panel-body pan">
			<form method="POST" action="{{ url('/update_meja') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $edit->id }}">
				<div class="form-body pal">
					<div class="form-group">
						<label> Kode Meja </label>
						<input type="text" class="form-control" name="kode_meja" placeholder="Masukkan Kode Meja" value="{{ $edit->kode_meja }}">
					</div>
					<div class="form-group">
						<label> Status Meja </label>
						<select class="form-control" name="status_meja">
							<option value="">- Pilih -</option>
							@if($edit->status_meja == "ready")
							<option value="ready" selected>Ready</option>
							<option value="terpesan">Terpesan</option>
							@else
							<option value="ready">Ready</option>
							<option value="terpesan" selected>Terpesan</option>
							@endif
						</select>
					</div>
				</div>
				<div class="form-actions text-right pal">
					<button type="submit" class="btn btn-warning btn-block">
						<i class="fa fa-fw fa-save"></i> Simpan 
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="panel panel-yellow">
		<div class="panel-heading">
			Data Meja
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Kode Meja</th>
						<th class="text-center">Status Meja</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_meja as $meja)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $meja->kode_meja }}</td>
							<td class="text-center">{{ $meja->status_meja }}</td>
							<td class="text-center">
								<a href="{{ url('/edit_meja/'.$meja->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i> Update </a>
								<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/delete_meja/'.$meja->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i> Delete </a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection