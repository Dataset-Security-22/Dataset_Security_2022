
@php
use Carbon\Carbon;
$payment_from = json_decode($detail->payment_data);
@endphp
@extends("Layout.v_template")
@section('title',' Detail Pembayaran')
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
@section("page_scripts")

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session("gagal"))

<script>
    Swal.fire(
    'Gagal!',
    '{{ session("gagal") }}',
    'error'
    )
</script>

@elseif(session("sukses"))

<script>
    Swal.fire(
    'Berhasil!',
    '{{ session("sukses") }}',
    'success'
    )
</script>

@endif

@endsection

@section('content')
<div class="row">

        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Pembayaran</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="" class="table table-hover">
                        <thead>




                            <tr>
                                <th></th>
                                <th></th>
                                <th>Pembayaran</th>
                            </tr>


                        </thead>

                        <tbody>

                            <tr >
                               <td >Transfer</td>
                               <td ></td>
                               <td >{{$detail->payment_price}}</td>
                            </tr>
                            <tr >
                               <td >Tanggal</td>
                               <td ></td>
                               <td >@if(empty($detail->payment_date))
                                <i>
                                    <b>NULL</b>
                                </i>
                                @else
                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $detail->payment_date)->isoFormat('dddd, D MMMM Y H:mm:s') }}</a>
                                @endif</td>
                               {{-- <td >{{ $detail->payment_date }}</td> --}}
                            </tr>
                            <tr >
                               <td >Status</td>
                               <td ></td>
                               <td >@if(empty($detail->payment_status))
                                <span class="badge bg-green">menunggu dikonfirmasi</span>
                                @elseif($detail->payment_status !=2)
                                <span class="badge bg-green">menunggu dikonfirmasi</span>
                                @elseif($detail->payment_status !=1)
                                <span class="badge bg-green">dikonfirmasi</span>
                                @endif
                            </td>
                               <td >{{ $detail->confirmed_date }}</td>
                            </tr>



                            <tr >
                               <td >Transfer ke</td>
                               <td ></td>
                               <td >{{ $payment_from->transfer_to }}</td>
                            </tr>
                            <tr >

                               <td >Transfer dari</td>
                               <td ></td>
                               <td >{{ $payment_from->source->bank }} a.n. {{ $payment_from->source->name }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



                <!-- /.box-body -->




        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bukti Pembayaran</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>

                        </div>

                        {{-- <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div> --}}

                    </div>
                    <div class="box-body">
                        <table id="" class="table table-hover">
                            <thead>


                                    <img src="http://127.0.0.1:8000/storage/https://bit.ly/3EmpJvm" width='100%' height='50%' >



                                <tr>
                                    <th></th>
                                    <th></th>

                                </tr>


                            </thead>
                        </div>



                        <div class="card-footer">
                            <form action="http://localhost/toko-sayur/index.php/admin/payments/verify" method="POST">
                            <input type="hidden" name="redir" value="1">

                            <div class="row">
                              <input type="hidden" name="id" value="7">
                              <input type="hidden" name="order" value="13">
                                <div class="col-md-9">
                                    <select class="form-control" name="action">
                                                                          <option value="1">Konfirmasi Pembayaran</option>
                                        <option value="2">Pembayaran Tidak Ada</option>
                                                                      </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <input type="submit" class="btn btn-primary" value="OK">
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        {{-- <div class="box-body">
                            <table id="" class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>
                                            <input type="file" class="form-control" name="picture_name" id='picture_name' placeholder="" value="">
                                            <div class="text-danger">
                                                @error('picture_name')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div> --}}
                        {{-- <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Oke</button>
                        </div> --}}
                    </div>

                </div>
            </form>

            @endsection


