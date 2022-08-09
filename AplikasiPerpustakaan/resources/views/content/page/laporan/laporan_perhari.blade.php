@extends("content.page.layouts.template")

@section("page_title", "Laporan Perhari")

@section("page_header")

<i class="fa fa-area-chart"></i> Data Laporan <b>Tanggal : {{ date("Y-m-d") }}</b>

@stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Data Laporan Perhari</li>
</ol>

@stop

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Laporan Peminjaman Buku Perhari</h3>
				<div class="pull-right">
					@if(Auth::user()->level == 1)
					<a href="{{ url('/laporan') }}" class="btn btn-danger btn-sm">
						<i class="fa fa-refresh"></i> Kembali
					</a>
					@endif
				</div>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">NIM</th>
							<th>Nama</th>
							<th class="text-center">Prodi</th>
							<th class="text-center">Kode</th>
							<th>Judul</th>
							<th class="text-center">Tanggal Pinjam</th>
							<th class="text-center">Tanggal Kembali</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0 @endphp

						@foreach($data_peminjaman as $pinjam)
						<tr>
							<td class="text-center">{{ ++$no }}.</td>
							<td class="text-center">{{ $pinjam->data_anggota->nim }}</td>
							<td>{{ $pinjam->data_anggota->nama }}</td>
							<td class="text-center">{{ $pinjam->data_anggota->prodi->nama_prodi }}</td>
							<td class="text-center">{{ $pinjam->data_buku->kode }}</td>
							<td>{{ $pinjam->data_buku->judul }}</td>
							<td class="text-center">{{ $pinjam->tgl_pinjam }}</td>
							<td class="text-center">{{ $pinjam->tgl_kembali }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection