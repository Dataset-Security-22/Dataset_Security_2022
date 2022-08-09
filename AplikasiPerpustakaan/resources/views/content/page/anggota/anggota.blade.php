@extends("content.page.layouts.template")

@section("page_title", "Anggota")

@section("page_header") <i class="fa fa-user"></i> Anggota @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Anggota</li>
</ol>

@stop

@section("page_scripts")

<script type="text/javascript">
	function edit_anggota(id) {
		$.ajax({
			url : "{{ url('/edit_anggota') }}",
			type : "GET",
			data : { id : id },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>

@endsection

@section("page_title", "Data Anggota")

@section("page_content")

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Berhasil!</strong> {{ session("sukses") }}.
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Gagal!</strong> {{ session("error") }}.
		</div>
	</div>
</div>
@endif

@if(session("warning"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Perhatian!</strong> {{ session("warning") }}.
		</div>
	</div>
</div>
@endif

@if(count($errors) > 0)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>
					{{ $error }}
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				@if(Auth::user()->level == 1)
				<h3 class="box-title">Data Anggota</h3>
				@else
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data </button>
				@endif
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">NIM</th>
							<th>Nama</th>
							<th class="text-center">Prodi</th>
							<th class="text-center">No. HP</th>
							<th class="text-center">Tgl Registrasi</th>
							@if(Auth::user()->level == 1)

							@else
							<th class="text-center">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_anggota as $anggota)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $anggota->nim }}</td>
							<td>{{ $anggota->nama }}</td>
							<td class="text-center">{{ $anggota->prodi->nama_prodi }}</td>
							<td class="text-center">{{ $anggota->no_hp }}</td>
							<td class="text-center">{{ $anggota->tgl_registrasi }}</td>
							@if(Auth::user()->level == 1)

							@else
							<td class="text-center">
								@if(count($anggota->pinjam) > 0)
								<button disabled type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-pencil"></i> Edit </button>
								<button disabled class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
								</button>
								@else
								<button onclick="edit_anggota({{$anggota->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update"><i class="fa fa-pencil"></i> Edit </button>
								<a onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" href="{{ url('/hapus_anggota/'.$anggota->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus </a>
								@endif
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@if(Auth::user()->level == 1)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<strong>Note :</strong> <b>Admin</b> hanya dapat melihat <b>Data Anggota</b> saja.
		</div>
	</div>
</div>
@endif

<!-- Awal Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/anggota') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="nim"> NIM </label>
								<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="nama"> Nama </label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="jenis_kelamin"> Jenis Kelamin </label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin"> 
									<option value="" disabled selected>- Pilih -</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="no_hp"> No. HP </label>
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="prodi"> Prodi </label>
								<select class="form-control" id="prodi" name="id_prodi">
									<option value="" disabled selected>- Pilih -</option>
									@foreach($data_prodi as $prodi)
										<option value="{{ $prodi->id }}">
											{{ $prodi->nama_prodi }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Awal Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Update Data</h4>
			</div>
			<form method="POST" action="{{ url('/anggota') }}">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection