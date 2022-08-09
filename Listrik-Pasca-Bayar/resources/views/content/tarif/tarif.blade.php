@extends("content.layouts.app")

@section("page_header") <i class="fa fa-fax"></i> Tarif @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"> Dashboard</a></li>
	<li class="active">Tarif</li>
</ol>

@endsection

@section("page_scripts")
<script type="text/javascript">
	function edit_tarif(id) {
		$.ajax({
			url : "{{ url('/tarif/edit') }}",
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
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Berhasil!</h4>
			{{ session("sukses") }}
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
			{{ session("error") }}
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
			<div class="box-header">
				@if(Auth::user()->role == 1)
				<h3 class="box-title"> Data Tarif </h3>
				@else
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus"></i> Tambah Data
				</button>
				@endif
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Kode Tarif</th>
							<th class="text-center">Golongan</th>
							<th class="text-center">Daya</th>
							<th class="text-center">Tarif PerKwh</th>
							@if(Auth::user()->role == 1)

							@else
							<th class="text-center">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_tarif as $tarif)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $tarif->kode_tarif }}</td>
							<td class="text-center">{{ $tarif->golongan }}</td>
							<td class="text-center">{{ $tarif->daya }}</td>
							<td class="text-center">Rp. {{ number_format($tarif->tarif_perkwh) }}</td>
							@if(Auth::user()->role == 1)

							@else
							<td class="text-center">
								@if(count($tarif->lpb_pelanggan) > 0)
								<button disabled class="btn btn-warning btn-sm">
									<i class="fa fa-pencil"></i> Edit
								</button>
								<button disabled class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
								</button>
								@else
								<button onclick="edit_tarif({{$tarif->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
									<i class="fa fa-pencil"></i> Edit
								</button>
								<a onclick="return confirm('Yakin ? Mau di Hapus ?')" href="{{ url('/tarif/'.$tarif->id.'/hapus') }}" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus 
								</a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/tarif') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kode_tarif">Kode Tarif</label>
								<?php
								$kode = DB::table("tarif")
								->count();

								$no = $kode + 1;
								$kode_unik = "KT - ".$no;
								?>
								<input type="text" class="form-control" id="kode_tarif" name="kode_tarif" value="{{ $kode_unik }}" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="golongan">Golongan</label>
								<input type="text" class="form-control" id="golongan" name="golongan" placeholder="Masukkan Golongan" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="daya">Daya</label>
								<input type="text" class="form-control" id="daya" name="daya" placeholder="Masukkan Daya" autocomplete="off">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tarif_perkwh">Tarif PerKwh</label>
								<input type="number" class="form-control" id="tarif_perkwh" name="tarif_perkwh" placeholder="0" autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Data </h4>
			</div>
			<form method="POST" action="{{ url('/tarif') }}">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection