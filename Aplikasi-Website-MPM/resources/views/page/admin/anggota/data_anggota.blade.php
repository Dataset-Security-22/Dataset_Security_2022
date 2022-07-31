@extends("page.layouts.template")

@section("page_title", "Data Anggota")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0"> Anggota </h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Anggota</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Data Anggota
					</h3>
					<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-plus"></i> Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">NIM</th>
								<th>Nama</th>
								<th class="text-center">Kelas</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_anggota as $anggota)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $anggota->nim }}</td>
								<td>{{ $anggota->nama }}</td>
								<td class="text-center">
									@if(empty($anggota->getKelas->nama_kelas))
									<i><b>NULL</b></i>
									@else
									{{ $anggota->getKelas->nama_kelas }}
									@endif
								</td>
								<td class="text-center">
									<button onclick="editAnggota({{$anggota->nim}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
										<i class="fa fa-edit"></i> Edit
									</button>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$anggota->nim}})">
											<i class="fa fa-trash-o"></i> Hapus
										</button>
										<a href="{{ url('/page/admin/anggota') }}/{{ $anggota->id }}/detail" class="btn btn-success btn-sm">
											<i class="fa fa-search"></i> Detail
										</a>
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

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<i class="fa fa-plus"></i> Tambah Data
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="quickForm" method="POST" action="{{ url('/page/admin/anggota/tambah') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label for="nim"> NIM </label>
						<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
					</div>
					<div class="form-group">
						<label for="nama"> Nama </label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="jenis_kelamin"> Jenis Kelamin </label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="">- Pilih -</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="agama"> Agama </label>
								<select class="form-control" id="agama" name="agama">
									<option value="">- Pilih -</option>
									<option value="islam"> Islam </option>
									<option value="kristen"> Kristen </option>
									<option value="hindu"> Hindu </option>
									<option value="buddha"> Buddha </option>
									<option value="konghucu"> Konghucu </option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_hp"> No. HP </label>
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="0">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_kelas"> Kelas </label>
								<select class="form-control" id="id_kelas" name="id_kelas">
									<option value="">- Pilih -</option>
									@foreach($data_kelas as $kelas)
									<option value="{{ $kelas->id_kelas }}">
										{{ $kelas->nama_kelas }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat"> Alamat </label>
						<textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
					</div>
					<div class="form-group">
						<label for="gambar"> Gambar </label>
						<input type="file" class="form-control" id="gambar" name="gambar">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Kembali</button>
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<i class="fa fa-edit"></i> Edit Data Anggota
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="quickForm2" method="POST" action="{{ url('/page/admin/anggota/simpan') }}">
				{{ csrf_field() }}
				<div class="modal-body" id="modal-content-edit">
					
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Kembali</button>
					<button type="submit" class="btn btn-success btn-sm">
						<i class="fa fa-edit"></i> Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END -->

@endsection

@section("page_scripts")

<script type="text/javascript">
	function editAnggota(nim) {
		$.ajax({
			url : "{{ url('/page/admin/anggota/edit') }}",
			type : "GET",
			data : { nim : nim },
			success : function(data) {
				$("#modal-content-edit").html(data);
				return true;
			}
		});
	}
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/additional-methods.min.js"></script>

<script>
$(function () {
	$('#quickForm').validate({
    	rules: {
    		nim: {
        		required : true,
    		},
    		nama : {
    			required : true,
    		},
    		jenis_kelamin : {
    			required : true,
    		},
    		agama : {
    			required : true,
    		},
    		no_hp : {
    			required : true,
    		},
    		alamat : {
    			required : true,
    		},
    		id_kelas : {
    			required : true,
    		},
    		gambar : {
    			required : true,
    		},
  		},
    	messages: {
    		nim : {
        		required: "Kolom tidak boleh kosong",
      		},
      		nama : {
      			required : "Kolom tidak boleh kosong",
      		},
      		jenis_kelamin : {
      			required : "Kolom tidak boleh kosong",
      		},
      		agama : {
      			required : "Kolom tidak boleh kosong",
      		},
      		no_hp : {
      			required : "Kolom tidak boleh kosong",
      		},
      		alamat : {
      			required : "Kolom tidak boleh kosong",
      		},
      		id_kelas : {
      			required : "Kolom tidak boleh kosong",
      		},
      		gambar : {
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
	$('#quickForm2').validate({
    	rules: {
    		nim: {
        		required : true,
    		},
    		nama : {
    			required : true,
    		},
    		jenis_kelamin : {
    			required : true,
    		},
    		agama : {
    			required : true,
    		},
    		no_hp : {
    			required : true,
    		},
    		alamat : {
    			required : true,
    		},
    		id_kelas : {
    			required : true,
    		},
    		gambar : {
    			required : true,
    		}
  		},
    	messages: {
    		nim : {
        		required: "Kolom tidak boleh kosong",
      		},
      		nama : {
      			required : "Kolom tidak boleh kosong",
      		},
      		jenis_kelamin : {
      			required : "Kolom tidak boleh kosong",
      		},
      		agama : {
      			required : "Kolom tidak boleh kosong",
      		},
      		no_hp : {
      			required : "Kolom tidak boleh kosong",
      		},
      		alamat : {
      			required : "Kolom tidak boleh kosong",
      		},
      		id_kelas : {
      			required : "Kolom tidak boleh kosong",
      		},
      		gambar : {
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
	function hapus(nim)
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
					url : "{{ url('/page/admin/anggota/hapus') }}/" + nim,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), nim : nim },
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

@endsection