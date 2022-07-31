@extends('template')

@section('title', 'Read ' . $learning->title)

@section('content')

<style>
	.edit-mode {
		border: 1px solid black;
	}
</style>

<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">@yield('title')</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li><a href="/learning">Learning</a></li>
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

<div class="card">
	<div class="card-body">
		{!! $learning->material !!}
	</div>
</div>

@endsection()