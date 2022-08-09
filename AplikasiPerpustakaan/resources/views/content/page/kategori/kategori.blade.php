@extends("content.page.layouts.template")

@section("page_title", "Kategori")

@section("page_header") <i class="fa fa-bars"></i> Kategori @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active"> Kategori</li>
</ol>

@stop

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Berhasil!</strong> {{ session("sukses") }}.
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Gagal!</strong> {{ session("error") }}.
		</div>
	</div>
</div>
@endif

@if(session("warning"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Perhatian!</strong> {{ session("warning") }}.
		</div>
	</div>
</div>
@endif

@if(count($errors) > 0)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-plus"></i> Tambah</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ url('/kategori') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label" for="nama_kategori"> Nama Kategori </label>
						<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" autocomplete="off">
					</div>
					<hr>
					<div class="form-group">
						<button  type="submit" class="btn btn-primary btn-sm btn-block">
							<i class="fa fa-plus"></i> Tambah
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Data Kategori</h3>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Nama Kategori</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_kategori as $kategori)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $kategori->nama_kategori }}</td>
							<td class="text-center">
								@if(count($kategori->buku) > 0)
								<button disabled class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit </button>
								<button disabled class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
								</button>
								@else
								<a href="{{ url('/kategori/'.$kategori->id) }}" class="btn btn-warning btn-sm">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<a onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" href="{{ url('/hapus_kategori/'.$kategori->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus </a>
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

@endsection