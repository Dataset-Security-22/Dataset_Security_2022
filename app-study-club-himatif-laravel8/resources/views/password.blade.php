@extends('template')

@section('title', 'Password')

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
		<form action="/password" onsubmit="return false;" id="form" method="post">
			@csrf
			@method('put')
			<div class="form-group">
				<label>Password Lama</label>
				<input type="password" class="form-control password" id="current" name="current" minlength="6">
			</div>
			<div class="form-group">
				<label>Password Baru</label>
				<input type="password" class="form-control password" id="new" name="new" minlength="6">
			</div>
			<div class="form-group">
				<label>Konfirmasi Password Baru</label>
				<input type="password" class="form-control password" id="confirm" name="confirm" minlength="6">
			</div>
			<div class="form-group" style="display: flex; align-items: center">
				<input type="checkbox" id="look" onclick="lookPass()" class="m-r-10 m-b-5" style="cursor: pointer;">
				<label for="look" style="cursor: pointer; margin-bottom: 0">Lihat password</label>
			</div>
			<button id="simpan" class="btn btn-success">Simpan</button>
		</form>
	</div>
</div>

<script>
	function lookPass() {
		let pass = document.getElementById('current');
		if (pass.type === "password") {
			pass.type = "text";
			document.getElementById('new').type = "text";
			document.getElementById('confirm').type = "text";
		} else {
			pass.type = "password";
			document.getElementById('new').type = "password";
			document.getElementById('confirm').type = "password";
		}
	}

	$(document).ready(function () {

		$("#simpan").on("click", function () {
			let currentPass = $("#current").val().trim();
			let newPass = $("#new").val().trim();
			let confirmPass = $("#confirm").val().trim();
			
			if (currentPass == '' && newPass == '' && confirmPass == '') {
				$("#pesan").html(swal('Ooops!', 'Harap isi field tersebut!', 'error'))
			} else if (currentPass == '') {
				$("#pesan").html(swal('Ooops!', 'Password lama harap di isi!', 'error'))
			} else if (newPass == '') {
				$("#pesan").html(swal('Ooops!', 'Password baru harap di isi!', 'error'))
			} else if (confirmPass == ''){
				$("#pesan").html(swal('Ooops!', 'Konfirmasi password baru harap di isi!', 'error'))
			} else if (newPass != confirmPass) {
				$("#pesan").html(swal('Ooops!', 'Password baru tidak cocok!', 'error'))
			} else {
				document.getElementById('form').onsubmit = true;
			}
		})


	})
</script>

@endsection()