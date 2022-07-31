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
    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
        <div class="text-center">
            <div class="mb-4 mb-xl-0">
                <div class="fs-3 fw-bold text-white">VISI DAN MISI</div>
                <div class="text-white-50">Seni dan Budaya POLINDRA</div>
            </div>
        </div>
    </aside>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>VISI</h1>
        </div>
        <center>"Mewujudkan SEBURA Menjadi UKM Yang Kompetitif, Kreatif, dan Meningkatkan Minat Bakat Pada Kesenian"
        </center>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center m-3">
            <h1>MISI</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text center">1. "Kompetitif dengan cara menggunakan sarana prasarana teknologi yang
                        sudah ada dalam kampus".</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text center">2. "Kreatif dalam hal berkarya dengan mengurangi rasa malu dalam
                        berpendapat".</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-text center">3. "Meningkatkan minat dan bakat dalam seni untuk tercapainya tujuan
                        kompetitif dab kreatif dalam UKM SEBURA POLINDRA".</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@endsection
