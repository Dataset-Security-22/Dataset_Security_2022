@extends("page.layouts.template")

@section("page_title", "Data Proker")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Proker</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/proker/') }}"> Data Proker </a>
				</li>
				<li class="breadcrumb-item active"> Form Tambah Data Proker </li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ url('/page/admin/proker/tambah') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_users" value="1">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-plus"></i> Form tambah Proker
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="nama_proker"> Nama Proker </label>
									<input type="text" class="form-control" id="nama_proker" name="nama_proker" placeholder="Masukkan Nama Proker">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="waktu"> Waktu </label>
									<input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan Waktu">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="waktu"> Target </label>
							<textarea id="summernote" name="target">
								Place <em>some</em> <u>text</u> <strong>here</strong>
							</textarea>
						</div>
						<div class="form-group">
							<label for="waktu"> Parameter </label>
							<textarea id="summernote1" name="parameter">
								Place <em>some</em> <u>text</u> <strong>here</strong>
							</textarea>
						</div>
						<div class="form-group">
							<label for="metode"> Metode </label>
							<textarea id="summernote2" name="metode">
								Place <em>some</em> <u>text</u> <strong>here</strong>
							</textarea>
						</div>
						<div class="form-group">
							<label for="metode"> Sasaran </label>
							<textarea id="summernote3" name="sasaran">
								Place <em>some</em> <u>text</u> <strong>here</strong>
							</textarea>
						</div>
						<div class="form-group">
							<label for="metode"> Kebutuhan </label>
							<textarea id="summernote4" name="kebutuhan">
								Place <em>some</em> <u>text</u> <strong>here</strong>
							</textarea>
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