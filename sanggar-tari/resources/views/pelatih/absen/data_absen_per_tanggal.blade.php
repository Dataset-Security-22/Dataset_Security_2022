@extends("layouts.template_pelatih")

@section("scripts_js")

<script type="text/javascript">
  function editAbsen(id_absen)
  {
    $.ajax({
      url : "{{ url('/pelatih/absen/edit_absen') }}",
      type : "GET",
      data : { id_absen : id_absen },
      success : function(data) {
        $("#modal-content-edit").html(data);
        return true;
      }
    });
  }
</script>

@endsection

@section("header")
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">
      	Data Absen Keseluruhan
      </h1>
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
            <i class="fa fa-edit"></i> Data Absen </b>
          </h3>
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default">
            Tambah Data
          </button>
        </div>
        <div class="card-body">
          <table id="" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th>Nama Murid</th>
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
            		<td>{{ $absen->getMurid->nama_murid }}</td>
            		<td class="text-center">
            			@if($absen->status == 1)
                  Hadir
                  @elseif($absen->status == 2)
                  Sakit
                  @elseif($absen->status == 3)
                  Izin
                  @elseif($absen->status == 4)
                  Alfa
                  @else
                  Tidak Ada
                  @endif
                </td>
                <td class="text-center">{{ $absen->keterangan }}</td>
                <td class="text-center">
                  <button onclick="editAbsen({{$absen->id_absen}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
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
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/pelatih/absen/tambah_absen_pertanggal') }}">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_murid"> Nama Murid </label>
                <select required class="form-control select2" id="id_murid" name="id_murid" style="width: 100%;">
                  <option value="">- Pilih -</option>
                  @foreach($data_murid as $murid)
                  <option value="{{ $murid->id }}">
                    {{ $murid->nama_murid }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status"> Status </label>
                <select required  class="form-control" id="status" name="status">
                  <option value="">- Pilih -</option>
                  <option value="1">Hadir</option>
                  <option value="2">Sakit</option>
                  <option value="3">Izin</option>
                  <option value="4">Alfa</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="tanggal"> Tanggal </label>
            <input required type="date" class="form-control" id="tanggal" name="tanggal">
          </div>
          <div class="form-group">
            <label for="keterangan"> Keterangan </label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan"></textarea>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END -->

<!-- Tambah Data -->
<div class="modal fade" id="modal-default-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/pelatih/absen/simpan_data_edit_absen') }}">
        @csrf
        <div class="modal-body" id="modal-content-edit">    
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END -->

@endsection