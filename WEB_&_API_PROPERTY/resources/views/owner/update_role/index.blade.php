@extends("layouts.template_owner")

@section('title')
  Data Akun
@stop

@section("content")

<div class="row">

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Role
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Akun</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                     @php $no = 0 @endphp
                     @foreach($data_akun as $akun)
                     <tr class="text-center">
                        <td>{{ ++$no }}</td>
                        <td>{{ $akun->name }}</td>
                        <td>{{ $akun->email }}</td>
                        <td>
                            @if (empty($akun->getRole->nama_role))
                                <b>
                                    <i>
                                        NULL
                                    </i>
                                </b>
                            @else
                            {{$akun->getRole->nama_role}}
                            @endif
                        </td>
                        <td>
                            <button onclick="editSyarat({{ $akun->id }})" type="button" class="btn btn-success text-white btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Detail Data">
                                <i class="fa fa-clipboard"> Edit </i>
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

<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/owner/update_role/simpan') }}">
                @method("PUT")
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

@section("scripts_js")

<script type="text/javascript">
    function editSyarat(id)
    {
        $.ajax({
            url : "{{ url('owner/update_role/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

</script>
<script src="{{ url('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
@if (session('message'))
        {!! session('message') !!}
@endif

@endsection
