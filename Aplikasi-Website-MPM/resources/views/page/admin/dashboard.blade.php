@extends("page.layouts.template")

@section("page_title", "Dashboard")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0"> Dashboard </h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item ">Dashboard</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>
						<?php
							echo $j_absensi = DB::table("tb_absensi")
									->count();
						?>
					</h3>

					<p>
						Data Absensi
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="{{ url('/page/admin/laporan/data_absen') }}" class="small-box-footer">
					Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3>	
						<?php
							$jumlah_kas = DB::table("tb_kas")
									->sum("bayar");

							echo "Rp. ".number_format($jumlah_kas);
						?>
					</h3>

					<p>
						Data KAS
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="{{ url('/page/admin/laporan/data_kas') }}" class="small-box-footer">
					Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3>
						<?php
							$jumlah_divisi = DB::table("tb_divisi")
									->count();
							echo $jumlah_divisi;
						?>
					</h3>

					<p>Data Divisi</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{ url('/page/admin/divisi') }}" class="small-box-footer">
					Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>
						<?php
							$jumlah_user = DB::table("users")
										->count();

							echo $jumlah_user;
						?>
					</h3>

					<p>
						Data Users
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="#" class="small-box-footer">
					Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div id="chart"></div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						Data Terakhir Login
					</h3>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama</th>
								<th class="text-center">Terakhir Login</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_last_login as $last_login)
							<tr>
								<td class="text-center">{{ ++$no }}.</td>
								<td>{{ $last_login->nama }}</td>
								<td class="text-center">{{ $last_login->last_login }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section("page_scripts")

<script src="{{ url('/chart/chart.js') }}"></script>

@if(session("sukses"))

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	swal({
		title: "Berhasil!",
		text: "{{ session('sukses') }}",
		icon: "success",
		button: "OK",
	});

</script>

@endif

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
		$hadir = DB::table("tb_absensi")->where("status_absen", 1)->count();
		$sakit = DB::table("tb_absensi")->where("status_absen", 2)->count();
		$izin = DB::table("tb_absensi")->where("status_absen", 3)->count();
		$alfa = DB::table("tb_absensi")->where("status_absen", 4)->count();
		$terlambat = DB::table("tb_absensi")->where("status_absen", 5)->count();
		?>
		series: [{
			name: 'Absen',
			data: [{{$hadir}}, {{$sakit}}, {{$izin}}, {{$alfa}}, {{$terlambat}}]

		}]
	});
</script>

@endsection