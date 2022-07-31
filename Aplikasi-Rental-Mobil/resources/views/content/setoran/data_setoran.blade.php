@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_setoran(id_setoran) {
		$.ajax({
			url : "{{ url('/edit_setoran') }}",
			type : "GET",
			data : { id_setoran : id_setoran  },
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
			<h4><i class="fa fa-money"></i> Data Setoran </h4>
			<section id="unseen">
				<table id="data" class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">No. Setoran</th>
							<th class="text-center">Tanggal Setoran</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Nama Sopir</th>
							@if(Auth::user()->role == 2)
							<th class="text-center">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_setoran as $setoran)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $setoran->no_setoran }}</td>
							<td class="text-center">{{ $setoran->tgl_setoran }}</td>
							<td class="text-center">Rp. {{ number_format($setoran->jumlah) }}</td>
							<td class="text-center">{{ $setoran->re_sopir->nama_sopir }}</td>
							@if(Auth::user()->role == 2)
							<td class="text-center">
								<button onclick="edit_setoran({{$setoran->id_setoran}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
									<i class="fa fa-pencil"></i> Update
								</button>
								<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/setoran/'.$setoran->id_setoran.'/delete') }}" class="btn btn-danger btn-sm">
									<i class="fa fa-trash-o"></i> Delete
								</a>
							</td>
							@endif
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
			<form method="POST" action="{{ url('/simpan_data_setoran') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> No. Setoran </label>
								<input type="number" class="form-control" name="no_setoran" placeholder="0">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tanggal Setoran </label>
								<input type="date" class="form-control" name="tgl_setoran" value="{{ date('Y-m-d') }}" readonly style="background-color: white;">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Jumlah </label>
								<input type="number" class="form-control" name="jumlah" placeholder="0" min="1000" max="20000">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Nama Sopir </label>
								<select class="form-control" name="id_sopir">
									<option value="" disabled selected>- Pilih -</option>
									@foreach($data_sopir as $sopir)
										@if($sopir->re_transaksi != NULL)
											<option value="{{ $sopir->id_sopir }}">
												{{ $sopir->nama_sopir }}
											</option>
										@endif
									@endforeach
								</select>
							</div>
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
			<form method="POST" action="{{ url('/update_data_setoran') }}">
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