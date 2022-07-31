@extends("content.layouts.app")

@section("page_header", "Update Gambar")

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
				 <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Update Gambar</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/update_gambar') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label for="ganti_gambar"> Gambar </label>
						<img src="{{ url('/public/images/'.$edit->image) }}" width="300">
					</div>
					<div class="form-group">
						<label for="image"> Ganti Gambar </label>
						<input type="file" class="form-control" id="image" name="image">
					</div>
					<div class="form-group">
						<label for="label"> Label </label>
						<input type="text" class="form-control" id="label" name="label" placeholder="Label" value="{{ $edit->label }}">
					</div>
					<div class="form-group">
						<label for="details"> Detail </label>
						<textarea class="form-control" id="details" name="details" placeholder="Detail">{{ $edit->details }}</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block btn-sm"><i class="fas fa-fw fa-save"></i> Simpan </button>
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
								<th class="text-center">Image</th>
								<th>Label</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_gambar as $gambar)
								<tr>
									<td class="text-center">{{ ++$no }}.</td>
									<td class="text-center">
										<img src="{{ url('/public/images/'.$gambar->image) }}" width="100">
									</td>
									<td>{{ $gambar->label }}</td>
									<td class="text-center">
										<a href="{{ url('/admin/'.$gambar->id.'/edit_gambar') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
										<a href="{{ url('/admin/'.$gambar->id.'/hapus_gambar') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
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