@extends("content.layouts.app")

@section("page_header", "Update Data Karyawan")

@section("page_scripts")

<script type="text/javascript">
	function ajax_employee(id) {
		$.ajax({
			url : "{{ url('/admin/ajax_employee') }}",
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

<div class="row">
	<div class="col-md-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Update Data Karyawan</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/update_karyawan') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label for="name"> Nama Karyawan </label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Karyawan" value="{{ $edit->name }}">
					</div>
					<div class="form-group">
						<label for="phone"> No. Handphone </label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="No. Handphone" value="{{ $edit->phone }}">
					</div>
					<div class="form-group">
						<label for="address"> Alamat </label>
						<textarea class="form-control" id="address" name="address" placeholder="Masukkan Alamat">{{ $edit->address }}</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-save"></i> Simpan </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-users"></i> Data Karyawan </h6>
			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th> Nama Karyawan </th>
								<th class="text-center"> No. HP </th>
								<th class="text-center"> Aksi </th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_karyawan as $karyawan)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $karyawan->name }}</td>
								<td class="text-center">{{ $karyawan->phone }}</td>
								<td class="text-center">
									@if(count($karyawan->get_peminjaman) > 0)
									<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDataKaryawan" onclick="ajax_employee({{$karyawan->id}})" disabled>
										<i class="fas fa-fw fa-eraser"></i> Edit
									</button>
									<button type="button" class="btn btn-danger btn-sm" disabled><i class="fas fa-fw fa-trash"></i> Delete </button>
									@else
									<a href="{{ url('/admin/'.$karyawan->id.'/edit_karyawan') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
									<a href="{{ url('/admin/'.$karyawan->id.'/hapus_karyawan') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Delete </a>
									@endif

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