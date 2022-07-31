@extends("content.layouts.app")

@section("page_header", "Images")

@section("page_content")

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
			@endforeach
		</ul>
	</div>
@endif

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
	<div class="col-md-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				 <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Gambar</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/tambah_gambar_lapangan') }}" enctype="multipart/form-data">
					<input type="hidden" name="room_id" value="0">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="room_id"> Nama Ruangan </label>
						<select class="form-control" id="room_id" name="room_id">
							<option value="">- Pilih -</option>
							@foreach($data_lapangan as $lapangan)
								<option value="{{ $lapangan->id }}">{{ $lapangan->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="image"> Gambar </label>
						<input type="file" class="form-control" id="image" name="image">
					</div>
					<div class="form-group">
						<label for="label"> Nama Gambar </label>
						<input type="text" class="form-control" id="label" name="label" placeholder="Masukkan Nama Gambar">
					</div>
					<div class="form-group">
						<label for="details"> Detail </label>
						<textarea class="form-control" id="details" name="details" placeholder="Detail Gambar"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-fw fa-plus"></i> Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-images"></i> Data Gambar</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Ruangan</th>
								<th class="text-center">Image</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_gambar as $gambar)
								<tr>
									<td>{{ ++$no }}</td>
									<td>{{ $gambar->get_fields->name }}</td>
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