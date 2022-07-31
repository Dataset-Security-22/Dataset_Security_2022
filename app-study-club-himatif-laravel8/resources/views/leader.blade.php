@extends('template')

@section('title', 'Leaderboard')

@section('content')

<style>
	#learner {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin: 0 20px;
	}

	span#no {
		font-size: 1.1em;
		font-weight: bold;
	}

	span#nama {
		font-weight: bold;
	}

	span#no, #learner #img {
		margin-right: 10px
	}
</style>

<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">@yield('title')</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

<h1 class="text-center" style="font-weight: bold; text-transform: uppercase;">Top Learner</h1>

<?php if (Session::get('id_role')==3): ?>
	<h2>Point anda <?= $my->skor ?></h2>
<?php endif ?>

<?php $no=1; ?>
@foreach ($student as $s)
<div class="card">
	<div class="card-body">
		<div id="learner">
			<div>
				<span id="no"><?= $no++ ?></span>
				<img src="<?= $s->image != 'default.jpg' ? $s->image : '/assets/img/profile/'.$s->image ?>" alt="<?= $s->name ?>" height="42" width="42" style="border-radius: 50%;" id="img">
				<span id="nama"><?= $s->name ?></span>
			</div>
			<div id="skor"><?= $s->skor ?> Point</div>
		</div>
	</div>
</div>
@endforeach

@endsection()