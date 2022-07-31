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

<div class="container">
    <h4>Silahkan Absen :</h4>
    <form action="/acara/{{ $data_acara->id }}/absensi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-check">
            <input class="form-check-input" type="radio" name="keterangan" id="flexRadioDefault1" checked value="hadir">
            <label class="form-check-label" for="flexRadioDefault1">
                Hadir
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="keterangan" id="flexRadioDefault2" checked value="izin">
            <label class="form-check-label" for="flexRadioDefault2">
                Izin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="keterangan" id="flexRadioDefault2" checked value="sakit">
            <label class="form-check-label" for="flexRadioDefault2">
                Sakit
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="keterangan" id="flexRadioDefault2" checked
                value="tanpa keterangan">
            <label class="form-check-label" for="flexRadioDefault2">
                Tanpa Keterangan
            </label>
        </div>
        <div class="col-sm-10 pt-3">
            <button class="btn btn-success">
                <i class="fa fa-plus"></i> Submit
            </button>
        </div>
    </form>
</div>
@endsection
