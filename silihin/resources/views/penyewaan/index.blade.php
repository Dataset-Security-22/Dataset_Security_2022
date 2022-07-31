@extends('template/second')
@section('content')
<link href="/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@if (session('message2'))
{!! session('message2') !!}
@endif
<div class="cs-card cart-card card-show">
	<div class="card-header bordered clearfix">
		<h4>Daftar Kendaraan Yang Disewa</h4>
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

<script src="/assets/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	loadPesanan();

	function loadPesanan() {
		let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
		empTable.innerHTML = "";

		$.ajax({
			url: "/penyewaan/kendaraan-by-me",
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
						namaCell.innerHTML = val['nama'];
						totalCell.innerHTML = val['total'];
						kendaraanCell.innerHTML = val['kendaraan'];
						tujuanCell.innerHTML = val['tujuan'];
						teleponCell.innerHTML = '<a class="btn btn-2primary" href="https://api.whatsapp.com/send?phone='+val['telepon']+'&text=Ada pesan dari customer silihin.co.vu%0A%0ANama : {{ Session::get("logged_in")["nama_lengkap"] }}%0AInvoice : '+val['invoice']+'%0APenyewa : '+val['kendaraan']+'">WhatsApp</a>';
						if (val['persetujuan'] == 1) {
							aksiCell.innerHTML = '<span class="badge btn-2success">Disetujui</span>'
						} else if (val['persetujuan'] == 2) {
							aksiCell.innerHTML = '<span class="badge btn-primary">Batal</span>'
						} else {
							aksiCell.innerHTML = '<button class="btn btn-primary mr-3" data-id="'+val['invoice']+'" data-kendaraan="'+val['id_kendaraan']+'" id="batal" data-toggle="modal" data-target="#batal-modal">Batal</button>'
						}
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
	})
</script>
@include('modal.batal')
@endsection()
