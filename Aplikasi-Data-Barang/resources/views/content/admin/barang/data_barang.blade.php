@extends("content.layouts.app")

@section("page_header", "Barang")

@section("page_scripts")

<script type="text/javascript">
	function ajax_edit_barang(id) {
		$.ajax({
			url : "{{ url('/admin/ajax_edit_barang') }}",
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

<div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="editBarangLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editBarangLabel"><i class="fas fa-fw fa-eraser"></i> Edit Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-content">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-fw fa-eraser"></i> Kembali</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahBarangLabel"><i class="fas fa-fw fa-plus"></i> Tambah Data Barang </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-content">
				<form method="POST" action="{{ url('/admin/tambah_barang') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="category_id"> Nama Kategori </label>
								<select class="form-control" id="category_id" name="category_id">
									<option value="">- Pilih -</option>
									@foreach($data_kategori as $kategori)
									<option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="name"> Nama Barang </label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Barang">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="details"> Detail Barang </label>
								<textarea class="form-control" id="details" name="details" placeholder="Detail Barang"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="image"> Gambar Barang </label>
								<input type="file" class="form-control" id="image" name="image">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-fw fa-plus"></i> Tambah </button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-fw fa-eraser"></i> Kembali</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Stock</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/tambah_stok') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="good_id"> Nama Barang </label>
						<select class="form-control" name="good_id" id="good_id">
							<option value="">- Pilih -</option>
							@foreach($data_barang as $barang)
							<option value="{{ $barang->id }}">{{ $barang->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="type"> Tipe Barang </label>
						<select class="form-control" name="type" id="type">
							<option value="1">Barang Masuk</option>
							<option value="0">Barang Keluar</option>
						</select>
					</div>
					<div class="form-group">
						<label for="quantity"> QTY</label>
						<input type="number" class="form-control" id="quantity" name="quantity" min="1" placeholder="0">
					</div>
					<div class="form-group">
						<label for="details"> Detail </label>
						<textarea class="form-control" id="details" name="details" placeholder="Detail"></textarea>
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
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahBarang">
					<i class="fas fa-fw fa-plus"></i> Tambah Data Barang
				</button>
			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center" width="5">No.</th>
								<th>Nama Barang</th>
								<th class="text-center" width="20">Stok</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_barang as $barang)

							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $barang->name }}</td>
								<td class="text-center">
									<?php
									$stokplus = DB::table("stocks")
									->where("good_id", $barang->id)
									->where("type", "1")
									->sum("quantity");
									
									$stokmin = DB::table("stocks")
									->where("good_id", $barang->id)
									->where("type", "0")
									->sum("quantity");

									$sumstok = $stokplus - $stokmin;

									echo $sumstok;
									?>

								</td>
								<td class="text-center">
									@if(count($barang->get_attribute) > 0)
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBarang" onclick="ajax_edit_barang({{$barang->id}})" disabled><i class="fas fa-fw fa-eraser"></i> Update 
									</button>
									<button type="button" class="btn btn-danger btn-sm" disabled><i class="fas fa-fw fa-trash"></i> Delete </button>
									@else
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editBarang" onclick="ajax_edit_barang({{$barang->id}})"><i class="fas fa-fw fa-eraser"></i> Update 
									</button>
									<a onclick="return confirm('Yakin ? Ingin menghapus data ini ?')" href="{{ url('/admin/'.$barang->id.'/hapus_barang') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Delete </a>
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