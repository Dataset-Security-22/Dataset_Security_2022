@extends('layouts.mainadmin')

@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('topbar')
@include('layouts.topbar')
@endsection
@section('content')
@if (session('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Berhasil
        </div>
    </div>
</div>
@endif

<!-- Page Heading -->
<div class="row">
    <div class="col-md-11">
        <h1 class="h3 mb-2 text-gray-800">Data Ket Panitia</h1>
    </div>
    <div class="col-md-1">
        <a href="/admin/tambahketpanitia" class="btn btn-success">
            Tambah
        </a>
    </div>
</div>

<br>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables KetPanitia</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan Panitia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tfoot>
                </tfoot>

                <tbody>
                    @php $no = 0 @endphp
                    @foreach($data_ketpanitia as $ketpanitia)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $ketpanitia->ket_panitia }}</td>
                        <td class="d-flex">
                            <form method="POST" action="{{ url('deleteketpanitia') }}/{{ $ketpanitia->id }}">
                                <a class="btn btn-warning btn-sm"
                                    href="{{ url('/admin/editketpanitia') }}/{{ $ketpanitia->id }}">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button onclick=" return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class="btn-danger btn-sm">
                                    Hapus
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit KetPanitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            {{-- <form action="/admin" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan Panitia</label>
                        <input type="text" class="form-control" id="keterangan" name="ketpanitia">
                        <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#edit').click(function () {
            let id = $(this).data('id');
            let ketpanitia = $(this).data('ketpanitia');

            $("#id").val(id)
            $("#keterangan").val(ketpanitia)
        })
    })
</script> --}}
