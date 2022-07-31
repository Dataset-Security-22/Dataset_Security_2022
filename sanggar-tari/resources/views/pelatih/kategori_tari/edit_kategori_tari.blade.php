@extends("layouts.template")

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/pelatih/kategori_tari/simpan/') }}" >
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-edit"></span> Ubah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_role" class="col-sm-2 col-form-label">Tari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_kategori_tari" name="nama_kategori_tari" placeholder="Kategori Tari" value="{{ $edit->nama_kategori_tari }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm">
                        <span class="fa fa-save"></span>
                        Simpan
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
                    Data Tari
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tari</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach($data_kategori_tari as $role)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">{{ $role->nama_kategori_tari }}</td>
                            <td class="text-center">
                                <a href="{{ url('/pelatih/kategori_tari/edit') }}/{{ $role->id }}" class="btn btn-warning btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <form method="POST" action="{{ url('/pelatih/kategori_tari/hapus') }}" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $role->id }}">
                                    <button onclick="return confirm('Ingin di Hapus ?')" type="submit" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
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