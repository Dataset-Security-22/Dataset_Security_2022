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
        <h1 class="h3 mb-2 text-gray-800">Daftar Panitia Acara</h1>
    </div>
    <div class="col-md-1">
        <a href="/admin/acara/{{ $acara->id }}/tambah_panitia" class="btn btn-success">
            Tambah
        </a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Panitia Acara</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengurus</th>
                        <th>Jabatan</th>
                        <th>Jurusan</th>
                        <th>Ket Panitia</th>
                        <th>Finalisasi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                </tfoot>

                <tbody>
                    @php
                    $id_acara = '';
                    @endphp
                    @foreach ($data_panitia as $no => $panitia)
                    @php
                    $id_acara = $panitia->id_acara;
                    @endphp
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $panitia->pengurus->nama }}</td>
                        <td>{{ $panitia->pengurus->getjabatan->nama_jabatan }}</td>
                        <td>{{ $panitia->pengurus->getprodi->nama_prodi}}</td>
                        <td>{{ $panitia->ketpanitia->ket_panitia }}</td>
                        <td>
                            @if ($panitia->final == 1)
                            <div class="badge badge-success">Sudah Finalisasi</div>
                            @else
                            <div class="badge badge-danger">Belum Finalisasi</div>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ url('deletepanitia') }}/{{ $panitia->id }}" class="d-inline">
                                <a href="/admin/acara/{{ $panitia->id }}/edit_panitia" class="btn btn-warning btn-sm">
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
            <form method="POST" action="/admin/finalpanitia/{{ $id_acara }}">
                @csrf
                <button type="submit" class=" btn-success btn-sm">
                    Finalisasi
                </button>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
