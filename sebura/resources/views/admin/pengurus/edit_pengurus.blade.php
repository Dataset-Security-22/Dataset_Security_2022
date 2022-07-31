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
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    </div>
</div>

<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
    </div>
    <div class="card-body">
        {{-- @foreach ( $data as $edit ) --}}
        <form action="/admin/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $data->id }}"> <br />
            <div class="form-group">
                <label for=""> Nama </label>
                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama"
                    value="{{ $data->nama }}">
            </div>
            <div class="form-group">
                <label for=""> Jabatan : </label>
                <select name="jabatan" id="jabatan">
                    @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}" {{ $data->id == $j->id ? 'selected':'' }}> {{ $j->nama_jabatan }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""> Prodi : </label>
                <select name="prodi" id="prodi">
                    @foreach ($prodi as $p)
                    <option value="{{ $p->id }}" {{ $data->id == $p->id ? 'selected':'' }}> {{ $p->nama_prodi }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""> Divisi Sebura : </label>
                <select name="divisi" id="divisi">
                    @foreach ($divisi_sebura as $d)
                    <option value="{{ $d->id }}" {{ $data->id == $d->id ? 'selected':'' }}> {{ $d->nama_divisi }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""> Tahun Kepengurusan </label>
                <input type="text" class="form-control" placeholder="Masukkan Tahun Angkatan" name="tahun_kepengurusan"
                    value="{{ $data->tahun_kepengurusan }}">
            </div>
            {{-- <div class="form-group">
                <label for="formFileMultiple" class="form-label">Gambar</label>
                {{ $data->gambar }}
                <input class="form-control" type="file" id="formFileMultiple" name="gambar">
            </div> --}}
            <div class="form-group">
                <input type="hidden" name="gambar_dulu" value="{{ $data->gambar }}"> <br />
                <label for="formFileMultiple" class="form-label">Gambar</label>
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="file" id="formFileMultiple" name="gambar">
                    </div>
                    <div class="col">
                        <img src="/storage/data_pengurus/{!! $data->gambar !!}" alt="{!! $data->nama !!}"
                            class="img-responsive" width="75" title="{!! $data->nama !!}">
                        {{ $data->gambar }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Update Pengurus
                </button>
            </div>

        </form>
        {{-- @endforeach --}}
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
