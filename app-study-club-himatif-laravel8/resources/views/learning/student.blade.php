@extends('template')

@section('title', 'Learning')

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
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Title</th>
							<th>Lecturer</th>
							<th>Material</th>
							<th>Category</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1 ?>
						@foreach ($learning as $l)
						<?php
						$learningView = App\Models\Learning_view::where('id_student', $user->id)->where('id_learning', $l->id)->count();

						if ($learningView < 1) { ?>
							<tr class="bg-success text-white" title="Materi Baru">
							<?php } else { ?>
								<tr>
								<?php } ?>
								<td>{{ $no++ }}</td>
								<td>{{ $l->title }}</td>
								<td>{{ $l->lecturer->name }}</td>
								<td><a href="/learning/{{ $l->slug }}" class="btn btn-info">Lihat Materi</a></td>
								<td>{{ $l->category->category }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(function () {
			$("#dataTable").DataTable()
		})
	</script>

	@endsection()