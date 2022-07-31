@extends("page.layouts.template")

@section("page_title", "Data Angkatan")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">Angkatan</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">Data Angkatan</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<form id="quickForm" method="POST" action="{{ url('/page/admin/angkatan/tambah') }}">
				{{ csrf_field() }}
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-plus"></i> Tambah Angkatan
						</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="tahun_angkatan"> Tahun Angkatan </label>
							<input type="year" class="form-control" id="tahun_angkatan" name="tahun_angkatan" placeholder="Masukkan Tahun Angkatan">
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
						Data Angkatan
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Tahun Angkatan</th>
								<th class="text-center">Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_angkatan as $angkatan)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $angkatan->tahun_angkatan }}</td>
								<td class="text-center">
									@if($angkatan->status == "1")
									<form method="POST" action="{{ url('/page/admin/angkatan/non_aktifkan') }}">
										@csrf
										<input type="hidden" name="id_angkatan" value="{{ $angkatan->id_angkatan }}">
										<button type="submit" class="btn btn-danger btn-sm">
											Non - Aktifkan
										</button>
									</form>
									@elseif($angkatan->status == "0")
									<form method="POST" action="{{ url('/page/admin/angkatan/aktifkan') }}">
										@csrf
										<input type="hidden" name="id_angkatan" value="{{ $angkatan->id_angkatan }}">
										<button type="submit" class="btn btn-success btn-sm">
											Aktifkan
										</button>
									</form>
									@else
									
									@endif
								</td>
								<td class="text-center">
									<a href="{{ url('/page/admin/angkatan/edit') }}/{{ $angkatan->id_angkatan }}" class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i> Edit
									</a>
									<form onsubmit="return false" id="form" class="d-inline">
										{{ csrf_field() }}
										<button id="btn-hapus" class="btn btn-danger btn-sm" onclick="hapus({{$angkatan->id_angkatan}})">
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
	function hapus(id_angkatan)
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
					url : "{{ url('/page/admin/angkatan/hapus') }}/" + id_angkatan,
					type : "POST",
					data : { _method : 'delete', _token : $('input[name="_token"]').val(), id_angkatan : id_angkatan },
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