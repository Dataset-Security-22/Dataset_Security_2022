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
    <table class="table table-striped table-hover border border-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Acara</th>
                <th scope="col">Absensi</th>
                <th scope="col">Kepanitiaan</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0 @endphp
            @foreach($data_acara as $acara)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $acara->nama_acara }}</td>
                <td>
                    @if(count($acara->absensi) > 0)
                    Sudah absen
                    @else
                    <a href="/acara/{{ $acara->id }}/absensi">Silahkan Absen Disini</a>
                    @endif
                </td>
                <td>
                    @if(count($acara->panitia) > 0)
                    @if ($ketpanitia->final == 1)
                    {{$ketpanitia->ketpanitia->ket_panitia}}
                    @else
                    Sudah Daftar
                    @endif
                    @else
                    <a href="/acara/{{ $acara->id }}/kepanitiaan">Silahkan Daftar Kepanitiaan Disini</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
