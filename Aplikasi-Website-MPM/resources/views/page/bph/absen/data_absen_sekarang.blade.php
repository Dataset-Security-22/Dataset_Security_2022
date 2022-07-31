@extends("page.layouts.template_bph")

@section("page_title", "Data Absen")

@section("content_header")

<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> Data Absen </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ url('/page/bph/dashboard') }}"> Dashboard </a>
        </li>
        <li class="breadcrumb-item active"> Data Absen Sekarang </li>
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
                <th class="text-center">Status</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp
              @foreach($data_divisi as $divisi)

              <?php
                $sekarang = date("Y-m-d");
                $data_absen = DB::table("tb_absensi")
                      ->where("nim_anggota", $divisi->nim_anggota)
                      ->where("tanggal_absen", $sekarang)
                      ->first();
              ?>
              <input type="hidden" value="{{ $divisi->getAnggota->nim }}" name="nim_anggota">
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $divisi->getAnggota->nim }}</td>
                <td>{{ $divisi->getAnggota->nama }}</td>
                <form id="quickForm" method="POST" action="{{ url('/page/bph/simpan_data_absen') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="nim_anggota" value="{{ $divisi->getAnggota->nim }}">
                  <td class="text-center">
                    <select class="form-control" name="status_absen" id="status_absen">
                      <option value="">- Pilih -</option>
                      <option value="1">Hadir</option>
                      <option value="2">Sakit</option>
                      <option value="3">Izin</option>
                      <option value="4">Alfa</option>
                    </select>
                  </td>
                  <td class="text-center">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
                  </td>
                  @if($data_absen)
                  <td class="text-center">
                    <button class="btn btn-success btn-sm" disabled>
                      Sudah Absen
                    </button>
                  </td>
                  @else
                  <td class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Tambah
                    </button>
                  </td>
                  @endif
                </form>
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

@section("page_scripts")

<script src="{{ url('/layouts') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ url('/layouts') }}/plugins/jquery-validation/additional-methods.min.js"></script>

<script>
$(function () {
  $('#quickForm').validate({
      rules: {
        status_absen : {
            required : true,
        },
        keterangan : {
            required : true,
        },
      },
      messages: {
        status_absen : {
          required: "Kolom tidak boleh kosong",
        },
        keterangan : {
          required : "Kolom tidak boleh kosong"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
      }
  });
});
</script>

@if(session("sukses"))
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  swal({
    title: "Berhasil!",
    text: "{{ session('sukses') }}",
    icon: "success",
    button: "OK",
  });

</script>

@endif

@endsection