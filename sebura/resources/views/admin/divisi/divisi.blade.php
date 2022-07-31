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
        <h1 class="h3 mb-2 text-gray-800">Data Divisi</h1>
    </div>
    <div class="col-md-1">
        <a href="/admin/tambahdivisi" class="btn btn-success">
            Tambah
        </a>
    </div>
</div>

<br>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Absensi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Divisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tfoot>
                </tfoot>

                <tbody>
                    @php $no = 0 @endphp
                    @foreach($data_divisi as $divisi)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $divisi->nama_divisi }}</td>
                        <td class="d-flex">
                            <form method="POST" action="{{ url('deletedivisi') }}/{{ $divisi->id }}">
                                <a href="{{ url('/admin/editdivisi') }}/{{ $divisi->id }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class=" btn-danger btn-sm">
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
