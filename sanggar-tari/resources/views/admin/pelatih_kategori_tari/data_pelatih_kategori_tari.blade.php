@extends("layouts.template")

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Pelatih Kategori Tari </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active"> Data Pelatih Kategori Tari </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/admin/pelatih_kategori_tari/tambah/') }}">
            {{ csrf_field() }}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_kategori"> Kategori Tari </label>
                        <select required class="form-control select2bs4" style="width: 100%;" name="id_kategori">
                            <option value="">- Pilih -</option>
                            @foreach($data_kategori as $kategori_tari)
                            <option value="{{ $kategori_tari->id }}">
                                {{ $kategori_tari->nama_kategori_tari }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori"> Pelatih </label>
                        <select required class="form-control select2bs4" style="width: 100%;" name="id_pelatih">
                            <option value="">- Pilih -</option>
                            @foreach($data_pelatih as $pelatih)
                            <option value="{{ $pelatih->id }}">
                                {{ $pelatih->nama_pelatih }}
                            </option>
                            @endforeach
                        </select>
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
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Pelatih Kategori
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kategori Tari</th>
                            <th>Nama Pelatih</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach($data_pelatih_kategori as $pelatih_kategori)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">
                                {{ $pelatih_kategori->KategoriTari->nama_kategori_tari }}
                            </td>
                            <td>
                                {{ $pelatih_kategori->Pelatih->nama_pelatih }}
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/admin/pelatih_kategori_tari/edit') }}/{{ $pelatih_kategori->id_pelatih_kategori }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ url('/admin/pelatih_kategori_tari/hapus') }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="id_pelatih_kategori" value="{{ $pelatih_kategori->id_pelatih_kategori }}">
                                    <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
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