@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_merk(kode_merk) {
		$.ajax({
			url : "{{ url('/edit_merk') }}",
			type : "GET",
			data : { kode_merk : kode_merk  },
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
			<h4><i class="fa fa-image"></i> Data Merk</h4>
			<section id="unseen">
				<div class="table-responsive">
					<table id="data" class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Kode Merk</th>
								<th class="text-center">Nama Merk</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_merk as $merk)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $merk->kode_merk }}</td>
								<td class="text-center">{{ $merk->nama_merk }}</td>
								<td class="text-center">
									@if(count($merk->re_type) > 0)
									<button disabled onclick="edit_merk({{$merk->kode_merk}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<button disabled class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete
									</button>
									@else
									<button onclick="edit_merk({{$merk->kode_merk}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/merk/'.$merk->kode_merk.'/delete') }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete 
									</a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
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
			<form method="POST" action="{{ url('/simpan_data_merk') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group">
						<label> Kode Merk </label>
						<input type="text" class="form-control" name="kode_merk" placeholder="Masukkan Kode Merk">
					</div>
					<div class="form-group">
						<label> Nama Merk </label>
						<input type="text" class="form-control" name="nama_merk" placeholder="Masukkan Nama Merk">
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
			<form method="POST" action="{{ url('/update_data_merk') }}">
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