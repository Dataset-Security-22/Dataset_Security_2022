@extends("page.layouts.template")

@section("page_title", "Data Kategori")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Kategori</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/kategori/') }}"> Data Kategori </a>
				</li>
				<li class="breadcrumb-item active">Edit Data Kategori</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form id="quickForm" method="POST" action="{{ url('/page/admin/kategori/simpan') }}">
				<input type="hidden" name="id_kategori" value="{{ $edit->id_kategori }}">
				{{ csrf_field() }}
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-edit"></i> Edit Data Kategori
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nama_kategori"> Nama Kategori </label>
							<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" value="{{ $edit->nama_kategori }}">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-save"></i> Simpan
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
						Data Kategori
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Nama Kategori</th>
								<th>Slug</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_kategori as $kategori)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $kategori->nama_kategori }}</td>
								<td>{{ $kategori->slug }}</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/kategori/edit') }}/{{ $kategori->id_kategori }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$kategori->id_kategori}})">
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

@section("page_scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/additional-methods.min.js"></script>

<script>
$(function () {
	$('#quickForm').validate({
    	rules: {
    		nama_kategori : {
        		required : true,
    		},
  		},
    	messages: {
    		nama_kategori : {
        		required: "Kolom nama kategori tidak boleh kosong",
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
	function hapus(id_kategori)
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
					url : "{{ url('/page/admin/kategori/hapus') }}/" + id_kategori,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_kategori : id_kategori },
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

@elseif(session("double"))

<script type="text/javascript">
	swal({
		title: "Gagal!",
		text: "{{ session('double') }}",
		icon: "error",
		button: "OK",
	});
</script>

@endif

@stop