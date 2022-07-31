@extends("Layout.v_template")
@section('title','Tambah Role')
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
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data @yield('title')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/role/insert" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama role" value="{{ old('nama') }}">
                        <div class="text-danger">
                            @error('nama')
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
</div>

@endsection
