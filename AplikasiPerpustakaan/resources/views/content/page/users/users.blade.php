@extends("content.page.layouts.template")

@section("page_title", "Users")

@section("page_header") <i class="fa fa-users"></i> Users @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Users</li>
</ol>

@endsection

@section("page_scripts")

<script type="text/javascript">
	function ganti_password(id) {
		$.ajax({
			url : "{{ url('/ganti_password') }}",
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

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data </button>

<br><br>
<div class="row">
	@foreach($data_user as $user)
	<div class="col-md-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-pencil"></i> Data Users <b>{{ $user->name }}</b> </h3>
			</div>
			<form method="POST" action="{{ url('/users') }}">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<input type="hidden" name="id" value="{{ $user->id }}">
				<div class="box-body">
					<div class="form-group">
						<label class="control-label"> Name </label>
						<input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label class="control-label"> E-mail </label>
						<input type="email" class="form-control" name="email" placeholder="Masukkan E-mail" value="{{ $user->email }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button onclick="ganti_password({{$user->id}})" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-ganti-password"><i class="fa fa-pencil"></i> Ganti Password </button>
						<a href="{{ url('/hapus_data_users/'.$user->id) }}" class="btn btn-danger btn-sm">
							<i class="fa fa-trash-o"></i> Delete
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
</div>

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
			<form method="POST" action="{{ url('/users') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label"> Name </label>
						<input type="text" class="form-control" name="name" placeholder="Masukkan Nama" autocomplete="off">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> E-mail </label>
								<input type="email" class="form-control" name="email" placeholder="Masukkan E-mail" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Password </label>
								<input type="password" class="form-control" name="password" placeholder="Masukkan Password" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label"> Level </label>
						<select class="form-control" name="level">
							<option value="">- Pilih -</option>
							<option value="1">Admin</option>
							<option value="2">Petugas</option>
						</select>
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

<!-- Awal Modal Ganti Password -->
<div class="modal fade" id="modal-ganti-password">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Ganti Password </h4>
			</div>
			<form method="POST" action="{{ url('/put_password') }}">
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