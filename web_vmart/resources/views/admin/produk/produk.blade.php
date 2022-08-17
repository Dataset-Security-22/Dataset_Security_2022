
@extends("Layout.v_template")
@section('title',' Produk')
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
<p><a href="produk/add" class=" btn btn-primary btn-sm"style="width: 150px;"><i class="fa fa-plus"></i>Tambah @yield('title')</a></p>
<div class="row">
    @foreach ($products as $data)

    <div class="col-md-3">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data->name}}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->


            <div class="box-body">

                <div class="text_center">

                </div>
                <table id="" class="table table-hover">
                    <thead>
                        <tr>
                            <td class="text-center">
                                <img src="{{ url('/storage/'.$data->picture_name) }}" alt="" width="180px" height="150px">
                            </td>
                        </tr>

                        <tr>


                            <td class="text-center" style="justify">{{$data->stock}} {{$data->product_unit }} / {{$data->price}}</td>

                        </tr>
                        <tr>
                            <td class="text-center">
                             <a href="/produk/detail/{{encrypt($data->id)}}" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a>
                           <a href="/produk/edit/{{encrypt($data->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="button"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            </td>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>



            </div>
        </div>

    </div>
    @endforeach

    @foreach ( $products as $data)


<div class="modal modal-danger fade" id="delete{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ $data->name }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus {{$data->name}} ini!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="produk/hapus/{{ $data->id }}" class="btn btn-outline">Yes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    @endsection


