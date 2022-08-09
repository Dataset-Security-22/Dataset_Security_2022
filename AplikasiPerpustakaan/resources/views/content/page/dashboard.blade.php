@extends ("content.page.layouts.template")

@section("page_title", "Dashboard")

@section("page_header") <i class="fa fa-dashboard"></i> Dashboard @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
  <li class="active">Dashboard</li>
</ol>

@stop

@section("page_title","Dashboard")

@section("page_content")

@if(session("sukses"))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <strong>Berhasil!</strong> {{ session("sukses") }}.
    </div>
  </div>
</div>
@endif

@if(session("error"))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <strong>Gagal!</strong> {{ session("error") }}.
    </div>
  </div>
</div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Selamat Datang <b>{{ Auth::user()->name }}</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <p>
          di <strong>Aplikasi {{ config("app.myapp") }} </strong>. Silahkan pilih menu untuk memulai program.
        </p>
      </div>
    </div>
  </div>
</div>

@if(Auth::user()->level == 1)
<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ $total_kategori }}</h3>

        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fa fa-bars"></i>
      </div>
      <a href="{{ url('/kategori') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $total_rak }}</h3>

        <p>Rak</p>
      </div>
      <div class="icon">
        <i class="fa fa-building"></i>
      </div>
      <a href="{{ url('/rak') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $total_anggota }}</h3>

        <p>Anggota</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="{{ url('/anggota') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $total_buku }}</h3>

        <p>Buku</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="{{ url('/buku') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ $total_peminjam }}</h3>

        <p>Pinjam Buku</p>
      </div>
      <div class="icon">
        <i class="fa fa-gavel"></i>
      </div>
      <a href="{{ url('/pinjam') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>{{ $total_pengembalian }}</h3>

        <p>Pengembalian Buku</p>
      </div>
      <div class="icon">
        <i class="fa fa-sign-out"></i>
      </div>
      <a href="{{ url('/pengembalian') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
@else
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-area-chart"></i> Data Peminjaman Buku Tanggal <b>{{ date("d - m - Y") }}</b></h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">NIM</th>
              <th>Nama</th>
              <th class="text-center">Prodi</th>
              <th class="text-center">Kode</th>
              <th>Judul</th>
              <th class="text-center">Tanggal Pinjam</th>
              <th class="text-center">Tanggal Kembali</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 0 @endphp

            @foreach($data_peminjaman as $pinjam)
            <tr>
              <td class="text-center">{{ ++$no }}.</td>
              <td class="text-center">{{ $pinjam->data_anggota->nim }}</td>
              <td>{{ $pinjam->data_anggota->nama }}</td>
              <td class="text-center">{{ $pinjam->data_anggota->prodi->nama_prodi }}</td>
              <td class="text-center">{{ $pinjam->data_buku->kode }}</td>
              <td>{{ $pinjam->data_buku->judul }}</td>
              <td class="text-center">{{ $pinjam->tgl_pinjam }}</td>
              <td class="text-center">{{ $pinjam->tgl_kembali }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif



@endsection