
@php
use Carbon\Carbon;
// $order_from = json_decode($detail->delivery_data);
@endphp
@extends("Layout.v_template")
@section('title',' Detail Pesanan')
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
                <h3 class="box-title">Pesanan</h3>
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
                            <th>Data Order</th>
                            <th></th>
                            <th>Pesanan</th>
                        </tr>


                    </thead>

                    <tbody>

                        <tr >
                            <td >Nomer</td>
                            <td ></td>

                            <td>
                                @if(empty($detail->order_number))
                                <i>
                                    <b>NULL</b>
                                </i>
                                @else
                                {{ $detail->order_number }}
                                @endif
                            </td>
                        </tr>
                        <tr >
                            <td >Tanggal</td>
                            <td ></td>
                            <td >@if(empty($detail->order_date))
                                <i>
                                    <b>NULL</b>
                                </i>
                                @else
                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $detail->order_date)->isoFormat('dddd, D MMMM Y H:mm:s') }}</a>
                                @endif</td>
                                {{-- <td >{{ $detail->payment_date }}</td> --}}
                            </tr>
                            <tr >
                                <td >Item</td>
                                <td ></td>
                                <td>
                                    @if(empty($detail->order_status))
                                    <i>
                                        <b>NULL</b>
                                    </i>
                                    @else
                                    {{ $detail->order_status }}
                                    @endif
                                </td>
                            </tr>
                            <tr >
                                <td >Harga</td>
                                <td ></td>
                                <td>
                                    @if(empty($detail->total_price))
                                    <i>
                                        <b>NULL</b>
                                    </i>
                                    @else
                                    {{ $detail->total_price}}
                                    @endif
                                </td>
                            </tr>
                            <tr >
                                <td >Methode Pembayaran</td>
                                <td ></td>
                                <td >@if(empty($detail->payment_method))
                                    <span>tranfer bank</span>
                                    @elseif($detail->order_status !=2)
                                    <span >COD</span>
                                    @elseif($detail->order_status !=1)
                                    <span >dikonfirmasi</span>
                                    @endif
                                </tr>

                                <tr >
                                    <td >Status</td>
                                    <td ></td>
                                    <td >@if(empty($detail->order_status))
                                        <span class="badge bg-green">menunggu pembayaran</span>
                                        @elseif($detail->order_status !=2)
                                        <span class="badge bg-green">menunggu pembayaran</span>
                                        @elseif($detail->order_status !=1)
                                        <span class="badge bg-green">dikonfirmasi</span>
                                        @endif
                                    </td>
                                    <td >{{ $detail->confirmed_date }}</td>
                                </tr>



                                <td >
                                    <div class="card-footer">
                                        <form action="http://localhost/toko-sayur/index.php/admin/orders/status" method="POST">
                                            <input type="hidden" name="order" value="12">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <select class="form-control" id="status" name="status">
                                                            <option value="2" >Dalam proses</option>
                                                            <option value="3" >Dalam pengiriman</option>
                                                            <option value="4" >Selesai</option>
                                                            <option value="5" >Batalkan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="text-right">
                                                        <input type="submit" value="OK" class="btn btn-md btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- /.box-body -->




        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Penerima</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>

                        </div>

                        <div class="box-body">
                            <table id="" class="table table-hover">

                                <tbody>

                                    <tr >
                                        <td >Nama</td>
                                        <td ></td>
                                        <td >{{$detail->getCustomer->name}}</td>

                                    </tr>

                                    <tr >
                                        <td >No.hp</td>
                                        <td ></td>
                                        <td >{{$detail->getCustomer->phone_number}}</td>
                                    </tr>
                                    <tr >
                                        <td >alamat</td>
                                        <td ></td>
                                        <td >{{$detail->getCustomer->address}}</td>
                                    </tr>





                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Barang Dalam Pesanan</h3>
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







                                </thead>

                                <tbody>

                                    <tr >
                                        <td >Gambar</td>
                                        <td ></td>
                                        <td ><img class="img img-fluid rounded" style="width: 60px; height: 60px;"  src="http://localhost/toko-sayur/assets/uploads/products/https://bit.ly/3rwd97G"></td>
                                        {{-- <td >{{$products->picture_name}}</td> --}}
                                    </tr>
                                    <tr >
                                        <td >Produk</td>
                                        <td ></td>
                                        <td >{{$products->name}}</td>
                                    </tr>
                                    <tr >
                                        <td >Jumlah Beli</td>
                                        <td ></td>
                                        <td >{{$detail->total_items}}</td>
                                    </tr>
                                    <tr >
                                        <td >Harga Satuan</td>
                                        <td ></td>
                                        <td >{{$products->price}}</td>
                                    </tr>






                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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


