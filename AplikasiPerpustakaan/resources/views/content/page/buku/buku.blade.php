@extends("content.page.layouts.template")

@section("page_title", "Buku")

@section("page_header") <i class="fa fa-book"></i> Buku @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Buku</li>
</ol>

@stop

@section("page_scripts")

<script type="text/javascript">
	function edit_buku(id) {
		$.ajax({
			url : "{{ url('/edit_buku') }}",
			type : "GET",
			data : { id : id },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>

@endsection

@section("page_title", "Data Buku")

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
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				@if(Auth::user()->level == 1)
				<h3 class="box-title">Data Buku</h3>
				@else
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data </button>
				@endif
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Kode Buku</th>
							<th>Judul</th>
							<th>Penerbit</th>
							<th>Pengarang</th>
							<th class="text-center">Tahun</th>
							<th class="text-center">Stok</th>
							@if(Auth::user()->level == 2)
							<th class="text-center">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_buku as $buku)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $buku->kode }}</td>
							<td>{{ $buku->judul }}</td>
							<td>{{ $buku->penerbit }}</td>
							<td>{{ $buku->pengarang }}</td>
							<td class="text-center">{{ $buku->tahun }}</td>
							<?php
								$date = date("Y-m-d");

								$kembali = DB::table("pinjam")
									->where("tgl_mengembalikan",NULL)
									->where("kode_buku", $buku->kode)
									->count();

									$total = $buku->stok_buku - $kembali;
							?>
							<td class="text-center">{{ $total }}</td>
							@if(Auth::user()->level == 2)
							<td class="text-center">
								@if(count($buku->pinjam) > 0)
								<button onclick="edit_buku({{$buku->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update"><i class="fa fa-pencil"></i> Edit </button>
								<button disabled class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus </button>
								@else
								<button onclick="edit_buku({{$buku->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update"><i class="fa fa-pencil"></i> Edit </button>
								<a onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" href="{{ url('/hapus_data_buku/'.$buku->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus </a>
								@endif
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@if(Auth::user()->level == 1)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<strong>Note :</strong> <b>Admin</b> hanya dapat melihat <b>Data Buku</b> saja.
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-pencil"></i> Note :</h3>
			</div>
			<div class="box-body">
				<p>
					- Apabila <b><i>stock</i></b> habis. Maka, petugas wajib mengupdate data <b><i>stock</i></b> kembali.
					<br>
					- Rumus Menghitung Stok Buku : <b>Jumlah Stok Buku - Jumlah Peminjaman Buku</b>.
				</p>
			</div>
		</div>
	</div>
</div>
@endif
<!-- Awal Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/buku') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label"> Kode Buku </label>
								<input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Buku" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label"> Rak </label>
								<select class="form-control" name="id_rak">
									<option value="">- Pilih -</option>
									@foreach($data_rak as $rak)
									<option value="{{ $rak->id }}">
										{{ $rak->nama_rak }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label"> Kategori </label>
								<select class="form-control" name="id_kategori">
									<option value="">- Pilih -</option>
									@foreach($data_kategori as $kategori)
									<option value="{{ $kategori->id }}">
										{{ $kategori->nama_kategori }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label"> Judul Buku </label>
						<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" autocomplete="off">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Penerbit </label>
								<input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Pengarang </label>
								<input type="text" class="form-control" name="pengarang" placeholder="Masukkan Nama Pengarang" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Tahun </label>
								<input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Stok Buku </label>
								<input type="number" class="form-control" name="stok_buku" placeholder="Masukkan Jumlah" autocomplete="off" min="1">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label"> Image </label>
						<input type="file" class="form-control" name="img">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Awal Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Update Data</h4>
			</div>
			<form method="POST" action="{{ url('/buku') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection