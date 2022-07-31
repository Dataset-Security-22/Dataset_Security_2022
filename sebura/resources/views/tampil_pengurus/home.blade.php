@extends('layouts.main')

@section('content')
@include('layouts.navbar_pengurus')

@if(session('message'))
{!! session('message') !!}
@endif

<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">"SEBURA"</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Seni Budaya Polindra</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-outline-light btn-lg px-4" href="">Unit Kegiatan Mahasiswa <br> Seni dan
                            Budaya <br> Politeknik Negeri Indramayu</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                    src="{{ asset('img/seni.png') }}" alt="..." /></div>
        </div>
    </div>
</header>
<div class="container">


    {{-- Galeri --}}
    <div class="row">
        <div class="col text-center">
            <h2> Galeri </h2>
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/padus.jpeg') }}" class="d-block w-100" alt="..."
                    style="width: 600px; height: 400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark">PADUAN SUARA</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/band.jpeg') }}" class="d-block w-100" alt="..."
                    style="width: 600px; height: 400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark">BAND</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/dance.jpeg') }}" class="d-block w-100" alt="..."
                    style="width: 600px; height: 400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark">DANCE</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/tradisional.jpeg') }}" class="d-block w-100" alt="..."
                    style="width: 600px; height: 400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark">TARI TRADISIONAL</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Kontak --}}
    <div class="row">
        <div class="col text-center">
            <h2> KONTAK KAMI</h2>
        </div>
    </div>
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-map-marker"></i></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Alamat</h6>
                            <p class="card-text">Kampus 1 Politeknik Negeri Indramayu <br>
                                Gedung Direktorat Lt.2<br>
                                Jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fa fa-youtube"><a href=""></a></i> Youtube</li>
                        <li class="list-group-item"><i class="fa fa-instagram"> <a
                                    href="https://www.instagram.com/sebura_polindra"> Instagram</a></i></li>
                        <li class="list-group-item"><i class="fa fa-envelope"><a href=""></a></i> Email</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
