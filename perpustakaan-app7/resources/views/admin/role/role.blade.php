@extends('Layout.v_template')
@section('title','Role')
@section('content-header')
<h1>
    @yield('title')
    <small>@yield('title')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">@yield('title')</li>
  </ol>
@endsection
@section('content')

<div class="row">

    <div class="col-xs-12">
        <p><a href="/role/add" class="btn btn-sm btn-primary">Tambah @yield('title')</a></p>
        {{-- <p><a href="/role/add" class=" btn btn-primary btn-sm"style="width: 150px;">Tambah Petugas</a></p> --}}
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">data @yield('title')</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                {{-- <th>Email</th>
                <th>Password</th> --}}
                <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php $no =1; ?>
            @foreach ( $roles as $data )

                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama }}
                  </td>

                  <td>
                      <a href="/role/edit/{{ $data->id_role }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_role }}">
                        <i class="fa fa-trash"></i>
                      </button>
                </td>
                </tr>


            @endforeach
            </tbody>

          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      @foreach ( $roles as $data)


      <div class="modal modal-danger fade" id="delete{{ $data->id_role }}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $data->nama }}</h4>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus @yield('title') ini!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="role/hapus/{{ $data->id_role }}" class="btn btn-outline">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
@endsection
