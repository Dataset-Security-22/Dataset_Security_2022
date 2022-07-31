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
        <h1 class="h3 mb-2 text-gray-800">Data Kepengurusan</h1>
    </div>
    <div class="col-md-1">
        <a href="/admin/form_tambah_pengurus" class="btn btn-success">
            Tambah
        </a>
    </div>
</div>

<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Kepengurusan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Prodi</th>
                        <th>Tahun Kepengurusan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    @foreach($datapengurus as $data)
                    <tr>
                        <td>{{ ++$no }}.</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->getjabatan->nama_jabatan }} {{ $data->getdivisi->nama_divisi }}</td>
                        <td>{{ $data->getprodi->nama_prodi}}</td>
                        <td>{{ $data->tahun_kepengurusan }}</td>
                        <td><img src="/storage/data_pengurus/{!! $data->gambar !!}" alt="{!! $data->nama !!}"
                                class="img-responsive" width="75" title="{!! $data->nama !!}"></td>
                        <td>
                            <a href="/admin/{{ $data->id }}/form_edit_pengurus" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="/admin/hapus_kepengurusan" method="POST" style="display : inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit"
                                    class="btn btn-danger">
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
