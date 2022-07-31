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
        <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    </div>
</div>

<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Tambah Absensi</h6>
    </div>
    <div class="card-body">
        <form action="/admin/acara/{{ $acara->id }}/absensi" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for=""> Nama Pengurus : </label>
                <select name="pengurus" id="pengurus">
                    <option value="">-</option>
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
