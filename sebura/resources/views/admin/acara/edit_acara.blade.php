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
        <h6 class="m-0 font-weight-bold text-primary">Edit Data acara</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/simpanacara') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $data_acara->id }}">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Acara</span>
                <input type="text" name="nama_acara" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" value="{{ $data_acara->nama_acara }}">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Acara</span>
                <input type="date" name="tanggal_acara" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" value="{{ $data_acara->tanggal_acara }}">
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
