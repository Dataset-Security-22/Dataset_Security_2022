@extends("page.layouts.template")

@section("page_title", "Data Kelas")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Kelas</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/kelas/') }}"> Data Kelas </a>
				</li>
				<li class="breadcrumb-item active">Edit Data Kelas</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form id="quickForm" method="POST" action="{{ url('/page/admin/kelas/simpan') }}">
				{{ csrf_field() }}
				<input type="hidden" name="id_kelas" value="{{ $edit->id_kelas }}">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-edit"></i> Edit Data Kelas
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="nama_kelas"> Nama Kelas </label>
							<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" value="{{ $edit->nama_kelas }}">
						</div>
						<div class="form-group">
							<label for="id_prodi"> Prodi </label>
							<select class="form-control" id="id_prodi" name="id_prodi">
								<option value="">- Pilih </option>
								@foreach($data_prodi as $prodi)
									@if($prodi->id_prodi == $edit->id_prodi)
									<option value="{{ $prodi->id_prodi }}" selected>
										{{ $prodi->nama_prodi }}
									</option>
									@else
									<option value="{{ $prodi->id_prodi }}">
										{{ $prodi->nama_prodi }}
									</option>
									@endif
								@endforeach
							</select>
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
						Data Kelas
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Nama Kelas</th>
								<th class="text-center">Prodi</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_kelas as $kelas)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $kelas->nama_kelas }}</td>
								<td class="text-center">
									@if(empty($kelas->getProdi->nama_prodi))
										<i><b>NULL</b></i>
									@else
									{{ $kelas->getProdi->nama_prodi }}
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/kelas/edit') }}/{{ $kelas->id_kelas }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$kelas->id_kelas}})">
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
    		nama_kelas: {
        		required : true,
    		},
    		id_prodi : {
    			required : true,
    		},
  		},
    	messages: {
    		nama_kelas : {
        		required: "Kolom tidak boleh kosong",
      		},
      		id_prodi : {
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
	function hapus(id_kelas)
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
					url : "{{ url('/page/admin/kelas/hapus') }}/" + id_kelas,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_kelas : id_kelas },
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