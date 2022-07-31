@extends("content.layouts.app")

@section("page_header", "Kategori")

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
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Kategori</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/tambah_kategori') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name"> Nama Kategori </label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kategori">
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
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-bars"></i> Data Kategori </h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Kategori</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_kategori as $kategori)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $kategori->name }}</td>
								<td class="text-center">
									@if(count($kategori->get_goods) > 0)
									<button disabled class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </button>
									<button disabled class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </button>
									@else
									<a href="{{ url('/admin/'.$kategori->id.'/edit_kategori') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="{{ url('/admin/'.$kategori->id.'/hapus_kategori') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
									@endif
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