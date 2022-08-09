@extends("content.page.layouts.template")

@section("page_title", "Pengembalian Buku")

@section("page_header") <i class="fa fa-sign-out"></i> Pengembalian Buku @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Pengembalian Buku</li>
</ol>

@stop

@section("page_content")

<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user"></i> Data Anggota </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="nim"> NIM </label>
							<input type="text" class="form-control" id="nim" name="nim" value="{{ $detail->data_anggota->nim }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="tgl_registrasi"> Tanggal Registrasi </label>
							<input type="text" class="form-control" id="tgl_registrasi" value="{{ $detail->data_anggota->tgl_registrasi }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama"> Nama </label>
					<input type="text" class="form-control" id="nama" name="nama" value="{{ $detail->data_anggota->nama }}" readonly style="background-color: white;">
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="jenis_kelamin"> JK</label>
							<?php
							if ($detail->data_anggota->jenis_kelamin == "L") {
								$data = "Laki - Laki";
							} else {
								$data = "Perempuan";
							}
							?>
							<input type="text" class="form-control" id="jenis_kelamin" value="{{ $data }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="no_hp"> No. HP </label>
							<input type="text" class="form-control" id="no_hp" value="{{ $detail->data_anggota->no_hp }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="prodi"> Prodi </label>
							<input type="text" class="form-control" id="prodi" value="{{ $detail->data_anggota->prodi->nama_prodi }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> Data Buku </h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="kode"> Kode Buku</label>
							<input type="text" class="form-control" id="kode" value="{{ $detail->data_buku->kode }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="kategori"> Kategori </label>
							<input type="text" class="form-control" id="kategori" value="{{ $detail->data_buku->data_kategori->nama_kategori }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="tahun"> Tahun </label>
							<input type="text" class="form-control" id="tahun" value="{{ $detail->data_buku->tahun }}" readonly style="background-color: white;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="judul"> Judul Buku </label>
					<input type="text" class="form-control" id="judul" value="{{ $detail->data_buku->judul }}" readonly style="background-color: white;">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="penerbit"> Penerbit </label>
							<input type="text" class="form-control" id="penerbit" value="{{ $detail->data_buku->penerbit }}" readonly style="background-color: white;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="pengarang"> Pengarang </label>
							<input type="text" class="form-control" id="pengarang" value="{{ $detail->data_buku->pengarang }}" style="background-color: white;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-sign-in"></i> Peminjaman</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ url('/pengembalian_buku') }}">
					{{ csrf_field() }}
					{{ method_field("PUT") }}
					<input type="hidden" name="id" value="{{ $detail->id }}">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="tgl_pinjam"> Tanggal Pinjam </label>
								<input type="text" class="form-control" id="tgl_pinjam" value="{{ $detail->tgl_pinjam }}">
							</div>
							<div class="form-group">
								<label class="control-label" for="tgl_kembali"> Tanggal Kembali </label>
								<input type="text" class="form-control" id="tgl_kembali" value="{{ $detail->tgl_kembali }}">
							</div>
						</div>
						<div class="col-md-6">
							<?php
							$date = date("Y-m-d");
							$awal = strtotime($detail->tgl_pinjam);
							$kembali = strtotime($date);
							$diff = $kembali - $awal;
							$hari = floor($diff / 864 / 100);
							$denda = 5000 * $hari;
							?>
							<div class="form-group">
								<label class="control-label" for="tgl_mengembalikan"> Tanggal Mengembalikan </label>
								<input type="text" class="form-control" id="tgl_mengembalikan" name="tgl_mengembalikan" value="{{ date('Y-m-d') }}" readonly style="background-color: white;">
							</div>
							<div class="form-group">
								<label class="control-label" for="denda"> Denda </label>
								<input type="text" class="form-control" id="denda" name="denda" value="{{ $denda }}" readonly>
							</div>	
						</div>
					</div>
					<div class="form-group">
						<a href="{{ url('/pengembalian') }}" class="btn btn-danger btn-sm">
							<i class="fa fa-sign-out"></i> Kembali
						</a>
						<button type="submit" class="btn btn-success btn-sm">
							<i class="fa fa-save"></i> Simpan
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection