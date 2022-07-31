@extends("page.layouts.template")

@section("page_title", "Data Blog Post")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Blog Post</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/post_blog/') }}"> Data Blog Post </a>
				</li>
				<li class="breadcrumb-item active"> Form Tambah Blog Post </li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ url('/page/admin/post_blog/tambah') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-plus"></i> Form Tambah Blog Post
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="id_kategori"> Kategori </label>
									<select class="form-control select2bs4" id="id_kategori" name="id_kategori" style="width: 100%;">
										<option value="">- Pilih -</option>
										@foreach($data_kategori as $kategori)
										<option value="{{ $kategori->id_kategori }}">
											{{ $kategori->nama_kategori }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="title"> Judul </label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="body"> Deskripsi </label>
							<textarea id="summernote" name="body">Masukkan Deksripsi</textarea>
						</div>
						<div class="form-group">
							<label for="gambar"> Gambar </label>
							<img class="img-preview img-fluid mb-3 col-sm-5">
							<input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Nama Bagian" onchange="previewImage()">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Tambah
						</button>
						<button type="reset" class="btn btn-danger btn-sm">
							<i class="fa fa-refresh"></i> Batal
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section("page_scripts")

<script type="text/javascript">
	function previewImage()
	{
		const image = document.querySelector('#gambar');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
</script>

@endsection