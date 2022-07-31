@extends("page.layouts.template_bph")

@section("page_title", "Laporan Data Absen")

@section("content_header")

<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> Laporan Data Absen </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ url('/page/bph/dashboard') }}"> Dashboard </a>
        </li>
        <li class="breadcrumb-item active"> Laporan Data Absen </li>
      </ol>
    </div>
  </div>
</div>

@endsection

@section("content")

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            @if($detail->getAnggota->gambar == NULL)
            <img class="profile-user-img img-fluid img-circle" src="{{ url('/gambar/gambar_user.png') }}">
            @else
            <img class="profile-user-img img-fluid img-circle" src="{{ url('/storage/'.$detail->getAnggota->gambar) }}" alt="{{ $detail->getAnggota->nama }}">
            @endif
          </div>

          <h3 class="profile-username text-center">{{ $detail->getAnggota->nama }}</h3>
          <p class="text-muted text-center">{{ $detail->getAnggota->nim }}</p>
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Jenis Kelamin</b> <a class="float-right"> {{ $detail->getAnggota->jenis_kelamin }} </a>
            </li>
            <li class="list-group-item">
              <b>No. Handphone</b> <a class="float-right"> {{ $detail->getAnggota->no_hp }} </a>
            </li>
            <li class="list-group-item">
              <b>Agama</b> <a class="float-right"> {{ $detail->getAnggota->agama }} </a>
            </li>
          </ul>
          <a href="{{ url('/page/bph/laporan/data_absen') }}" class="btn btn-danger btn-sm btn-block">
            <i class="fa fa-sign-in"></i> Kembali
          </a>
        </div>
      </div>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail Data</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong> Bagian</strong>

          <p class="text-muted">
            {{ $detail->getBagian->nama_bagian }}
          </p>

          <hr>

          <strong> Divisi </strong>

          <p class="text-muted">
            {{ $detail->getJabatan->nama_jabatan }}
          </p>

          <hr>

          <strong>Alamat</strong>

          <p class="text-muted">
            {{ $detail->getAnggota->alamat }}
          </p>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tanggal Absen</th>
                <th class="text-center">Status</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp

              <?php
                $data_absen = DB::table("tb_absensi")
                      ->where("nim_anggota", $detail->getAnggota->nim)
                      ->get();
              ?>
              @foreach($data_absen as $data)
                <tr>
                  <td class="text-center">{{ ++$no }}.</td>
                  <td class="text-center">{{ $data->tanggal_absen }}</td>
                  <td class="text-center">
                    @if($data->status_absen == 1)
                    Hadir
                    @elseif($data->status_absen == 2)
                    Sakit
                    @elseif($data->status_absen == 3)
                    Izin
                    @elseif($data->status_absen == 4)
                    Alfa
                    @elseif($data->status_absen == 5)
                    Terlambat
                    @endif
                  </td>
                  <td>{{ $data->keterangan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection