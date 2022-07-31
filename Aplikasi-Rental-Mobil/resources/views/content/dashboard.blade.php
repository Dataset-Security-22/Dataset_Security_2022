@extends("content.layouts.app")

@section("page_content")

<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
			<p style="margin-left: 10px;">
				Selamat Datang <b>{{ Auth::user()->username }}</b> di <b>Aplikasi Rental Mobil Berbasis Web</b>. Silahkan Pilih Menu Untuk Memulai Program
			</p>
		</div>
	</div>
</div>

<br>

@if(Auth::user()->role == 1)
<div class="row">
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Petugas</h5>
			</div>
			<h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_petugas = DB::table("tb_karyawan")
									->count();
							echo $total_petugas;
						?>
					</h2>
				</div>
				<a href="{{ url('/petugas') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Pemilik</h5>
			</div>
			<h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_pemilik = DB::table("tb_pemilik")
									->count();
							echo $total_pemilik;
						?>
					</h2>
				</div>
				<a href="{{ url('/pemilik') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Kendaraan</h5>
			</div>
			<h1 class="mt"><i class="fa fa-car fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_kendaraan = DB::table("tb_kendaraan")
									->count();
							echo $total_kendaraan;
						?>
					</h2>
				</div>
				<a href="{{ url('/kendaraan') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Pelanggan</h5>
			</div>
			<h1 class="mt"><i class="fa fa-male fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_pelanggan = DB::table("tb_pelanggan")
									->count();
							echo $total_pelanggan;
						?>
					</h2>
				</div>
				<a href="{{ url('/pelanggan') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
</div>

<br><br>

<div class="row">
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Sopir</h5>
			</div>
			<h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_sopir = DB::table("tb_sopir")
									->count();
							echo $total_sopir;
						?>
					</h2>
				</div>
				<a href="{{ url('/sopir') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Transaksi</h5>
			</div>
			<h1 class="mt"><i class="fa fa-money fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_transaksi = DB::table("tb_transaksi")
									->count();
							echo $total_transaksi;
						?>
					</h2>
				</div>
				<a href="{{ url('/transaksi') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Pengembalian</h5>
			</div>
			<h1 class="mt"><i class="fa fa-sign-out fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_pengembalian = DB::table("tb_transaksi")
									->where("kondisi_mobil_kembali", "!=", NULL)
									->count();
							echo $total_pengembalian;
						?>
					</h2>
				</div>
				<a href="{{ url('/pengembalian') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Users</h5>
			</div>
			<h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
			<footer>
				<div class="centered">
					<h2> 
						<?php 
							$total_users = DB::table("users")
									->where("role", 1)
									->count();
							echo $total_users;
						?>
					</h2>
				</div>
				<a href="{{ url('/users') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div>
</div>
@elseif(Auth::user()->role == 2)
<div class="row">
	@foreach($data_kendaraan as $kendaraan)
	<div class="col-md-4 col-sm-4 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>{{ $kendaraan->no_plat }}</h5>
			</div>
			<h1 class="mt"><i class="fa fa-car fa-2x"></i></h1>
			<p style="color: white;">
				Tarif Per/Jam : Rp. {{ number_format($kendaraan->tarif_perjam) }}
				<br>
				Merk : {{ $kendaraan->re_type->re_merk->nama_merk }}
			</p>
			<br>
			<footer>
				<a href="{{ url('/detail_kendaraan/'.$kendaraan->id.'/detail') }}" class="btn btn-danger btn-sm btn-block" style="padding: 10px;">
					<i class="fa fa-search"></i> Detail
				</a>
			</footer>
		</div>
	</div><!-- /col-md-4 -->
	@endforeach
</div>
@else
Tidak Ada
@endif

@endsection