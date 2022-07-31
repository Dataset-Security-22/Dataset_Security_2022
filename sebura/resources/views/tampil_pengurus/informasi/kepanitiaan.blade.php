@extends('layouts.main')
@section('content')
@include('layouts.navbar_pengurus')
@if (session('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Berhasil
        </div>
    </div>
</div>
@endif

<div class="container pt-3">
    <h3 class="alert alert-primary text-center">Silahkan Pilih Kepanitiaan Yang Anda Mau :</h3>
    <form action="/acara/{{ $data_acara->id }}/kepanitiaan" method="POST" enctype="multipart/form-data">
        @csrf
        <select class="form-select" aria-label="Default select example" name="keterangan">
            <option selected>Pilih Kepanitiaan</option>
            @foreach ( $ket_panitia as $ket)
            <option value="{{ $ket->id }}">{{ $ket->ket_panitia }}</option>
            @endforeach
        </select>
        <div class="col-sm-10 pt-3">
            <button class="btn btn-success">
                <i class="fa fa-plus"></i> Submit
            </button>
        </div>
    </form>
</div>
@endsection
