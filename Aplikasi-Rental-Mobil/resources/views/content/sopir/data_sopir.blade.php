@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_sopir(id_sopir) {
		$.ajax({
			url : "{{ url('/edit_sopir') }}",
			type : "GET",
			data : { id_sopir : id_sopir  },
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
			<h4><i class="fa fa-users"></i> Data Sopir</h4>
			<section id="unseen">
				<div class="table-responsive">
					<table id="data" class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">ID Sopir</th>
								<th>Nama Sopir</th>
								<th class="text-center">Telepon Sopir</th>
								<th class="text-center">No. SIM</th>
								<th class="text-center">Tarif Per/Jam</th>
								<th class="text-center">Status</th>
								@if(Auth::user()->role == 2)
								<th class="text-center">Aksi</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp

							@foreach($data_sopir as $sopir)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td class="text-center">{{ $sopir->id_sopir }}</td>
								<td>{{ $sopir->nama_sopir }}</td>
								<td class="text-center">{{ $sopir->telp_sopir }}</td>
								<td class="text-center">{{ $sopir->no_sim }}</td>
								<td class="text-center">Rp. {{ number_format($sopir->tarif_perjam) }}</td>
								<td class="text-center">
									@if($sopir->aktif == 0)
									Tidak Aktif
									@else
									Aktif
									@endif
								</td>
								@if(Auth::user()->role == 2)
								<td class="text-center">
									@if($sopir->re_transaksi == NULL)
										@if(count($sopir->re_setoran) > 0)
										<button disabled class="btn btn-warning btn-sm">
										<i class="fa fa-pencil"></i> Update
										</button>
										<button disabled class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Delete
										</button>
										@else
										<button disabled class="btn btn-warning btn-sm">
										<i class="fa fa-pencil"></i> Update
										</button>
										<button disabled class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Delete
										</button>
										@endif	
									@else
										@if(count($sopir->re_setoran) > 0)
										<button disabled class="btn btn-warning btn-sm">
										<i class="fa fa-pencil"></i> Update
										</button>
										<button disabled class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Delete
										</button>
										@else
										<button onclick="edit_sopir({{$sopir->id_sopir}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
										<i class="fa fa-pencil"></i> Update
										</button>
										<a onclick="return confirm('Mau di Hapus ?')" href="{{ url('/sopir/'.$sopir->id_sopir.'/delete') }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i> Delete
										</a>
										@endif
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
			<form method="POST" action="{{ url('/simpan_data_sopir') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> ID Sopir </label>
								<input type="text" class="form-control" name="id_sopir" placeholder="Masukkan ID Sopir">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tarif Per/Jam </label>
								<input type="text" class="form-control" name="tarif_perjam" placeholder="Tarif Per/Jam">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Nama Sopir </label>
						<input type="text" class="form-control" name="nama_sopir" placeholder="Masukkan Nama Sopir">
					</div>
					<div class="form-group">
						<label> Alamat Sopir </label>
						<textarea class="form-control" name="alamat_sopir" rows="5" placeholder="Masukkan Alamat Sopir"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Telepon Sopir </label>
								<input type="text" class="form-control" name="telp_sopir" placeholder="Masukkan No. Telepon Sopir">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> No. SIM </label>
								<input type="text" class="form-control" name="no_sim" placeholder="Masukkan No. SIM">
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
			<form method="POST" action="{{ url('/update_data_sopir') }}">
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