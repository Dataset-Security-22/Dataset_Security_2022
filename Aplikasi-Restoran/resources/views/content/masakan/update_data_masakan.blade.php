@extends("content.layouts")

@section("page_content")

@if(session('sukses'))
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				{{ session('sukses') }}
			</div>
		</div>
	</div>
</div>
@endif

@if(session('error'))
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				{{ session('error') }}
			</div>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-pencil"></i> Update Data Masakan
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ url('/update_data_masakan') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label class="control-label" for="nama_masakan"> Nama Masakan </label>
						<input type="text" class="form-control" id="nama_masakan" name="nama_masakan" placeholder="Nama Masakan" value="{{ $edit->nama_masakan }}">
					</div>
					<div class="form-group">
						<label class="control-label" for="harga"> Harga Masakan </label>
						<input type="text" class="form-control" id="harga" name="harga" placeholder="0" value="{{ $edit->harga }}">
					</div>
					<div class="form-group">
						<label class="control-label" for="status_masakan"> Status Masakan </label>
						<select class="form-control" id="status_masakan" name="status_masakan">
							<option value="">- Pilih -</option>
							@if($edit->status_masakan == 1)
								<option value="1" selected>Ada</option>
							<option value="0">Tidak Ada</option>
							@else
								<option value="1">Ada</option>
							<option value="0" selected>Tidak Ada</option>
							@endif
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="stok_masakan"> Stok Masakan </label>
						<input type="number" class="form-control" id="stok_masakan" name="stok_masakan" placeholder="0" value="{{ $edit->stok_masakan }}">
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
				<i class="fa fa-pencil"></i> Data Masakan
			</div>
			<div class="panel-body">
				<div class="table table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Masakan</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_masakan as $masakan)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $masakan->nama_masakan }}</td>
								<td class="text-center">Rp. {{ number_format($masakan->harga) }}</td>
								<td class="text-center">
									@if($masakan->status_masakan == 1)
									Ada
									@else
									Tidak Ada
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/edit_data_masakan/'.$masakan->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>
									<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/hapus_data_masakan/'.$masakan->id.'/hapus') }}" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i> Delete </a>
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