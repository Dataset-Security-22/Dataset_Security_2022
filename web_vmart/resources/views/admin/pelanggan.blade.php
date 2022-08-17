
@extends("Layout.v_template")
@section('title','Pelanggan')
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
<div class="row">
    <div class="col-xs-12">

        {{-- <p><a href="anggota/add" class=" btn btn-primary btn-sm"style="width: 150px;"><i class="fa fa-plus"></i>Tambah @yield('title')</a></p> --}}


        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> success</h4>
            {{  session("pesan")  }}
        </div>
        @endif
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
                            <th>No</th>

                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>AKsi</th>



                        </tr>
                    </thead>

                    <tbody>
                        <?php $no =1; ?>
                        @foreach ($customers as $data )
                        <tr>
                            <td>{{ $no++ }}</td>

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->getUser->email }}</td>
                            <td>{{ $data->phone_number }}</td>
                            <td>{{ $data->address }}</td>
                            <td><button type="button"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                <i class="fa fa-trash"></i>
                            </button></td>
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

@foreach ( $customers as $data)


<div class="modal modal-danger fade" id="delete{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ $data->name }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin {{$data->name}} ini!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="pelanggan/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    @endsection


