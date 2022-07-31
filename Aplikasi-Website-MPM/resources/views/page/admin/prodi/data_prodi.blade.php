@extends("page.layouts.template")

@section("page_title", "Data Prodi")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Prodi</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Prodi</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form id="quickForm" method="POST" action="{{ url('/page/admin/prodi/tambah') }}">
				{{ csrf_field() }}
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-plus"></i> Tambah Prodi
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nama_prodi"> Nama Prodi </label>
							<input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Masukkan Nama Prodi">
						</div>
						<div class="form-group">
							<label for="nama_jurusan"> Jurusan </label>
							<select class="form-control select2bs4" id="id_jurusan" name="id_jurusan" style="width: 100%;">
								<option value="">- Pilih -</option>
								@foreach($data_jurusan as $jurusan)
								<option value="{{ $jurusan->id_jurusan }}">
									{{ $jurusan->nama_jurusan }}
								</option>
								@endforeach
							</select>
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
						Data Prodi
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Nama Prodi</th>
								<th class="text-center">Jurusan</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_prodi as $prodi)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $prodi->nama_prodi }}</td>
								<td class="text-center">
									@if(empty($prodi->getJurusan->nama_jurusan))
										<i><b>Null</b></i>
									@else
										{{ $prodi->getJurusan->nama_jurusan }}
									@endif
									
								</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/prodi/edit') }}/{{ $prodi->id_prodi }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$prodi->id_prodi}})">
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
    		nama_prodi: {
        		required : true,
    		},
    		id_jurusan : {
    			required : true,
    		},
  		},
    	messages: {
    		nama_prodi : {
        		required: "Kolom tidak boleh kosong",
      		},
      		id_jurusan : {
      			required : "Kolom tidak boleh kosong",
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
	function hapus(id_prodi)
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
					url : "{{ url('/page/admin/prodi/hapus') }}/" + id_prodi,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_prodi : id_prodi },
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