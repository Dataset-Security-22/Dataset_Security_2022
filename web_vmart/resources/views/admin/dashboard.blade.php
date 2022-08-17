@extends('Layout.v_template')
@section('title',' Dashboard')
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
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h1>{{ $jumlah_product }}</h1>
                    <h1>Product</h1>


                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">jumlah product yang tersedia<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h1>{{ $jumlah_customer}}</h1>
                    <h1>Pelanggan</h1>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Pelanggan yang  terdaftar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h1>{{ $jumlah_order }}</h1>
                    <h1>Pesanan</h1>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Jumlah pesanan diterima <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h1>Rp{{ $jumlah_payment }}</h1>
                    <h1>Pendapatan</h1>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Total pendapatan <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
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
            {{-- <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Produk baru</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="http://localhost/toko-sayur/index.php/admin/products" class="btn btn-sm btn-primary">Lihat semua</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->

                </div>
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-5">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data @yield('title')</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive ">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no =1; ?>
                                    @foreach ($products as $data )
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ $data->stock }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
@section('page_scripts')
<?php
$sekarang = 2021;
?>
<script>
    $(function () {
        var bar_data = {
            data : [
            ['January', <?php $data = DB::table('orders')->whereMonth('order_date', "01")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['February',<?php $data = DB::table('orders')->whereMonth('order_date', "02")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['March', <?php $data = DB::table('orders')->whereMonth('order_date', "03")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['April', <?php $data = DB::table('orders')->whereMonth('order_date', "04")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['May', <?php $data = DB::table('orders')->whereMonth('order_date', "05")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['June', <?php $data = DB::table('orders')->whereMonth('order_date', "06")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['July', <?php $data = DB::table('orders')->whereMonth('order_date', "07")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['August', <?php $data = DB::table('orders')->whereMonth('order_date', "08")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['September', <?php $data = DB::table('orders')->whereMonth('order_date', "09")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['October', <?php $data = DB::table('orders')->whereMonth('order_date', "10")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['November', <?php $data = DB::table('orders')->whereMonth('order_date', "11")->whereYear('order_date', $sekarang)->count(); echo $data ?>],
            ['Desember', <?php $data = DB::table('orders')->whereMonth('order_date', "12")->whereYear('order_date', $sekarang)->count(); echo $data ?>]
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

