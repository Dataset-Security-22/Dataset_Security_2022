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

<a href="/task/create" class="btn btn-primary m-b-15">Add New Task</a>

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
					<?php $completion = App\Models\Answer::where('id_task', $t->id)->count(); ?>
					<tr>
						<th>{{ $no++ }}</th>
						<td>{{ $t->title }}</td>
						<td>{{ $t->lecturer->name }}</td>
						<td><a href="/task/completion/{{ $t->slug }}" class="btn btn-primary">{{ $completion }} Students</a></td>
						<td>
							<a href="/task/{{ $t->slug }}" class="btn btn-info">Look Task</a> |
							<?php if ($user->id == $t->id_lecturer): ?>
								<a href="/task/{{ $t->slug }}/edit" class="btn btn-warning">Edit</a> | 
								<button id="delete" data-action="/task/{{ $t->slug }}" class="btn btn-danger">Delete</button>
							<?php endif ?>
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