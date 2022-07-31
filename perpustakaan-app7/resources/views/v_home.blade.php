@extends('Layout.v_template')
@section('title','Home')


@section('content-header')
<h1>
    @yield('title')
    <small>@yield('title')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

    <li class="active">@yield('title')</li>
  </ol>
@endsection
@section('content')

{{-- @if(auth()->user()->id_role == 1)
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Selamat Datang <b>{{ auth()->user()->name }}</b>
        </div>
    </div>
</div>
@elseif(auth()->user()->id_role == 2)
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            Selamat Datang <b>{{ auth()->user()->name }}</b>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <b>TIDAK JELAS</b>
        </div>
    </div>
</div>
@endif --}}

<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $jumlah_data_buku }}</h3>

          <p>New Books</p>
        </div>
        <div class="icon">
          <i class="ion-ios-book"></i>
        </div>
        <a href="/buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    @if(auth()->user()->id_role == 1)
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $jumlah_data_user }}<sup style="font-size: 20px"></sup></h3>

          <p>Petugas</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="/petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @elseif(auth()->user()->id_role == 2)
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $jumlah_data_pinjam }}<sup style="font-size: 20px"></sup></h3>

            <p>Data Pinjam</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="/petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    @endif

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $jumlah_data_anggota }}</h3>

          <p>Anggota</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @if(auth()->user()->id_role == 1)
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $jumlah_data_transaksi }}</h3>

          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    @elseif(auth()->user()->id_role == 2)
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>Rp.{{ $jumlah_data_denda }},-</h3>

          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endif

  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-md-12">
        <!-- Bar chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>

            <h3 class="box-title">Bar Chart</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
              <div id="bar-chart" style="height: 300px; width: 100%"></div>
        </div>
        <!-- /.box-body-->
    </div>
    <!-- /.box -->


      </div>
      <!-- /.col -->

  </div>



@endsection
@section('page_scripts')
<?php $sekarang = date("Y");  ?>
<script>
    $(function () {
        var bar_data = {
  data : [
      ['January', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "01")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['February',<?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "02")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['March', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "03")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['April', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "04")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['May', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "05")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['June', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "06")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['July', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "07")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['August', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "08")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['September', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "09")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['October', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "10")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['November', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "11")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>],
      ['Desember', <?php $data = DB::table('transaksi')->whereMonth('tanggal_pinjam', "12")->whereYear('tanggal_pinjam', $sekarang)->count(); echo $data ?>]
    ],
  color: '#3c8dbc'
}
$.plot('#bar-chart', [bar_data], {
  grid  : {
    borderWidth: 1,
    borderColor: '#f3f3f3',
    tickColor  : '#f3f3f3'
  },
  series: {
    bars: {
      show    : true,
      barWidth: 0.5,
      align   : 'center'
    }
  },
  xaxis : {
    mode      : 'categories',
    tickLength: 0
  }
})
    })
</script>
@endsection
