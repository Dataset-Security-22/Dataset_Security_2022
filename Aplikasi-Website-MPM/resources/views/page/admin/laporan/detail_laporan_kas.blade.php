@extends("page.layouts.template")

@section("page_title", "Laporan Data KAS")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0"> Laporan Data KAS </h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/laporan/data_kas') }}">
						Laporan Data KAS
					</a>
				</li>
				<li class="breadcrumb-item active"> Detail Laporan Data KAS </li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card card-primary card-outline">
				<div class="card-body box-profile">
					<div class="text-center">
						<img class="profile-user-img img-fluid img-circle" src="{{ url('/storage/'.$detail->getAnggota->gambar) }}" alt="{{ $detail->getAnggota->nama }}">
					</div>
					<h3 class="profile-username text-center">
						{{ $detail->getAnggota->nama }}
					</h3> 
					<p class="text-muted text-center">
						{{ $detail->getBagian->nama_bagian }} - {{ $detail->getJabatan->nama_jabatan }}
					</p>
					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>Jenis Kelamin</b> <a class="float-right">{{ $detail->getAnggota->jenis_kelamin }}</a>
						</li>
						<li class="list-group-item">
							<b>No. Telepon</b> <a class="float-right">{{ $detail->getAnggota->no_hp }}</a>
						</li>
						<li class="list-group-item">
							<b>Agama</b> <a class="float-right">{{ $detail->getAnggota->agama }}</a>
						</li>
					</ul>

					<a href="{{ url('/page/admin/laporan/data_kas') }}" class="btn btn-primary btn-block">
						<b> 
							<i class="fa fa-sign-in"></i> Kembali
						</b>
					</a>
				</div>
			</div>	
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Detail Data</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<strong> NIM </strong>

					<p class="text-muted">
						<b>
							{{ $detail->getAnggota->nim }}
						</b>
					</p>

					<hr>

					<strong> Kelas </strong>

					<p class="text-muted">
						{{ $detail->getAnggota->getKelas->nama_kelas }}
					</p>

					<strong> Alamat </strong>

					<p class="text-muted">
						{{ $detail->getAnggota->alamat }}
					</p>

				</div>
				<!-- /.card-body -->
			</div>		
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item">
							<a class="nav-link active" href="#activity" data-toggle="tab">Data Absen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#timeline" data-toggle="tab">Grafik</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="activity">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Bayar</th>
										<th class="text-center">Tanggal</th>
										<th>Keterangan</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 0;
										$data_kas = DB::table("tb_kas")
											->where("nim_anggota", $detail->getAnggota->nim)
											->get();
									?>
									@foreach($data_kas as $kas)
									<tr>
										<td class="text-center">{{ ++$no }}.</td>
										<td class="text-center">Rp. {{ number_format($kas->bayar) }} </td>
										<td class="text-center">{{ $kas->tanggal }}</td>
										<td>{{ $kas->keterangan }}</td>
										<td class="text-center">
											@if($kas->status == 1)
												Masuk
											@elseif($kas->status == 0)
												Keluar
											@else
												Tidak Ada
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="tab-pane" id="timeline">
							<!-- Chart -->
							<div id="chart"></div>
							<!-- EndChart -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section("page_scripts")

<script src="{{ url('/chart/chart.js') }}"></script>

<script type="text/javascript">
	Highcharts.chart('chart', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Rating Absen Keseluruhan '
		},
		xAxis: {
			categories: [
			'Hadir',
			'Sakit',
			'Izin',
			'Alfa',
			'Terlambat'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total Absen'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		<?php
		$total = DB::table("tb_kas")->where("nim_anggota", $detail->getAnggota->nim)->sum("bayar", 1);
		?>
		series: [{
			name: 'Uang KAS',
			data: [ {{ $total }} ]

		}]
	});
</script>

@endsection