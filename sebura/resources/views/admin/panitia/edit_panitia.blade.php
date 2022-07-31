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
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Panitia</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/simpanpanitia') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="id_acara" value="{{$data->id_acara}}">
            <div class="form-group">
                <label for=""> Nama Pengurus : </label>
                <select name="pengurus" id="pengurus">
                    @foreach ($data_pengurus as $pengurus)
                    <option value="{{ $pengurus->id }}"> {{ $pengurus->nama }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for=""> Ket Panitia : </label>
                <select name="keterangan" id="keterangan">
                    <option value="">-</option>
                    @foreach ($data_ketpanitia as $ketpanitia)
                    <option value="{{ $ketpanitia->id }}"> {{ $ketpanitia->ket_panitia }} </option>
                    @endforeach
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
