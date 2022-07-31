@extends("page.layouts.template")

@section("page_title", "Data Divisi")

@section("page_css")

<link rel="stylesheet" href="{{ url('/layouts') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ url('/layouts') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endsection

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Divisi</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/divisi/') }}"> Data Divisi </a>
				</li>
				<li class="breadcrumb-item active"> Edit Data Divisi </li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form id="quickForm" method="POST" action="{{ url('/page/admin/divisi/simpan/') }}">
				{{ csrf_field() }}
				<input type="hidden" id="id_divisi" value="{{ $edit->id_divisi }}">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-edit"></i> Edit Data Divisi
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="id_bagian"> Bagian </label>
							<select class="form-control selectbs4" id="id_bagian" name="id_bagian" style="width: 100%">
								<option value="">- Pilih -</option>
								@foreach($data_bagian as $bagian)
									@if($edit->id_bagian == $bagian->id_bagian)
									<option value="{{ $bagian->id_bagian }}" selected>
										{{ $bagian->nama_bagian }}
									</option>
									@else
									<option value="{{ $bagian->id_bagian }}">
										{{ $bagian->nama_bagian }}
									</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="nim_anggota"> Anggota </label>
							<select class="form-control select2bs4" id="nim_anggota" name="nim_anggota" style="width: 100%">
								<option value="">- Pilih -</option>
								@foreach($data_anggota as $anggota)
									@if($edit->id_anggota == $anggota->id_anggota)
									<option value="{{ $anggota->nim }}" selected>
										{{ $anggota->nama }}
									</option>
									@else
									<option value="{{ $anggota->nim }}">
										{{ $anggota->nama }}
									</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="id_jabatan"> Jabatan </label>
							<select class="form-control select3bs4" id="id_jabatan" name="id_jabatan" style="width: 100%">
								<option value="">- Pilih -</option>
								@foreach($data_jabatan as $jabatan)
									@if($edit->id_jabatan == $jabatan->id_jabatan)
									<option value="{{ $jabatan->id_jabatan }}" selected>
										{{ $jabatan->nama_jabatan }}
									</option>
									@else
									<option value="{{ $jabatan->id_jabatan }}">
										{{ $jabatan->nama_jabatan }}
									</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-success btn-sm">
							<i class="fa fa-edit"></i> Simpan
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
						Data Divisi
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">NIM</th>
								<th class="text-center">Jabatan</th>
								<th class="text-center">Bagian</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_divisi as $divisi)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">
									@if(empty($divisi->getBagian->nama_bagian))
									<i><b>NULL</b></i>
									@else
									{{ $divisi->getBagian->nama_bagian }}
									@endif
								</td>
								<td class="text-center">
									@if(empty($divisi->getJabatan->nama_jabatan))
									<i><b>NULL</b></i>
									@else
									{{ $divisi->getJabatan->nama_jabatan }}
									@endif
								</td>
								<td class="text-center">
									@if(empty($divisi->getAnggota->nama))
									<i><b>NULL</b></i>
									@else
									{{ $divisi->getAnggota->nama }}
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/divisi/edit') }}/{{ $divisi->id_divisi }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$divisi->id_divisi}})">
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

<script src="{{ url('/layouts') }}/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(function() {
  	$('.selectbs4').select2({
  		theme: 'bootstrap4'
  	}),
    $('.select3bs4').select2({
      theme: 'bootstrap4'
    }),
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>

<script>
$(function () {
	$('#quickForm').validate({
    	rules: {
    		id_bagian : {
        		required : true,
    		},
    		nim_anggota : {
    			required : true,
    		},
    		id_jabatan : {
    			required : true,
    		},
  		},
    	messages: {
    		id_bagian : {
        		required: "Kolom tidak boleh kosong",
      		},
      		nim_anggota : {
      			required : "Kolom tidak boleh kosong",
      		},
      		id_jabatan : {
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
	function hapus(id_divisi)
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
					url : "{{ url('/page/admin/divisi/hapus') }}/" + id_divisi,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_divisi : id_divisi },
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