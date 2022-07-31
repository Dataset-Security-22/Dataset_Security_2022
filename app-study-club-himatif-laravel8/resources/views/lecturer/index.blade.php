@extends('template')

@section('title', 'Lecturer')

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

<div class="row">
	<div class="col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label for="email">Add new lecturer</label>
					<input type="email" id="email" class="form-control" placeholder="Email...">
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<select id="category" class="form-control">
						@foreach ($category as $c)
						<option value="{!! $c->id !!}">{!! $c->category !!}</option>
						@endforeach
					</select>
				</div>
				<button id="new" class="btn btn-success">Add New</button>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label for="mhs">Add lecturer from student</label>
					<input type="text" id="mhs" name="mhs" class="form-control" placeholder="Input nama mahasiswa">
					<input type="hidden" id="nim" class="form-control">
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
								<th>Student</th>
								<th>Email</th>
								<th>Class</th>
								<th>Whatsapp</th>
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
			url: "/lecturer/get",
			type: "get",
			success: function (response) {
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let NewRow = empTable.insertRow(0); 
						let studentCell = NewRow.insertCell(0); 
						let emailCell = NewRow.insertCell(1); 
						let classCell = NewRow.insertCell(2); 
						let waCell = NewRow.insertCell(3); 
						let opsiCell = NewRow.insertCell(4); 

						studentCell.innerHTML = val['name']; 
						emailCell.innerHTML = val['email']; 
						waCell.innerHTML = val['whatsapp']; 
						classCell.innerHTML = val['class']['class']; 
						opsiCell.innerHTML = '<button onclick="hapus('+ val['id'] +')" class="btn btn-danger">Hapus</button>'; 

					}
				}
			}
		});

	}

	function hapus(user) {
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
					url: "/lecturer/del",
					type: "post",
					data: {user: user, _method: 'delete'},
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

	function NEW(email, category) {
		$.ajax({
			url: "/lecturer/store",
			type: "post",
			data: {email: email, category: category},
			success: function (response) {
				if (response == 1) {
					$("#pesan").html(swal('Wooww!', 'Data berhasil di input!', 'success'));
					$("#email").val('')
					load();
				} else {
					$("#pesan").html(swal('Ooops!', 'Data gagal di input!', 'error'));
				}
			}
		});
	}

	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(".form-group").on('keypress', '#email', function (e) {
			if(e.keyCode == 13)
			{
				let email = $("#email").val().trim();
				let category = $("#category").val().trim();
				if (email != '') {
					NEW(email, category);
				} else {
					$("#pesan").html(swal('Ooops!', 'Email tidak boleh kosong!', 'error'));
				}
			}
		});

		$("#new").on("click", function () {
			let email = $("#email").val().trim();
			let category = $("#category").val().trim();

			if (email != '') {
				NEW(email, category);
			} else {
				$("#pesan").html(swal('Ooops!', 'Email tidak boleh kosong!', 'error'));
			}
		})

		$("#add").on("click", function () {
			let nim = $("#nim").val().trim();
			let mhs = $("#mhs").val().trim();

			if (nim != '' && mhs != '') {
				$.ajax({
					url: "/lecturer/add",
					type: "post",
					data: {nim: nim},
					success: function (response) {
						if (response == 1) {
							$("#pesan").html(swal('Wooww!', 'Data berhasil di input!', 'success'));
							$("#nim").val('')
							$("#mhs").val('')
							load();
						} else {
							$("#pesan").html(swal('Ooops!', 'Data gagal di input!', 'error'));
						}
					}
				});
			} else {
				$("#pesan").html(swal('Ooops!', 'Nama tidak boleh kosong!', 'error'));
			}
		})

	})
</script>

@endsection()