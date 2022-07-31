@extends('Layout.v_template')
@section('title','Edit Petugas')
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
<p><a href="/petugas" class="btn btn-success tbn-sm">Kembali</a></p>
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
        <form role="form" action="/petugas/update/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control"   name="name" placeholder="Nama" value="{{ $edit->name }}">
              <div class="text-danger">
                @error('name')
                {{ $message }}
                  @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control"  name="email" placeholder="email" value="{{ $edit->email }}" >
              <div class="text-danger">
                @error('email')
                {{ $message }}
                  @enderror
              </div>
            </div>

            <div classs="form-group">
                <label for="id_role"> Role </label>
                <select class="form-control select2" name="id_role">
                    <option value="">- Pilih -</option>
                    @foreach($data_role as $role)
                        @if($role->id_role == $edit->id_role)
                        <option value="{{ $role->id_role }}" selected>
                            {{ $role->nama }}
                        </option>
                        @else
                        <option value="{{ $role->id_role }}">
                            {{ $role->nama }}
                        </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control"  name="password" placeholder="password" value="password">
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
