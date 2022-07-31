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
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-edit"></i> Absensi Tanggal : <b><?php echo date("d - m - Y") ?></b>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">NIM</th>
                <th>Nama</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Alfa</th>
                <th class="text-center">Terlambat</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp
              @foreach($data_divisi as $absen)
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $absen->getAnggota->nim }}</td>
                <td>{{ $absen->getAnggota->nama }}</td>
                <td class="text-center">
                  <?php
                    $j_hadir = DB::table("tb_absensi")
                          ->where("nim_anggota", $absen->getAnggota->nim)
                          ->where("status_absen", 1)
                          ->count();

                    echo $j_hadir;
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    $j_sakit = DB::table("tb_absensi")
                          ->where("nim_anggota", $absen->getAnggota->nim)
                          ->where("status_absen", 2)
                          ->count();

                    echo $j_sakit;
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    $j_izin = DB::table("tb_absensi")
                          ->where("nim_anggota", $absen->getAnggota->nim)
                          ->where("status_absen", 3)
                          ->count();

                    echo $j_izin;
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    $j_alfa = DB::table("tb_absensi")
                          ->where("nim_anggota", $absen->getAnggota->nim)
                          ->where("status_absen", 4)
                          ->count();

                    echo $j_alfa;
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    $j_terlambat = DB::table("tb_absensi")
                          ->where("nim_anggota", $absen->getAnggota->nim)
                          ->where("status_absen", 5)
                          ->count();

                    echo $j_terlambat;
                  ?>
                </td>
                <td class="text-center">
                  <a href="{{ url('/page/bph/laporan/data_absen') }}/{{ $absen->id_divisi }}/detail" class="btn btn-success btn-sm">
                    <i class="fa fa-search"></i> Detail
                  </a>
                </td>
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