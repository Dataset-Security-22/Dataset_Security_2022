@extends('layouts.main')
@section('content')
@include('layouts.navbar')

<div class="container pt-3">
    <div class="card p-3">
        <h2 class="alert alert-primary text-center">FORM OPEN RECRUITMENT</h2>
        <hr>

        <form action="/tambah/oprec" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label" style="text-align: right;">NIM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="nim" min="0" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label" style="text-align: right;">Nama Lengkap </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="tempat" class="col-sm-4 col-form-label" style="text-align: right;">Tempat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tempat" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="ttl" class="col-sm-3 col-form-label" style="text-align: right;">TTL</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="ttl" required>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label" style="text-align: right;">No Telp / WA </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp" min="0" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label" style="text-align: right;"> Email </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="text-align: right;">Pilih
                    Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jurusan" required>
                        <option value="" style="display: none"></option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Perancangan Manufaktur">Perancangan Manufaktur</option>
                        <option value="Teknik Pendingin dan Tata Udara">Teknik Pendingin dan Tata Udara</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Keperawatan">Keperawatan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label" style="text-align: right;">Alasan Bergabung</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="6" name="alasan" required></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label" style="text-align: right;">
                    Masukkan File
                </label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="gambar" required>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Submit
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<br>

@endsection
