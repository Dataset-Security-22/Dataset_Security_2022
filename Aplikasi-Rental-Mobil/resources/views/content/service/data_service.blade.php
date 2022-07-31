@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_service(id_service) {
		$.ajax({
			url : "{{ url('/edit_service') }}",
			type : "GET",
			data : { id_service : id_service  },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>

@endsection

@section("page_content")

<div class="row mt">
	<div class="col-md-12">
		<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Tambah
		</button>
		<br><br>
		<div class="content-panel">
			<h4><i class="fa fa-gavel"></i> Data Service </h4>
			<section id="unseen">
				<table id="data" class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Kode Service</th>
							<th class="text-center">Tanggal Service</th>
							<th class="text-center">Biaya Service</th>
							<th class="text-center">Jenis Service</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_service as $service)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $service->kode_service }}</td>
								<td class="text-center">{{ $service->tgl_service }}</td>
								<td class="text-center">Rp. {{ number_format($service->biaya_service) }}</td>
								<td class="text-center">{{ $service->re_jenis_service->nama_jenis_service }}</td>
								<td class="text-center">
									<button onclick="edit_service({{$service->id_service}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/service/'.$service->id_service.'/delete') }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</section>
		</div>
	</div>
</div>

<!-- Awal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/simpan_data_service') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label> Kode Service </label>
						<input type="text" class="form-control" name="kode_service" placeholder="Masukkan Kode Service">
					</div>
					<div class="form-group">
						<label> Tanggal Service </label>
						<input type="date" class="form-control" name="tgl_service" value="{{ date('Y-m-d') }}" readonly>
					</div>
					<div class="form-group">
						<label> Biaya Service </label>
						<input type="number" class="form-control" name="biaya_service" placeholder="0">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label> Nama Jenis Service </label>
							<select class="form-control" name="id_jenis_service">
								<option value="">- Pilih -</option>
								@foreach($data_jenis_service as $jenis_service)
									<option value="{{ $jenis_service->id_jenis_service }}">
										{{ $jenis_service->nama_jenis_service }}
									</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div> 
<!-- Akhir Modal -->

<!-- Awal Modal Update -->
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Update Data</h4>
			</div>
			<form method="POST" action="{{ url('/update_service') }}">
				{{ csrf_field() }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div> 
<!-- Akhir Modal -->

@endsection