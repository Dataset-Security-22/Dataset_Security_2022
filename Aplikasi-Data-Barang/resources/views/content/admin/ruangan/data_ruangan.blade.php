@extends("content.layouts.app")

@section("page_header", "Ruangan")

@section("page_scripts")

<script type="text/javascript">
	function ajax_edit_ruangan(id) {
		$.ajax({
			url : "{{ url('/admin/ajax_edit_ruangan') }}",
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

@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{ $error }}
		</li>
		@endforeach
	</ul>
</div>
@endif

@if(session("sukses"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissable fade-show">
			{{ session("sukses") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissable fade-show">
			{{ session("error") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>
@endif

<div class="modal fade" id="editDataRuangan" tabindex="-1" role="dialog" aria-labelledby="editDataRuanganLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editDataRuanganLabel"><i class="fas fa-fw fa-eraser"></i> Update Data Ruangan </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-content">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-fw fa-eraser"></i> Kembali</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahDataRuangan" tabindex="-1" role="dialog" aria-labelledby="tambahDataRuanganLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahDataRuanganLabel"><i class="fas fa-fw fa-plus"></i> Tambah Data Ruangan </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-content">
				<form method="POST" action="{{ url('/admin/tambah_ruangan') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="land_id"> Nama Tanah </label>
								<select class="form-control" id="land_id" name="land_id">
									<option value="">- Pilih -</option>
									@foreach($data_tanah as $tanah)
									<option value="{{ $tanah->id }}">{{ $tanah->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="name"> Nama Ruangan </label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Ruangan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="length"> Panjang Ruangan </label>
								<input type="text" class="form-control" id="length" name="length" placeholder="Panjang Ruangan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="width"> Ukuran Ruangan </label>
								<input type="text" class="form-control" id="width" name="width" placeholder="Ukuran">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="height"> Tinggi Ruangan </label>
								<input type="text" class="form-control" id="height" name="height" placeholder="Tinggi">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="condition"> Kondisi </label>
								<input type="text" class="form-control" id="condition" name="condition" placeholder="Kondisi">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="details"> Detail Ruangan </label>
								<textarea class="form-control" id="details" name="details" placeholder="Detail"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-fw fa-plus"></i> Tambah </button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-fw fa-eraser"></i> Kembali</button>
			</div>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataRuangan">
			<i class="fas fa-fw fa-plus"></i> Tambah Data 
		</button>
	</div>
	<div class="card-body">
		<div class="table table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th>Nama Tanah</th>
						<th>Nama Ruangan</th>
						<th class="text-center">Panjang</th>
						<th class="text-center">Ukuran</th>
						<th class="text-center">Lebar</th>
						<th class="text-center">Kondisi</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_ruangan as $ruangan)
					<tr>
						<td class="text-center">{{ ++$no }}.</td>
						<td>{{ $ruangan->get_lands->name }}</td>
						<td>{{ $ruangan->name }}</td>
						<td class="text-center">{{ $ruangan->length }}</td>
						<td class="text-center">{{ $ruangan->width }}</td>
						<td class="text-center">{{ $ruangan->height }}</td>
						<td class="text-center">{{ $ruangan->condition }}</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDataRuangan" onclick="ajax_edit_ruangan({{$ruangan->id}})">
								<i class="fas fa-fw fa-eraser"></i> Update 
							</button>
							<a href="{{ url('/admin/'.$ruangan->id.'/hapus_ruangan') }}" onclick="return confirm('Yakin ? Ingin menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Delete </a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection