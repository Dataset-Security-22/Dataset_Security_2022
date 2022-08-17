
@extends("Layout.v_template")
@section('title','Detail Produk')
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
    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Foto</h3>
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


                            <img src="{{ url('/storage/'.$produk->picture_name) }}" width='100%' height='50%' >



                        <tr>
                            <th></th>
                            <th></th>

                        </tr>


                    </thead>

                    <tbody>

                        <tr >
                           <td >Nama</td>
                           <td >:</td>
                           <td >{{ $produk->name }}</td>
                        </tr>
                        <tr >
                           <td >SKU</td>
                           <td >:</td>
                           <td >{{ $produk->sku }}</td>
                        </tr>
                        <tr >
                           <td >Harga</td>
                           <td >:</td>
                           <td >{{ $produk->price }}</td>
                        </tr>


                        <tr >
                           <td >Diskon</td>
                           <td >:</td>
                           <td >{{ $produk->name }}</td>
                        </tr>
                        <tr >
                           <td >Stok/Satuan</td>
                           <td >:</td>
                           <td >{{ $produk->name }}/{{ $produk->name }}</td>
                        </tr>
                        <tr >
                           <td >Deskripsi</td>
                           <td >:</td>
                           <td >{{ $produk->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> success</h4>
            {{  session("pesan")  }}
        </div>
        @endif
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Order</h3>
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
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no =1; ?>
                        @foreach ($order_items as $data )
                        <tr>
                            <td>{{ $no++ }}</td>

                            <td> @if(empty($data->getOrder->order_number))
                                <i>
                                    <b>NULL</b>
                                </i>
                                @else
                                <a href="/pembayaran/view/{{$data->getOrder->id}}">{{ $data->getOrder->order_number }}</a>
                                @endif</td>
                            <td> @if(empty($data->getOrder->getCustomer->name))
                                <i>
                                    <b>NULL</b>
                                </i>
                                @else
                                {{ $data->getOrder->getCustomer->name }}
                                @endif</td>
                            <td>{{$data->order_qty}}</td>
                            <td>{{$data ->order_price}}</td>
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


@endsection


