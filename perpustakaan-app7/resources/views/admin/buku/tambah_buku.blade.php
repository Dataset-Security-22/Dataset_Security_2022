@extends('Layout.v_template')
@section('title', 'Tambah Buku')
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
    <!-- left column -->
    <div class="col-xs-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">

                <h3 class="box-title">@yield('title')</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/buku/insert" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode buku</label>
                        <input type="text" class="form-control"   name="kode_buku" placeholder="kode buku" value="{{ old('kode_buku') }}">
                        <div class="text-danger">
                            @error('kode_buku')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Judul</label>
                        <input type="text" class="form-control"  name="judul" placeholder="Judul" value="{{ old('judul') }}">
                        <div class="text-danger">
                            @error('judul')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Kategori</label>
                        <select class="form-control select2" name="id_kategori">
                            <option></option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">
                                {{ $k->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_kategori')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" value="{{ old('pengarang') }}">
                        <div class="text-danger">
                            @error('pengarang')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun Terbit</label>
                        <input type="year" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" value="{{ old('tahun_terbit') }}">
                        <div class="text-danger">
                            @error('tahun_terbit')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" value="{{ old('penerbit') }}">
                        <div class="text-danger">
                            @error('penerbit')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input type="text" class="form-control" name="stok" placeholder="Stok" value="{{ old('stok') }}">
                        <div class="text-danger">
                            @error('stok')
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
