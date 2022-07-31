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

<section class="py-2">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">STRUKTUR KEPENGURUSAN</h1>
                    </h1>
                    <p class="lead fw-normal text-muted mb-0">Kepengurusan UKM SEBURA Tahun 2021/2022</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Team members section-->
<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="text-center">
            <h2 class="fw-bolder">BPH SEBURA</h2>
        </div>
        {{-- ketum --}}
        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="/storage/data_pengurus/{{ $ketua->gambar }}"
                        width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $ketua->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $ketua->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
        </div>

        {{-- waketum --}}
        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="/storage/data_pengurus/{{ $wakil_ketua->gambar }}" width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $wakil_ketua->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $wakil_ketua->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
        </div>
        <br>
        <br>

        {{-- sekretaris dan bendahara --}}
        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="/storage/data_pengurus/{{ $sekretaris1->gambar }}" width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $sekretaris1->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $sekretaris1->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="/storage/data_pengurus/{{ $sekretaris2->gambar }}" width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $sekretaris2->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $sekretaris2->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4"
                        src="/storage/data_pengurus/{{ $bendahara->gambar }}" width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $bendahara->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $bendahara->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
        </div>

        {{-- psda
        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="/storage/data_pengurus/{{ $ketua->gambar }}"
                        width="200" height="200" alt="..." />
                    <h5 class=" fw-bolder">{{ $ketua->nama }}</h5>
                    <div class="fst-italic text-muted">{{ $ketua->getjabatan->nama_jabatan }}</div>
                </div>
            </div>
        </div> --}}

</section>

</div>
</section>
</main>

@endsection
