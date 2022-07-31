@extends("page.layouts.template_bph")

@section("page_title", "Data Absen Per Tanggal")

@section("page_scripts")

<script type="text/javascript">
  function editAbsenPerTanggal(id_absensi) {
    $.ajax({
      url : "{{ url('/page/bph/edit_absen_pertanggal') }}",
      type : "GET",
      data : { id_absensi : id_absensi },
      success : function(data) {
        $("#modal-content-edit").html(data);
        return true;
      }
    });
  }
</script>

@endsection

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
            <i class="fa fa-edit"></i> Data Keseluruhan
          </h3>
          <a class="pull-right" data-toggle="modal" data-target="#modal-default" type="button">
            <i class="fa fa-plus"></i> Tambah Data
          </a>
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
              @foreach($data_absen as $absen)
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $absen->getAnggota->nim }}</td>
                <td>{{ $absen->getAnggota->nama }}</td>
                <form method="POST" action="{{ url('/page/bph/update_data_absen') }}">
                  {{ csrf_field() }}
                  <td class="text-center">
                    @if($absen->status_absen == 1)
                    Hadir
                    @elseif($absen->status_absen == 2)
                    Sakit
                    @elseif($absen->status_absen == 3)
                    Izin
                    @elseif($absen->status_absen == 4)
                    Alfa
                    @elseif($absen->status_absen == 5)
                    Terlambat
                    @else
                    Tidak Ada
                    @endif
                  </td>
                  <td>
                    {{ $absen->keterangan }}
                  </td>
                  <td class="text-center">
                    <button onclick="editAbsenPerTanggal({{$absen->id_absensi}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit" type="button">
                      <i class="fa fa-edit"></i> Edit
                    </button>
                  </td>
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

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fa fa-plus"></i> Tambah Data
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/page/bph/simpan_data_absen_pertanggal') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
              <label for=""> Nama Anggota </label>
              <select class="form-control select2bs4" name="nim_anggota" style="width: 100%;">
                <option selected="selected"> - Pilih - </option>
                @foreach($data_divisi as $divisi)
                <option value="{{ $divisi->getAnggota->nim }}">
                  {{ $divisi->getAnggota->nama }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label> Status Absen </label>
              <select class="form-control" name="status_absen">
                <option value="">- Pilih -</option>
                <option value="1"> Hadir </option>
                <option value="2"> Sakit </option>
                <option value="3"> Izin </option>
                <option value="4"> Alfa </option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label> Tanggal Absen </label>
          <input type="date" class="form-control" name="tanggal_absen">
        </div>
        <div class="form-group">
          <label> Keterangan </label>
          <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <i class="fa fa-refresh"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-plus"></i> Tambah
        </button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- END -->

<!-- Tambah Data -->
<div class="modal fade" id="modal-default-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fa fa-edit"></i> Edit Data
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/page/bph/edit_data_absen_pertanggal') }}">
        {{ csrf_field() }}
        <div class="modal-body" id="modal-content-edit">

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-refresh"></i> Batal
          </button>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END -->

@endsection