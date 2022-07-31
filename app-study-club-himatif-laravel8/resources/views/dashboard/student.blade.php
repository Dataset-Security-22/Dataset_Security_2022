@extends('template')

@section('title', 'Home')

@section('content')

<style>
	ul#materi li {
		margin: 10px 0;
	}
</style>

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
	Di bidang <b>{{ $user->category->category }}</b>
</h3>

<div class="row">
	<div class="col-lg-4 col-xs-12">
		<div class="white-box analytics-info">
			<h3 class="box-title">Credit Point</h3>
			<ul class="list-inline two-part">
				<li>
					<div id="sparklinedash"></div>
				</li>
				<li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?= $user->skor ?></span></li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4>Daftar Materi Baru</h4>
				<ul id="materi">
					@foreach ($learning as $l)
					<?php
					$learningView = App\Models\Learning_view::where('id_student', $user->id)->where('id_learning', $l->id)->count();

					if ($learningView < 1) { ?>
						<li><a href="/learning/<?= $l->slug ?>"><b><?= $l->title ?></b></a></li>
					<?php } ?>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4>Daftar Tugas Baru</h4>
				<ul id="materi">
					<?php foreach ($task as $t): ?>
						<?php 
						if (date('d-m-Y H:i', strtotime($t->stop_at)) <= date('d-m-Y H:i')) { ?>
						<?php } elseif (date('d-m-Y H:i', strtotime($t->created_at)) <= date('d-m-Y H:i')) { ?>
							<?php
							$taskView = App\Models\Task_view::where('id_student', $user->id)->where('id_task', $t->id)->count();
							if ($taskView < 1) { ?>
								<li><a href="/task/<?= $t->slug ?>"><b><?= $t->title ?></b></a></li>
							<?php } ?>
						<?php } else { ?>
							<?php
							$taskView = App\Models\Task_view::where('id_student', $user->id)->where('id_task', $t->id)->count();
							if ($taskView < 1) { ?>
								<li><a href="#" title="Harap tunggu waktu tugas"><b><?= $t->title ?></b></a></li>
							<?php } ?>
						<?php } ?>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection()