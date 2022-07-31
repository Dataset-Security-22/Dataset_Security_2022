@extends("layouts.template_pelatih")

@section('title')
  Data Nilai
@stop

@section("content")

<div class="row">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">
                    Data Nilai
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jenis Tari</th>
                            <th class="text-center">Nilai</th>
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




