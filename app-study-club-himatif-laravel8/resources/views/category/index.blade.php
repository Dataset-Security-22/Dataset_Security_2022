@extends('template')

@section('title', 'Category')

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

<div id="pesan2"></div>

<div class="row">
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label for="category">Add Category</label>
					<input type="text" id="category" class="form-control">
				</div>
				<button id="add" class="btn btn-success">Add</button>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="dataTable">
						<thead>
							<tr>
								<th>Category</th>
								<th>Follower</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	load();

	function load() {
		let xhr = new XMLHttpRequest();

		let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";
		
		$.ajax({
			url: "/category/get",
			type: "get",
			success: function (response) {
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let NewRow = empTable.insertRow(0); 
						let categoryCell = NewRow.insertCell(0); 
						let followerCell = NewRow.insertCell(1); 
						let opsiCell = NewRow.insertCell(2); 

						categoryCell.innerHTML = "<div class='edit' edit_type='click' col_name='category' row_id='"+val['id']+"'>"+val['category']+"</div>"; 
						followerCell.innerHTML = '<span class="badge badge-success" style="text-transform: lowercase;">'+val['follower']+' Students</span>'; 
						opsiCell.innerHTML = '<button onclick="hapus('+ val['id'] +')" class="btn btn-danger">Hapus</button>'; 

					}
				}
			}
		});
	}

	function hapus(category) {
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
				$.ajax({
					url: "/category/del",
					type: "post",
					data: {category: category},
					success: function (response) {
						if (response == 1) {
							swal("Selamat!", "Data anda berhasil dihapus", "success");
							load();
						} else {
							swal("Ooops", "Data gagal terhapus!", "error");
						}
					}
				});
			} else {
				swal("Ooops", "Data tidak jadi dihapus!", "error");
			}
		});
	}

	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$("tbody").on('click', '.edit', function (e) {
			e.preventDefault();

			if ($(this).attr('edit_type') == 'button') {
				return false;
			}

			$(this).closest('div').attr('contenteditable', 'true');
			$(this).addClass('form-control');
			$(this).focus();
		});

		$("tbody").on('focusout', '.edit', function (e) {
			e.preventDefault();

			if ($(this).attr('edit_type') == 'button') {
				return false;
			}

			let row_id = $(this).attr('row_id');
			let row_div = $(this).removeAttr('contenteditable').removeClass('form-control');

			let name = row_div.attr('col_name');
			let val = row_div.html();
			let id = 'id';

			let arr = {};

			arr[name] = val;
			arr[id] = row_id;

			$.ajax({
				url: "/category/edit",
				type: "post",
				data: arr,
				success: function (response) {
					if (response == 1) {
						$("#pesan2").html('<div class="alert alert-success">Category berhasil diubah</div>');
						setTimeout(function() {
							$(".alert").alert('close');
						}, 2000);
					} else {
						$("#pesan2").html('<div class="alert alert-danger">Category gagal diubah</div>');
						load();
					}
				}
			});

		});

		$("tbody").on('keypress', '.edit', function (e) {
			if(e.keyCode == 13)
			{
				$(this).removeAttr('contenteditable').removeClass('form-control');
			}
		});

		$("#add").on("click", function () {
			let category = $("#category").val().trim();

			if (category != '') {
				$.ajax({
					url: "/category/add",
					type: "post",
					data: {category: category},
					success: function (response) {
						if (response == 1) {
							$("#pesan").html(swal('Wooww!', 'Data berhasil di input!', 'success'));
							$("#category").val('')
							load();
						} else {
							$("#pesan").html(swal('Ooops!', 'Data gagal di input!', 'error'));
						}
					}
				});
			} else {
				$("#pesan").html(swal('Ooops!', 'Category tidak boleh kosong!', 'error'));
			}
		});

	})
</script>

@endsection()