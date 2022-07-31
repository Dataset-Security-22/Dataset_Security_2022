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
        <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    </div>
    <div class="col-md-1">
        <a href="/admin/acara/{{ $acara->id }}/tambah_absen" class="btn btn-success">
            Tambah
        </a>
    </div>
</div>

<!-- DataTales Example -->
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jurusan</th>
                        <th>Ket Absensi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                </tfoot>

                <tbody>
                    @foreach ($data_absensi as $no => $absen)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $absen->pengurus->nama }}</td>
                        <td>{{ $absen->pengurus->getjabatan->nama_jabatan }}</td>
                        <td>{{ $absen->pengurus->getprodi->nama_prodi}}</td>
                        <td>{{ $absen->keterangan }}</td>
                        <td>{{ $absen->created_at }}</td>
                        <td>
                            <form method="POST" action="{{ url('deleteacara') }}/{{ $absen->id }}" class="d-inline">
                                <a href="/admin/acara/{{ $absen->id }}/edit_absensi" class="btn btn-warning btn-sm">
                                    <i style="font-size:24px" class="fa">&#xf044;</i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class=" btn-danger btn-sm">
                                    <i style='font-size:24px' class='fas'>&#xf2ed;</i>
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
