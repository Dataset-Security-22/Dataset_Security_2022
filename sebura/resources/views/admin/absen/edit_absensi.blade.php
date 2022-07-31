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
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Absensi</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/simpanabsen') }}" method="post">
            @csrf
            <input type='hidden' name='id' value='{{$data->id}}' />
            <div class="form-group">
                <label for=""> Nama Pengurus : </label>
                <select name="pengurus" id="pengurus">
                    @foreach ($data_pengurus as $pengurus)
                    <option value="{{ $pengurus->id }}"> {{ $pengurus->nama }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""> Ket Absen : </label>
                <select name="keterangan" id="keterangan">
                    <option value="">-</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="tanpa keterangan">Tanpa Keterangan</option>
                </select>
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
