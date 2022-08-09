@extends("content.page.layouts.template")

@section("page_title", "Peminjaman")

@section("page_header") <i class="fa fa-gavel"></i> Peminjaman @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Peminjaman</li>
</ol>

@stop

@section("page_scripts")

<script type="text/javascript">
	function edit_peminjaman(id) {
		$.ajax({
			url : "{{ url('/edit_peminjaman') }}",
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

@if(session("error"))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Gagal!</strong> {{ session("error") }}.
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
			<div class="box-header with-border">
				@if(Auth::user()->level == 1)
				<h3 class="box-title">Data Peminjaman</h3>
				@else
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data </button>
				@endif
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Kode Buku</th>
							<th>Judul Buku</th>
							<th>Nama Peminjam</th>
							<th class="text-center">Tanggal Pinjam</th>
							<th class="text-center">Tanggal Kembali</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_peminjaman as $pinjam)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pinjam->data_buku->kode }}</td>
							<td>{{ $pinjam->data_buku->judul }}</td>
							<td>{{ $pinjam->data_anggota->nama }}</td>
							<td class="text-center">{{ $pinjam->tgl_pinjam }}</td>
							<td class="text-center">{{ $pinjam->tgl_kembali }}</td>
							<td class="text-center">
								@if($pinjam->tgl_mengembalikan != NULL)
								<a href="{{ url('/detail_peminjaman/'.$pinjam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail </a>
								@if(Auth::user()->level == 1)
								<a onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" href="{{ url('/hapus_peminjaman/'.$pinjam->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus </a>
								@endif
								@else
									@if(Auth::user()->level == 1)
									<a href="{{ url('/detail_peminjaman/'.$pinjam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail </a>
									@else
									<a href="{{ url('/detail_peminjaman/'.$pinjam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail </a>
									<button onclick="edit_peminjaman({{$pinjam->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update"><i class="fa fa-pencil"></i> Edit </button>
									<a onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" href="{{ url('/hapus_peminjaman/'.$pinjam->id) }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o"></i> Hapus
									</a>
									@endif
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
			<strong>Note :</strong> 
			<br>
			- <b>Admin</b> dapat melihat <b>Data Peminjaman dan Detail Peminjaman</b>.
			<br>
			- <b>Admin</b> juga dapat menghapus data peminjaman buku apabila, anggota tersebut sudah mengembalikannya. Jika , anggota tersebut belum mengembalikannya, maka <b>Admin</b> hanya dapat melihat detail peminjaman buku saja.
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-pencil"></i> Note </h3>
			</div>
			<div class="box-body">
				<table>
					<tr>
						<td>-</td>
						<td style="padding-left: 5px;">
							Apabila anggota ingin meminjam buku kembali, harus mengembalikan buku yang di pinjam terlebih dahulu.
						</td>
					</tr>
					<tr>
						<td>-</td>
						<td style="padding-left: 5px;">
							Data peminjaman buku yang sudah di kembalikan tidak bisa di <b><i>update</i></b>
						</td>
					</tr>
					<tr>
						<td>-</td>
						<td style="padding-left: 5px;">
							Apabila buku yang ingin di pinjam tidak ada, maka <b><i>stock</i></b> buku tersebut sudah habis.
						</td>
					</tr>
					<tr>
						<td>-</td>
						<td style="padding-left: 5px;">
							Data peminjaman buku yang belum di kembalikan, maka data tersebut bisa di <b><i>update</i></b>.
						</td>
					</tr>
					<tr>
						<td>-</td>
						<td style="padding-left: 5px;">
							Apabila anggota, tidak jadi meminjam buku. Maka, data peminjaman tersebut bisa di <b><i>delete</i></b>.
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endif
<!-- Awal Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="{{ url('/pinjam') }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Nama Anggota </label>
								<select class="form-control" name="id_anggota">
									<option value="">- Pilih -</option>
									@foreach($data_anggota as $anggota)
									<?php
									$pinjam = DB::table("pinjam")
									->where("tgl_mengembalikan",NULL)
									->where("id_anggota", $anggota->id)
									->first();
									?>
									@if($pinjam == "")
									<option value="{{ $anggota->id }}">
										{{ $anggota->nama }}
									</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Kode Buku </label>
								<select class="form-control" name="kode_buku">
									<option value="">- Pilih -</option>
									@foreach($data_buku as $buku)
									<?php
									$pinjam = DB::table("pinjam")
									->where("tgl_mengembalikan",NULL)
									->where("kode_buku", $buku->kode)
									->count();

									$total_stok = $buku->stok_buku - $pinjam;
									?>

									@if($total_stok > 0)
									<option value="{{ $buku->kode }}">
										{{ $buku->kode }} - {{ $buku->judul }}
									</option>
									@endif

									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Tanggal Pinjam </label>
								<?php
								$tanggal = date("Y-m-d");
								?>
								<input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $tanggal; ?>" readonly style="background-color: white;">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"> Tanggal Kembali </label>
								<input type="date" class="form-control" name="tgl_kembali">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Awal Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Update Data</h4>
			</div>
			<form method="POST" action="{{ url('/update_data_peminjaman') }}">
				{{ csrf_field() }}
				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

@endsection