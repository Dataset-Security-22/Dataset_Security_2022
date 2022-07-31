
@extends("Layout.v_template")
@section('title','edit kategori')
@section('content-header')
<h1>
    @yield('title')
    <small>@yield('title')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Buku</a></li>
    <li class="active">@yield('title')</li>
  </ol>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data @yield('title')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/kategori/update" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_kategori" value="{{ $edit->id_kategori }}">
                    <div class="form-group">
                        <label for="">Nama kategori</label>
                        <input type="text" class="form-control"  name="nama_kategori" placeholder="Masukan nama kategori" value="{{ $edit->nama_kategori }}">
                        <div class="text-danger">
                            @error('nama_kategori')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kategori</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Kategori</th>
                            <th>Label</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no =1; ?>
                    @foreach ($kategori as $data )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama_kategori}}</td>
                            <td>
                                {{-- <a href="/buku/detail/{{ $data->id_kategori }}" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a> --}}
                                {{-- <a href="/buku/edit/{{ $data->id_kategori }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> --}}
                                <form action="/kategori/hapus" method="POST" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_kategori" value="{{ $data->id_kategori }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @endsection


