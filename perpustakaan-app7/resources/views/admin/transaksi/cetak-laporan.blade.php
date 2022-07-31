@extends('Layout.v_template')
@section('title','Laporan')
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
        <form role="form" action="/cetak-data-pertanggal/{tglawal}/{tglahir}" method="POST" >
            @csrf
          <div class="box-body">

            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Awal</label>
              <input type="date" class="form-control"  name="tglawal" placeholder="tanggal awal" >
              <div class="text-danger">
                @error('tglawal')
                {{ $message }}
                  @enderror
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tglahir" placeholder="Tanggal Akhir" >
                <div class="text-danger">
                  @error('email')
                  {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tglawal').value +'/'+document.getElementById('tglahir').value" target="_blank" class="btn btn-primary col-md-12">vhhvhchgc</a>
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
