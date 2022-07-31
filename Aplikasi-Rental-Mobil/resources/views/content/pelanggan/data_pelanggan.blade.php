@extends("content.layouts.app")

@section("page_scripts")

<script type="text/javascript">
	function edit_pelanggan(id) {
		$.ajax({
			url : "{{ url('/edit_pelanggan') }}",
			type : "GET",
			data : { id : id  },
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
		<br><br>
		<div class="content-panel">
			<h4><i class="fa fa-user"></i> Data Pelanggan</h4>
			<section id="unseen">
				<table id="data" class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">No. KTP</th>
							<th>Nama Pelanggan</th>
							<th>Alamat</th>
							<th class="text-center">No. HP</th>
							@if(Auth::user()->role == 2)
							<th class="text-center">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_pelanggan as $pelanggan)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pelanggan->no_ktp }}</td>
							<td>{{ $pelanggan->nama_pel }}</td>
							<td>{{ $pelanggan->alamat_pel }}</td>
							<td class="text-center">{{ $pelanggan->telp_pel }}</td>
							@if(Auth::user()->role == 2)
							<td class="text-center">
								<button onclick="edit_pelanggan({{$pelanggan->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalUpdate">
									<i class="fa fa-pencil"></i> Update
								</button>
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
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<form method="POST" action="{{ url('/update_data_pelanggan') }}">
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