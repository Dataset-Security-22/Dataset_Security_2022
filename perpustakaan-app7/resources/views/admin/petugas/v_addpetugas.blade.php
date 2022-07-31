@extends('Layout.v_template')
@section('title', 'Tambah Petugas')
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
    <!-- left column -->
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title">@yield('title')</h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/petugas/insert" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="box-body">

            <div class="form-group">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" class="form-control"  name="name" placeholder="nama petugas" value="{{ old('name') }}">
              <div class="text-danger">
                @error('name')
                {{ $message }}
                  @enderror
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                <div class="text-danger">
                  @error('email')
                  {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Role</label>
                <select class="form-control select2" name="id_role">
                    <option>-Pilih-</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->id_role }}">
                            {{ $r->nama }}
                        </option>
                    @endforeach
                </select>
                <div class="text-danger">
                    @error('pengarang')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                <div class="text-danger">
                  @error('password')
                  {{ $message }}
                    @enderror
                </div>
            </div>


          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
    </div>
</div>

@endsection
