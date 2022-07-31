@extends("content.layouts.app")

@section("page_header", "Stok")

@section("page_scripts")

<script type="text/javascript">
	function ajax_edit_stok(id) {
		$.ajax({
			url: "{{ url('/admin/ajax_edit_stok') }}",
			type: "GET",
			data: { id : id },
			success : function (data) {
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
		</div>
	</div>
</div>
@endif

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissable fade-show">
			{{ session("error") }}
		</div>
	</div>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="edit_stok" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editCategoryModalLabel"><i class="fas fa-fw fa-eraser"></i> Update Data Stok</h5>
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

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-bars"></i> Data Stok</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th>Nama Barang</th>
						<th class="text-center">Tipe</th>
						<th class="text-center">Stok</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 0 @endphp

					@foreach($data_stok as $stok)
					<tr>
						<td class="text-center">{{ ++$no }}.</td>
						<td>{{ $stok->get_goods->name }}</td>
						<td class="text-center">
							@if($stok->type == "1")
								Barang Masuk
							@else
								Barang Keluar
							@endif
						</td>
						<td class="text-center">{{ $stok->quantity }}</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_stok" onclick="ajax_edit_stok({{$stok->id}})">
								<i class="fas fa-fw fa-eraser"></i> Edit
							</button>
							<a onclick="return confirm('Yakin ? Ingin menghapus data ini ?')" href="{{ url('/admin/'.$stok->id.'/hapus_stok') }}" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus </a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection