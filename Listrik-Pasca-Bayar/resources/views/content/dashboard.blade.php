@extends("content.layouts.app")

@section("page_header") <i class="fa fa-dashboard"></i> Dashboard @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li class="active">Dashboard</li>
</ol>


@stop

@section("page_content")

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Selamat Datang <b>{{ Auth::user()->name }}</b></h3>
			</div>
			<div class="box-body">
				<p>
					di <b>Aplikasi Listrik Pasca Bayar Berbasis Web.</b> Silahkan Pilih menu untuk memulai program.
				</p>
			</div>
		</div>
	</div>
</div>

@if(Auth::user()->role == 1)

<div class="row">
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $tarif }}</h3>

				<p>Tarif</p>
			</div>
			<div class="icon">
				<i class="fa fa-fax"></i>
			</div>
			<a href="{{ url('/tarif') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{ $pelanggan }}</h3>

				<p>Pelanggan</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="{{ url('/pelanggan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $penggunaan }}</h3>

				<p>Penggunaan</p>
			</div>
			<div class="icon">
				<i class="fa fa-pencil"></i>
			</div>
			<a href="{{ url('/penggunaan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{ $tagihan }}</h3>

				<p>Tagihan</p>
			</div>
			<div class="icon">
				<i class="fa fa-folder-open"></i>
			</div>
			<a href="{{ url('/tagihan-pengguna') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>{{ $pembayaran }}</h3>

				<p>Pembayaran</p>
			</div>
			<div class="icon">
			<i class="fa fa-money"></i>
			</div>
			<a href="{{ url('/pembayaran') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-gray">
			<div class="inner">
				<h3>{{ $petugas }}</h3>

				<p>Petugas</p>
			</div>
			<div class="icon">
			<i class="fa fa-users"></i>
			</div>
			<a href="{{ url('/petugas') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

@else

@endif

@endsection