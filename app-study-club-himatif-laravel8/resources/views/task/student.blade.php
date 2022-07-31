@extends('template')

@section('title', 'Task')

@section('content')

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

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>Lecturer</th>
						<th>Completions</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach ($task as $t)
					<?php
					$taskView = App\Models\Task_view::where('id_student', $user->id)->where('id_task', $t->id)->count();
					if ($taskView < 1) { 
						echo '<tr class="bg-success text-white">';
					} else {
						echo '<tr>';
					} ?>
					<td>{{ $no++ }}</td>
					<td>{{ $t->title }}</td>
					<td>{{ $t->lecturer->name }}</td>
					<td>{{ $t->title }}</td>
					<td>
						<a href="/task/{{ $t->slug }}" class="btn btn-info">Look Task</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>

<script>
	$(document).ready(function () {
		$("#dataTable").DataTable();
		
		$("body").on('click', '#delete', function () {
			swal({
				title: "Apakah anda yakin?",
				text: "Data ini akan dihapus!",
				icon: "warning",
				buttons: {
					cancel: "Batal",
					danger: {
						text: "Hapus",
					}
				},
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					var action = $(this).attr('data-action');
					var token = jQuery('meta[name="csrf-token"]').attr('content');

					$('body').html("<form class='remove-form' method='post' style='display: inline' action='"+action+"'></form>");
					$('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
					$('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
					$('body').find('.remove-form').submit();
				} else {
					swal("Ooops", "Data tidak jadi dihapus!", "error");
				}
			});
		})
	})
</script>

@endsection()