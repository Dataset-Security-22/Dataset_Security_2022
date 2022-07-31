@extends('layouts.mainadmin')

@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('topbar')
@include('layouts.topbar')
@endsection
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Prodi</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/simpanprodi') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $data_prodi->id }}">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Prodi</span>
                <input type="text" name="nama_prodi" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" value="{{ $data_prodi->nama_prodi }}">
            </div>
            <div class="col-md-2 ">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
