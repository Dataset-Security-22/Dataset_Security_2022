@extends("page.layouts.template_bph")

@section("page_title", "Dashboard")

@section("content_header")

<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> Dashboard </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
</div>

@endsection

@section("content")

<div class="container">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
            <?php
              echo $total_absen_s = DB::table("tb_absensi")
                          ->count();
            ?>
          </h3>

          <p>Data Absen Keseluruhan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ url('/page/bph/data_absen') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>
            <?php
              $tanggal_absen = date("Y-m-d");
              echo $total_absen_p = DB::table("tb_absensi")
                          ->where("tanggal_absen", $tanggal_absen)
                          ->count();
            ?>
          </h3>

          <p>Data Absen Pertanggal</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ url('/page/bph/data_absen_pertanggal') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>
            <?php
              $jumlah_kas = DB::table("tb_kas")
                      ->sum("bayar");

              echo "Rp. ".number_format($jumlah_kas);
            ?>  
          </h3>

          <p>Data KAS</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('/page/bph/kas/data_kas') }}" class="small-box-footer">
          Selengkapnya <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
            <?php
              $sekarang = date("Y-m-d");
              $j_kas_pertanggal = DB::table("tb_kas")
                            ->where("tanggal", $sekarang)
                            ->sum("bayar");
            ?>
            Rp. {{ number_format($j_kas_pertanggal) }}
          </h3>

          <p>Data KAS Pertanggal</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ url('/page/bph/kas/data_kas_pertanggal') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <div id="chart"></div>
    </div>
    <div class="col-md-6">
      <div id="chart2"></div>
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

<script type="text/javascript">
  Highcharts.chart('chart2', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Rating Absen Tanggal <?php echo date('Y-m-d') ?> '
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
        text: 'Total Absen <?php echo date("Y-m-d") ?>'
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
    $sekarang = date("Y-m-d");
    $hadir = DB::table("tb_absensi")->where("status_absen", 1)->where("tanggal_absen", $sekarang)->count();
    $sakit = DB::table("tb_absensi")->where("status_absen", 2)->where("tanggal_absen", $sekarang)->count();
    $izin = DB::table("tb_absensi")->where("status_absen", 3)->where("tanggal_absen", $sekarang)->count();
    $alfa = DB::table("tb_absensi")->where("status_absen", 4)->where("tanggal_absen", $sekarang)->count();
    $terlambat = DB::table("tb_absensi")->where("status_absen", 5)->where("tanggal_absen", $sekarang)->count();
    ?>
    series: [{
      name: 'Absen',
      data: [{{$hadir}}, {{$sakit}}, {{$izin}}, {{$alfa}}, {{$terlambat}}]

    }]
  });
</script>

@endsection