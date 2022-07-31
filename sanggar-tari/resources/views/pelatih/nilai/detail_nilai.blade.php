@extends("layouts.template_pelatih")

@section('title')
  Data Nilai
@stop

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/pelatih/nilai/tambah/') }}">
            {{ csrf_field() }}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_murid" value="{{ $detail->id }}">
                    <div class="form-group">
                        <label for="id_murid" >Nama</label>
                        <input readonly type="text" name="" value="{{ $detail->nama_murid }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis_tari" >Jenis Tari</label>
                        <select name="jenis_tari" id="jenis_tari" class="form-control" required>
                        <option disabled required>  Jenis Tari  </option>
                        @foreach ($data_kategori_tari as $tari)
                            <?php
                                $data_tari = DB::table("nilai")
                                ->where("id_murid", $detail->id)        
                                ->where("jenis_tari", $tari->nama_kategori_tari)
                                        ->first();
                            ?>
                            @if($data_tari)

                            @else
                            <option value="{{ $tari-> nama_kategori_tari }}">
                                {{ $tari->nama_kategori_tari }}
                            </option>
                            @endif

                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai" >Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm">
                        <span class="fa fa-plus"></span>
                        Tambah
                    </button>
                    <button type="reset" class="btn btn-default btn-sm float-right">
                        <span class="fa fa-refresh"></span>
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    Data Nilai
                </h3>
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jenis Tari</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        
                        @foreach($data_nilai as $nilai)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">{{ $nilai->getMurid->nama_murid }}</td>
                            <td class="text-center">{{ $nilai->jenis_tari }}</td>
                            <td class="text-center">{{ $nilai->nilai }}</td>
                            <td class="text-center">
                                <button onclick="editNilai({{$nilai->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                <i class="fa fa-edit"></i> Edit
                                </button>
                                <form method="POST" action="{{ url('/pelatih/nilai/hapus') }}" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $nilai->id }}">
                                    <button onclick="return confirm('Ingin di Hapus ?')" type="submit" class="btn btn-danger btn-sm" >
                                        <span class="fa fa-trash"> Hapus </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/pelatih/nilai/simpan') }}">
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

@endsection

@section("scripts_js")

<script>
    function editNilai(id)
    {
        $.ajax({
            url : "{{ url('/pelatih/nilai/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }
</script>



@endsection




