@extends('template')

@section('title', 'Student')

@section('content')

<style>
	.box {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.pagination {
		margin: 0;
	}

	.cc {
		display: flex;
		justify-content: center;
	}

	.input-group {
		width: 33.3%;
		display: flex;
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

<div class="card">
	<div class="card-body">
		<form action="/student" class="cc">
			<div class="input-group m-b-20">
				<input type="search" class="form-control" placeholder="Search.." id="search" name="search" value="{{ request('search') }}">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</form>
		<form action="/student" method="post" id="form">
			@csrf
			@method('delete')
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="dataTable">
					<thead>
						<tr>
							<th><input type="checkbox" id="check" name="chk[]"></th>
							<th>Student</th>
							<th>NIM</th>
							<th>Class</th>
							<th>Category</th>
							<th>Whatsapp</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($user as $u)
						<tr>
							<th><input type="checkbox" name="check[]" value="{!! $u->id !!}"></th>
							<td>{!! $u->name !!}</td>
							<td>{!! $u->nim !!}</td>
							<td>{!! $u->classes->class !!}</td>
							<td>{!! $u->category->category !!}</td>
							<td><a href="//wa.me/{!! $u->whatsapp !!}" target="_blank">{!! $u->whatsapp !!}</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="box m-b-15 m-t-15">
				<button class="btn btn-danger btn-delete" type="button">Hapus</button>
				{{ $user->links() }}
			</div>

			Halaman : {{ $user->currentPage() }} <br/>
			Jumlah Data : {{ $user->total() }} <br/>
			Data Per Halaman : {{ $user->perPage() }} <br/>

		</form>
	</div>
</div>

<script>
	// load();

	function load() {
		let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";

		$.ajax({
			url: "/student/get",
			type: "get",
			success: function (response) {
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let NewRow = empTable.insertRow(0); 
						let idCell = NewRow.insertCell(0); 
						let studentCell = NewRow.insertCell(1); 
						let nimCell = NewRow.insertCell(2); 
						let classCell = NewRow.insertCell(3); 
						let categoryCell = NewRow.insertCell(4); 
						let waCell = NewRow.insertCell(5); 

						idCell.innerHTML = "<input type='checkbox' name='check[]' value='"+val['id']+"'>"; 
						studentCell.innerHTML = val['name'];
						nimCell.innerHTML = val['nim'];
						classCell.innerHTML = val['class'];
						categoryCell.innerHTML = val['category'];
						waCell.innerHTML = val['whatsapp'];
					}
				}
			}
		});
	}

	$(document).ready(function(){
		$("#search").on("keyup", function () {
			let value = $(this).val().toLowerCase();

			$("tbody tr").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});

		$("#check").click(function(){
			if($(this).is(":checked"))
				$("[type='checkbox']").prop("checked", true);
			else
				$("[type='checkbox']").prop("checked", false);
		});

		$(".btn-delete").click(function(){
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
					$("#form").submit();
				} else {
					swal("Ooops", "Data tidak jadi dihapus!", "error");
				}
			});
		});

	});
</script>

@endsection()