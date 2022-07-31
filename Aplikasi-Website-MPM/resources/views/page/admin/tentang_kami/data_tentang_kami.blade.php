@extends("page.layouts.template")

@section("page_title", "Data Tentang Kami")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Tentang Kami</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Tentang Kami</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	@if($data_tentang_kami->count())
		@foreach($data_tentang_kami as $tentang_kami)
		<form method="POST" action="{{ url('/page/admin/tentang_kami/simpan') }}" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{{ $tentang_kami->id }}">
			<input type="hidden" name="oldImage" value="{{ $tentang_kami->gambar }}">
		@endforeach
	@else
	<form method="POST" action="{{ url('/page/admin/tentang_kami/tambah') }}" enctype="multipart/form-data">
	@endif
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							@if($data_tentang_kami->count())
							<i class="fa fa-edit"></i> Edit Data Tentang Kami
							@else
							<i class="fa fa-plus"></i> Tambah Data Tentang Kami
							@endif
						</h3>
					</div>
					<div class="card-body">
						@if($data_tentang_kami->count())
						@foreach($data_tentang_kami as $tentang_kami)
						<div class="form-group">
							<label for="judul"> Judul </label>
							<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" value="{{ $tentang_kami->judul }}">
						</div>
						<div class="form-group">
							<label for="body"> Deskripsi </label>
							<textarea id="summernote1" name="body">
								{!! $tentang_kami->body !!}
							</textarea>
						</div>
						@endforeach
						@else
						<div class="form-group">
							<label for="judul"> Judul </label>
							<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
						</div>
						<div class="form-group">
							<label for="body"> Deskripsi </label>
							<textarea id="summernote1" name="body">
								Masukkan Deskripsi
							</textarea>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-image"></i> Upload Gambar
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="gambar"> Gambar </label>
							@if($data_tentang_kami->count())
								@foreach($data_tentang_kami as $tentang_kami)
									<img src="{{ url('storage/'.$tentang_kami->gambar) }}" class="img-preview" width="300">
								@endforeach
							@else
							<img class="img-preview" width="300">
							@endif
							<input type="file" onchange="previewImage()" class="form-control" name="gambar" id="gambar">
						</div>
					</div>
					<div class="card-footer">
						@if($data_tentang_kami->count())
						<button type="submit" class="btn btn-success btn-sm">
							<i class="fa fa-edit"></i> Simpan
						</button>
						@else
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Tambah
						</button>
						@endif
						<button type="reset" class="btn btn-danger btn-sm">
							<i class="fa fa-refresh"></i> Batal
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

@section("page_scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/additional-methods.min.js"></script>

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

<script>
	$(function () {
		$('#quickForm').validate({
			rules: {
				nama_role : {
					required : true,
				},
			},
			messages: {
				nama_role : {
					required: "Kolom tidak boleh kosong",
				},
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>

<script type="text/javascript">
	function hapus(id)
	{
		swal({
			title: "Yakin ? Ingin Menghapus Data Ini ?",
			text: "Klik OK, Untuk Menghapus!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})

		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url : "{{ url('/page/admin/tentang_kami/hapus') }}/" + id,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id : id },
					success : function (res) {
						swal({
							title: "Berhasil!",
							text: "Data Berhasil di Hapus",
							icon: "success",
							button: "OK!",
						})

						.then((willBerhasil) => {
							window.location.reload();
						});
					}
				})
			} else {

			}
		});
	}
</script>

@if(session("sukses"))

<script type="text/javascript">
	swal({
		title: "Berhasil!",
		text: "{{ session('sukses') }}",
		icon: "success",
		button: "OK",
	});

</script>

@endif

@stop