@extends("content.page.layouts.template")

@section("page_title", "Detail Peminjaman")

@section("page_header") <i class="fa fa-search"></i> Detail Peminjaman @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Detail Data Peminjaman</li>
</ol>

@stop

@section("page_content")
<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Data Anggota</h3>
			</div>
			<div class="box-body">
				<table>
					<tr>
						<td><b>NIM</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_anggota->nim }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Nama</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_anggota->nama }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Jenis Kelamin</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							@if($detail->data_anggota->jenis_kelamin == "L")
							Laki - Laki
							@elseif($detail->data_anggota->jenis_kelamin == "P")
							Perempuan
							@else
							Tidak Jelas
							@endif
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>No. Telepon</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_anggota->no_hp }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Prodi</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_anggota->prodi->nama_prodi }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Registrasi</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_anggota->tgl_registrasi }}
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Data Peminjaman</h3>
			</div>
			<div class="box-body">
				<table>
					<tr>
						<td><b>Kode Buku</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_buku->kode }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Judul Buku</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->data_buku->judul }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Pinjam</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->tgl_pinjam }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Kembali</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->tgl_kembali }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Tanggal Mengembalikan</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							@if($detail->tgl_mengembalikan == "")
							<b>Sedang Tahap Peminjaman</b>
							@else
							{{ $detail->tgl_mengembalikan }}
							@endif
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><b>Denda</b></td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							Rp. {{ number_format($detail->denda) }}
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="{{ url('/pinjam') }}" class="btn btn-danger btn-sm">
			<i class="fa fa-refresh"></i> Kembali
		</a>
	</div>
</div>
@endsection