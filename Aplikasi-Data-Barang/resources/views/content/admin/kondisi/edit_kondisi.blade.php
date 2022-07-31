@extends("content.layouts.app")

@section("page_header", "Kondisi")

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissable fade-show">
			{{ session("sukses") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissable fade-show">
			{{ session("error") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<p>
			<b>
				Note : <br>
				-> Jika Rating Kondisi 1 - 40 = Rusak <- |
				-> Jika Rating Kondisi 41 - 70 = Baik <- |
				-> Jika Rating Kondisi 71 - 100 = Baik Sekali
 			</b>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Update Kondisi</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/tambah_kondisi') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="asset_id"> Nama Ruangan </label>
						<select class="form-control" id="asset_id" name="asset_id">
							<option value="">- Pilih -</option>
							@foreach($data_asset as $asset)
								@if($edit->asset_id == $asset->id)
								<option value="{{ $asset->id }}" selected>{{ $asset->get_rooms->name }}</option>
								@else
								<option value="{{ $asset->id }}">{{ $asset->get_rooms->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="quantity"> Quantity </label>
						<input type="number" class="form-control" id="quantity" name="quantity" min="1" placeholder="0" value="{{ $edit->quantity }}">
					</div>
					<div class="form-group">
						<label for="condition"> Condition </label>
						<input type="number" class="form-control" id="condition" name="condition" placeholder="0" min="1" max="100" value="{{ $edit->condition }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-fw fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-gavel"></i> Data Kondisi</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Nama Ruangan</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Kondisi</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_kondisi as $kondisi)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $kondisi->get_assets->get_rooms->name }}</td>
								<td class="text-center">{{ $kondisi->quantity }}</td>
								<td class="text-center">
									@if($kondisi->condition >= 71 && $kondisi->condition <= 100 )
										Baik sekali
									@elseif($kondisi->condition >= 41 && $kondisi->condition <= 70)
										Baik
									@else
										Rusak
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/admin/'.$kondisi->id.'/edit_kondisi') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="{{ url('/admin/delete_kondisi/'.$kondisi->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
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