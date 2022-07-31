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
						<th>Name</th>
						<th>NIM</th>
						<th>Class</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					@foreach ($answer as $a)
					<?php $class = \App\Models\Classes::where('id', $a->student->id_class)->first(); ?>
					<tr>
						<th>{{ $no++ }}</th>
						<td>{{ $a->student->name }}</td>
						<td>{{ $a->student->nim }}</td>
						<td>{{ $class->class }}</td>
						<td><button class="btn btn-primary" data-toggle="modal" data-target="#lihatJawaban" onclick="lihat({{ $a->id_student }}, {{ $a->id_task }})">Look Answer</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="lihatJawaban" tabindex="-1" aria-labelledby="lihatJawabanLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="lihatJawabanLabel">Jawaban</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="jawaban"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	function lihat(id_student, id_task) {
		$.ajax({
			url: '/answer/post',
			type: 'post',
			data: {id_student: id_student, id_task: id_task},
			success: function (response) {
				console.log(response);
				$("#jawaban").html(response.answer)
			}
		})
	}

	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

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