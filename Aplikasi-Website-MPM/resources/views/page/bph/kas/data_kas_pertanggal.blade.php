@extends("page.layouts.template_bph")

@section("page_title", "Data KAS Pertanggal")

@section("page_scripts")

<script type="text/javascript">
  function editKasPerTanggal(id_kas) {
    $.ajax({
      url : "{{ url('/page/bph/kas/edit_kas_pertanggal') }}",
      type : "GET",
      data : { id_kas : id_kas },
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
      <h1 class="m-0"> Data KAS </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ url('/page/bph/dashboard') }}"> Dashboard </a>
        </li>
        <li class="breadcrumb-item active"> Data KAS Pertanggal </li>
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
            <i class="fa fa-edit"></i> Data KAS Keseluruhan
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
                <th class="text-center">Bayar</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 0 @endphp
              @foreach($data_kas as $kas)
              <tr>
                <td class="text-center">{{ ++$no }}.</td>
                <td class="text-center">{{ $kas->getAnggota->nim }}</td>
                <td>{{ $kas->getAnggota->nama }}</td>
                <td class="text-center">Rp. {{ number_format($kas->bayar) }}</td>
                <td>{{ $kas->keterangan }}</td>
                <td class="text-center">
                  <button onclick="editKasPerTanggal({{$kas->id_kas}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit" type="button">
                    <i class="fa fa-edit"></i> Edit
                  </button> 
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
      <form method="POST" action="{{ url('/page/bph/kas/tambah_kas_pertanggal') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="nim_anggota"> Nama Anggota </label>
            <select class="form-control select2bs4" name="nim_anggota" style="width: 100%;">
              <option selected="selected"> - Pilih - </option>
              @foreach($data_divisi as $divisi)
              <option value="{{ $divisi->getAnggota->nim }}">
                {{ $divisi->getAnggota->nama }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="bayar"> Bayar </label>
                <input type="number" class="form-control" id="bayar" name="bayar" placeholder="0" min="1000">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal"> Tanggal </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan"> Keterangan </label>
            <textarea class="form-control" name="keterangan" id="keterangan" rows="4" placeholder="Masukkan Keterangan"></textarea>
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
      <form method="POST" action="{{ url('/page/bph/kas/simpan_data_kas_pertanggal') }}">
        {{ csrf_field() }}
        <div class="modal-body" id="modal-content-edit">

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-refresh"></i> Batal
          </button>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-edit"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END -->

@endsection