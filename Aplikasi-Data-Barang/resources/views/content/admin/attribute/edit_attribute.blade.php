@extends("content.layouts.app")

@section("page_header", "Update Data Attribute")

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
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Update Attribute </h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/update_attribute') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label for="good_id"> Nama Barang </label>
						<select class="form-control" id="good_id" name="good_id">
							<option value="">- Pilih -</option>
							@foreach($data_barang as $barang)
								@if($edit->good_id == $barang->id)
									<option value="{{ $barang->id }}" selected>{{ $barang->name }}</option>
								@else
									<option value="{{ $barang->id }}">{{ $barang->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="key"> Kunci </label>
						<input type="text" class="form-control" id="key" name="key" placeholder="Masukkan Nilai" value="{{ $edit->key }}">
					</div>
					<div class="form-group">
						<label for="value"> Nilai </label>
						<input type="text" class="form-control" id="value" name="value" placeholder="Masukkan Angka" value="{{ $edit->value }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-save"></i> Simpan </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Data Attribute </h6>
			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Barang</th>
								<th>Kunci</th>
								<th class="text-center">Nilai</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_attribute as $attribute)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $attribute->get_goods->name }}</td>
								<td>{{ $attribute->key }}</td>
								<td class="text-center">{{ $attribute->value }}</td>
								<td class="text-center">
									<a href="{{ url('/admin/'.$attribute->id.'/edit_attribute') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
									<a onclick="return confirm('Yakin ? Ingin menghapus data ini ?')" href="{{ url('/admin/'.$attribute->id.'/hapus_attribute') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
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