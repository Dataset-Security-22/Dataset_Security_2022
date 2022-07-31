@extends('Layout.v_template')
@section('title','Petugas')
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
        <p><a href="/petugas/add" class=" btn btn-primary btn-sm"style="width: 150px;"><i class="fa fa-plus"></i>Tambah Petugas</a></p>
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
        <div class="box-body table-responsive ">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              {{-- <th>Password</th> --}}
              <th>Role</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $no =1; ?>
            @foreach ( $users as $data )

                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->name }}
                  </td>
                  <td>{{ $data->email }}</td>
                  {{-- <td>{{ $data->password }}</td> --}}
                  <td>{{ $data->getRole->nama }}</td>
                  {{-- <td>1</td> --}}
                  <td>
                      <a href="/petugas/edit/{{ $data->id }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      {{-- <a href="" class="btn btn-sm btn-primary">tambah</a> --}}
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
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
      @foreach ( $users as $data)


      <div class="modal modal-danger fade" id="delete{{ $data->id }}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $data->name }}</h4>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus petugas ini!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <a href="petugas/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
@endsection
