@extends('template/second')
@section('content')
<link href="/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@if (session('message2'))
{!! session('message2') !!}
@endif
<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		<h4>Daftar Kendaraan Pinjaman</h4>
	</div>
	<div class="cs-card-content card-items-list clearfix">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dataTable">
				<thead>
					<tr>
						<th>Invoice</th>
						<th>Nama</th>
						<th>Total</th>
						<th>Kendaraan</th>
						<th>Tujuan</th>
						<th>No. WA</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6 mt-5">
		<div class="cs-card cart-card card-show">
			<div class="card-header bordered clearfix">
				<h4>Daftar Kendaraan Selesai Pinjam</h4>
			</div>
			<div class="cs-card-content card-items-list clearfix">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="dataTableSelesai">
						<thead>
							<tr>
								<th>No</th>
								<th>Kendaraan</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 mt-5">
		<div class="cs-card cart-card card-show">
			<div class="card-header bordered clearfix">
				<h4>Daftar Kendaraan Ditolak/ Dibatalkan</h4>
			</div>
			<div class="cs-card-content card-items-list clearfix">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="dataTableTolak">
						<thead>
							<tr>
								<th>No</th>
								<th>Kendaraan</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/assets/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/dataTables.bootstrap4.min.js"></script>
@csrf
<script>
	loadPesanan();
	loadPesananTolak();
	loadPesananSetuju();

	function loadPesanan() {
		let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";

		$.ajax({
			url: "/pinjaman/kendaraan-by-me",
			type: "get",
			success: function (response) {
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let newRow = empTable.insertRow(0); 
						let invoiceCell = newRow.insertCell(0);
						let namaCell = newRow.insertCell(1);
						let totalCell = newRow.insertCell(2);
						let kendaraanCell = newRow.insertCell(3);
						let tujuanCell = newRow.insertCell(4);
						let teleponCell = newRow.insertCell(5);
						let aksiCell = newRow.insertCell(6);

						invoiceCell.innerHTML = val['invoice'];
						namaCell.innerHTML = val['penyewa'];
						totalCell.innerHTML = val['total'];
						kendaraanCell.innerHTML = val['kendaraan'];
						tujuanCell.innerHTML = val['tujuan'];
						teleponCell.innerHTML = '<a class="btn btn-2primary" href="https://api.whatsapp.com/send?phone='+val['telepon']+'&text=Ada pesan dari admin silihin.co.vu%0A%0ANama : {{ Session::get("logged_in")["nama_lengkap"] }}%0AInvoice : '+val['invoice']+'%0AYang Punya : '+val['kendaraan']+'">WhatsApp</a>';
						if (val['persetujuan'] == 1) {
							aksiCell.innerHTML = '<span class="badge btn-2success mr-3">Setuju</span> | ';
							aksiCell.innerHTML += '<button class="btn btn-2primary mx-3" data-id="'+val['invoice']+'" data-kendaraan="'+val['id_kendaraan']+'" id="selesai" data-toggle="modal" data-target="#selesai-modal">Selesai?</button>'
							aksiCell.innerHTML += '<button class="btn btn-primary mr-3" data-id="'+val['invoice']+'" data-kendaraan="'+val['id_kendaraan']+'" id="batal" data-toggle="modal" data-target="#batal-modal">Batal</button>'
						} else {
							aksiCell.innerHTML = '<button class="btn btn-2primary mr-3" data-id="'+val['invoice']+'" data-kendaraan="'+val['id_kendaraan']+'" id="setuju" data-toggle="modal" data-target="#setuju-modal">Setuju</button>'
							aksiCell.innerHTML += '<button class="btn btn-primary" data-id="'+val['invoice']+'" data-kendaraan="'+val['id_kendaraan']+'" id="tolak" data-toggle="modal" data-target="#tolak-modal">Batal</button>'
						}
					}
				}
			}
		});
	}

	function loadPesananTolak() {
		let empTable = document.getElementById("dataTableTolak").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";

		$.ajax({
			url: "/pinjaman/kendaraan-by-me/tolak",
			type: "get",
			success: function (response) {
				let no = 1;
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let newRow = empTable.insertRow(-1); 
						let noCell = newRow.insertCell(0);
						let kendaraanCell = newRow.insertCell(1);
						let jumlahCell = newRow.insertCell(2);

						noCell.innerHTML = no++;
						kendaraanCell.innerHTML = val['kendaraan'];
						jumlahCell.innerHTML = '<button class="badge btn-2primary">'+val['jumlah']+' Kendaraan</button>';
					}
				}
			}
		});
	}

	function loadPesananSetuju() {
		let empTable = document.getElementById("dataTableSelesai").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";

		$.ajax({
			url: "/pinjaman/kendaraan-by-me/selesai",
			type: "get",
			success: function (response) {
				let no = 1;
				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let newRow = empTable.insertRow(-1); 
						let noCell = newRow.insertCell(0);
						let kendaraanCell = newRow.insertCell(1);
						let jumlahCell = newRow.insertCell(2);

						noCell.innerHTML = no++;
						kendaraanCell.innerHTML = val['kendaraan'];
						jumlahCell.innerHTML = '<button class="badge btn-2primary">'+val['jumlah']+' Kendaraan</button>';
					}
				}
			}
		});
	}

	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
			}
		});

		$("body").on('click', '#setuju', function () {
			let invoice = $(this).data('id');
			let kendaraan = $(this).data('kendaraan');

			$('#invoiceSetuju').val(invoice);
			$('#kendaraanSetuju').val(kendaraan);
		})

		$("body").on('click', '#tolak', function () {
			let invoice = $(this).data('id');
			let kendaraan = $(this).data('kendaraan');
			
			$('#invoiceTolak').val(invoice);
			$('#kendaraanTolak').val(kendaraan);
		})
	})
</script>

@include('modal.setuju')
@include('modal.tolak')
@include('modal.batal')
@include('modal.selesai')

@endsection()