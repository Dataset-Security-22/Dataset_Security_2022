@extends("content.page.layouts.template")

@section("page_title", "Pengembalian")

@section("page_header") <i class="fa fa-sign-out"></i> Pengembalian @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Pengembalian</li>
</ol>

@stop

@section("page_scripts")

<script type="text/javascript">
	function detail_pengembalian(id) {
		$.ajax({
			url : "{{ url('/detail_pengembalian') }}",
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
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Berhasil!</strong> {{ session("sukses") }}.
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Data Pengembalian Buku</h3>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Nama Peminjam</th>
							<th class="text-center">Kode Buku</th>
							<th class="text-center">Tanggal Pinjam</th>
							<th class="text-center">Tanggal Mengembalikan</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_peminjaman as $pinjam)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td>{{ $pinjam->data_anggota->nama }}</td>
							<td class="text-center">{{ $pinjam->data_buku->kode }}</td>
							<td class="text-center">{{ $pinjam->tgl_pinjam }}</td>
							<td class="text-center">{{ $pinjam->tgl_kembali }}</td>
							<td class="text-center">
								@if(Auth::user()->level == 1)
								<button onclick="detail_pengembalian({{$pinjam->id}})" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-detail"><i class="fa fa-search"></i> Detail </button>
								@else
									@if($pinjam->tgl_mengembalikan == "")
										<a href="{{ url('/pengembalian_buku/'.$pinjam->id) }}" class="btn btn-info btn-sm">
											<i class="fa fa-sign-in"></i> Pengembalian
										</a>
									@endif
									<button onclick="detail_pengembalian({{$pinjam->id}})" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-detail"><i class="fa fa-search"></i> Detail </button>
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

@if(Auth::user()->level == 1)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<strong>Note :</strong> <b>Admin</b> hanya dapat melihat <b>Detail Pengembalian Buku</b> saja.
		</div>
	</div>
</div>
@endif

<!-- Awal Modal Detail -->
<div class="modal fade" id="modal-default-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Detail Pengembalian Buku </h4>
			</div>
			<form>
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fa fa-sign-out"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection