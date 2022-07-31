@extends("page.layouts.template")

@section("page_title", "Data Berita")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Berita</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Berita</li>
			</ol>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	function hapus(id_bagian)
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
					url : "{{ url('/page/admin/bagian/hapus') }}/" + id_bagian,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_bagian : id_bagian },
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

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form method="POST" action="{{ url('/page/admin/berita/tambah') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="id_users" value="{{ auth()->user()->id }}">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-plus"></i> Tambah Berita
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="judul"> Judul </label>
							<input type="text" class="form-control" id="judul" name="judul">
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
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Data Berita
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Nama Berita</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0 ?>
							@foreach($data_berita as $berita)
							<tr>
								<td class="text-center">{{ ++$no }}</td>
								<td class="text-center">
									<img src="{{ url('/storage/'.$berita->gambar) }}" width="100">
								</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/berita/edit') }}/{{ $berita->id }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form method="POST" action="{{ url('/page/admin/berita/hapus') }}" class="d-inline">
										@csrf
										<input type="hidden" name="id" value="{{ $berita->id }}">
										<input type="hidden" name="gambar" value="{{ $berita->gambar }}">
										<button type="submit" class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Hapus
										</button>
									</form>
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