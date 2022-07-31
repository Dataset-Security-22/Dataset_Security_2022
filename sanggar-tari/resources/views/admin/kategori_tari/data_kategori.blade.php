@extends("layouts.template")

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Kategori Tari </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active"> Data Kategori Tari </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/admin/kategori_tari/tambah/') }}">
            {{ csrf_field() }}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kategori_tari"> Kategori Tari </label>
                        <input required type="text" class="form-control" id="nama_kategori_tari" name="nama_kategori_tari" placeholder="Masukkan Kategori Tari">
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
    <div class="col-md-8"   >
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Role
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped>
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kategori Tari</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach($data_kategori_tari as $kategori)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">{{ $kategori->nama_kategori_tari }}</td>
                            <td class="text-center">
                                <a href="{{ url('/admin/kategori_tari/edit') }}/{{ $kategori->id }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <form class="d-inline" method="POST" action="{{ url('/admin/kategori_tari/hapus') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $kategori->id }}">
                                    <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
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

@endsection