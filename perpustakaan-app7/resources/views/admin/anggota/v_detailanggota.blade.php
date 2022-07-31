@extends("Layout.v_template")
@section('title','Detail anggota')
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
<p><a href="/anggota" class="btn btn-success tbn-sm">Kembali</a></p>
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data @yield('title')</h3>

        </div>
        <!-- /.box-header -->

        <form role="form">

            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIS</label>
                    <input type="text" class="form-control" value="{{ $anggota->nis }}" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama anggota</label>
                    <input type="text" class="form-control" value="{{ $anggota->nama_anggota }}" readonly>

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" value="{{ $anggota->alamat }}" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="{{ $anggota->ttl_anggota }}" readonly>

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">No Hp</label>
                    <input type="text" class="form-control"  value="{{ $anggota->no_hp }}" readonly>

                </div>
            </div>


            </div>
            <!-- /.box-body -->


        </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
@endsection
