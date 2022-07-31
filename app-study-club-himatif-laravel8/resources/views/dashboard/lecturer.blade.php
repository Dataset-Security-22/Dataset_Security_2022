@extends('template')

@section('title', 'Home')

@section('content')

<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">@yield('title')</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

<h3 class="alert alert-info">
	Selamat Datang <b>{{ $user->name }}</b>. <br>
	Anda ditugaskan sebagai mentor di bidang <b>{{ $user->category->category }}</b>
</h3>

<div class="row">
	<div class="col-lg-3 col-sm-6 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Peserta</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" id="peserta"><?= '100' ?></span></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Pemateri</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash2"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info" id="pemateri"><?= '100' ?></span></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Bidang Study</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash3"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-primary"></i> <span class="counter text-primary" id="study"><?= '100' ?></span></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Materi</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash4"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple" id="materi"><?= '100' ?></span></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Tugas</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash1"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-warning"></i> <span class="counter text-warning" id="tugas"><?= '100' ?></span></li>
			</ul>
		</div>
	</div>
</div>

@endsection()