@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_pemilik(id_pemilik) {
		$.ajax({
			url : "{{ url('/edit_pemilik') }}",
			type : "GET",
			data : { id_pemilik : id_pemilik  },
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
		@if(Auth::user()->role == 2)
		<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Tambah
		</button>
		@endif
		<br><br>
		<div class="content-panel">
			<h4><i class="fa fa-user"></i> Data Pemilik</h4>
			<section id="unseen">
				<div class="table-responsive">
					<table id="data" class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Kode Pemilik</th>
								<th>Nama Pemilik</th>
								<th>Alamat</th>
								<th class="text-center">Telepon Pemilik</th>
								@if(Auth::user()->role == 2)
								<th class="text-center">Aksi</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_pemilik as $pemilik)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $pemilik->kode_pemilik }}</td>
								<td>{{ $pemilik->nama_pemilik }}</td>
								<td>{{ $pemilik->alamat_pemilik }}</td>
								<td class="text-center">{{ $pemilik->telp_pemilik }}</td>
								@if(Auth::user()->role == 2)
								<td class="text-center">
									@if(count($pemilik->re_kendaraan) > 0)
									<button disabled onclick="edit_pemilik({{$pemilik->id_pemilik}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<button disabled class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete
									</button>
									@else
									<button onclick="edit_pemilik({{$pemilik->id_pemilik}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
									</button>
									<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/pemilik/'.$pemilik->id_pemilik.'/delete') }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Delete
									</a>
									@endif
								</td>
								@endif
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
			<form method="POST" action="{{ url('/simpan_data_pemilik') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Kode Pemilik </label>
								<input type="text" class="form-control" name="kode_pemilik" placeholder="Masukkan Kode Pemilik">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Telepon Pemilik </label>
								<input type="text" class="form-control" name="telp_pemilik" placeholder="Masukkan Telepon Pemilik">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Nama Pemilik </label>
						<input type="text" class="form-control" name="nama_pemilik" placeholder="Masukkan Nama Pemilik">
					</div>
					<div class="form-group">
						<label> Alamat Pemilik </label>
						<textarea class="form-control" name="alamat_pemilik" rows="5" placeholder="Masukkan Alamat Pemilik"></textarea>
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
			<form method="POST" action="{{ url('/update_data_pemilik') }}">
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