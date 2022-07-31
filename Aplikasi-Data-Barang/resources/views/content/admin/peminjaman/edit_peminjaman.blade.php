@extends("content.layouts.app")

@section("page_header", "Peminjaman")

@section("page_content")

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
				 <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eraser"></i> Update Peminjaman</h6>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/update_peminjaman') }}">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $edit->id }}">
					<div class="form-group">
						<label for="good_id"> Nama Barang </label>
						<select class="form-control" id="good_id" name="good_id">
							<option value="">- Pilih -</option>
							@foreach($data_barang as $barang)
								@if($edit->good_id == $barang->id)
									<option value="{{ $barang->id }}" selected>{{ $barang->name }}</option>
								@else
									<option value="{{ $barang->id }}">{{ $barang->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="employee_id"> Nama Karyawan </label>
						<select class="form-control" id="employee_id" name="employee_id">
							<option value="">- Pilih -</option>
							@foreach($data_karyawan as $karyawan)
								@if($edit->employee_id == $karyawan->id)
									<option value="{{ $karyawan->id }}" selected>{{ $karyawan->name }}</option>
								@else
									<option value="{{ $karyawan->id }}">{{ $karyawan->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="end"> Selesai </label>
						<input type="date" class="form-control" id="end" name="end" value="{{ $edit->end }}">
					</div>
					<div class="form-group">
						<label for="details"> Detail </label>
						<textarea class="form-control" id="details" name="details" placeholder="Detail">{{ $edit->details }}</textarea>
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
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-envelope"></i> Data Peminjaman</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Barang</th>
								<th class="text-center">Mulai</th>
								<th class="text-center">Selesai</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_peminjaman as $peminjaman)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $peminjaman->get_goods->name }}</td>
								<td class="text-center">{{ $peminjaman->start }}</td>
								<td class="text-center">{{ $peminjaman->end }}</td>
								<td class="text-center">
									<a href="{{ url('/admin/'.$peminjaman->id.'/edit_peminjaman') }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-eraser"></i> Edit </a>
									<a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="{{ url('/admin/'.$peminjaman->id.'/hapus_peminjaman') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
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