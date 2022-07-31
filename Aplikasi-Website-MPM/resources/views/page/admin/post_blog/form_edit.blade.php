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
				<li class="breadcrumb-item active"> Form Edit Blog Post </li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ url('/page/admin/post_blog/simpan') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $edit->id }}">
				<input type="hidden" name="oldImage" value="{{ $edit->gambar }}">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-edit"></i> Form Edit Blog Post
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
											@if($edit->id_kategori == $kategori->id_kategori)
												<option value="{{ $kategori->id_kategori }}" selected>
													{{ $kategori->nama_kategori }}
												</option>
											@else
												<option value="{{ $kategori->id_kategori }}">
													{{ $kategori->nama_kategori }}
												</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="title"> Judul </label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" value="{{ $edit->title }}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="body"> Deskripsi </label>
							<textarea id="summernote" name="body">{{ $edit->body }}</textarea>
						</div>
						<div class="form-group">
							<label for="gambar"> Gambar </label>
							@if($edit->gambar)
							<img src="{{ url('/storage') }}/{{ $edit->gambar }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
							@else
							<img class="img-preview img-fluid mb-3 col-sm-5">
							@endif
							<input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-success btn-sm">
							<i class="fa fa-save"></i> Simpan
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