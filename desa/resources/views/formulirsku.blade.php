<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title>Formulir Surat sku</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="row mt-5 pt-4">
          <div class="col-sm rounded text-light" style="background-color: #212529">
          <form action="/formulir_sku" method="post" >
              @csrf
              <div class="text-center">
                <h1 class="text-light">SURAT KETERANGAN USAHA</h1>
            </div>
            @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{ session('pesan') }}</strong> Kami akan menghubungi anda.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif

            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                      <div class="text-danger">
                            @error('nama')
                            {{$message}}
                            @enderror
                            </div>
                  </div>
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"> <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir ">
                      <div class="text-danger">
                            @error('tempat_lahir')
                            {{$message}}
                            @enderror
                            </div>
                      </div>
                  </div>
                <div class="row">
                  <div class="col-sm-5 col-md-6"><label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir ">
                    <div class="text-danger">
                            @error('tanggal_lahir')
                            {{$message}}
                            @enderror
                            </div>
                    </div>

                    <div class="col-lg-6 col-lg-5 col-lg-6">
                      <label for="nama" class="form-label">Jenis Kelamin</label>
                      <select id="nama" name="jenis_kelamin"  class="col-lg-12 col-lg-3 offset-xs-1 col-lg-6 form-control  ">
                      <label for="nama" class="form-label">Pilih Jenis Kelamin</label>
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-laki</option>
                            </select>
                            <div class="text-danger">
                            @error('jenis_kelamin')
                            {{$message}}
                            @enderror
                            </div>
                      </div>
                </div>
                <div class="row">
                <div class="col-lg-6 col-lg-5 col-lg-6">
                      <label for="nama" class="form-label">Agama</label>
                      <select id="nama" name="agama"  class="col-lg-12 col-lg-3 offset-xs-1 col-lg-6 form-control  ">
                      <option selected>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Budha">Budha</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                    </select>
                    <div class="text-danger">
                            @error('agama')
                            {{$message}}
                            @enderror
                            </div>
                      </div>

                    <div class="col-sm-6 col-md-5 col-lg-6"><label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <!-- <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan "> -->
                      <select id="nama" name="pekerjaan"  class="col-lg-12 col-lg-3 offset-xs-1 col-lg-6 form-control  ">
                      <option selected>Pilih Pekerjaan</option>
                    <option value="IRT">Ibu Rumah Tangga</option>
                    <option value="Pedagang">Pedagang</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Karyawan">Karyawan</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="PNS">Pegawai Negeri Sipil</option>
                    <option value="Guru">Guru</option>
                    <option value="tidak bekerja">Tidak Bekerja</option>
                    <option value="Lainnya">Lainnya</option>
                    </select>
                      <div class="text-danger">
                            @error('pekerjaan')
                            {{$message}}
                            @enderror
                            </div>
                      </div>

                      <div class="col-sm-6 col-md-5 col-lg-6"><label for="keterangan" class="form-label">Keterangan</label>
                      <!-- <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan "> -->
                      <div class="text-danger">
                    <select id="nama" name="keterangan"  class="col-lg-12 col-lg-3 offset-xs-1 col-lg-6 form-control  ">
                            <option selected>Pilih Keterangan</option>
                            <option value="Izin Buka Usaha">Izin Buka Usaha</option>
                            <option value="Pembuat cabang">Pembuat Cabang</option>
                            <option value="Lainnya">Lainnya</option>
                    </select>
                            @error('keterangan')
                            {{$message}}
                            @enderror
                            </div>
                      </div>

                  <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0"><label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Hp diisi dengan awalan 62">
                    <div class="text-danger">
                            @error('nohp')
                            {{$message}}
                            @enderror
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-6"><label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat ">
                      <div class="text-danger">
                            @error('alamat')
                            {{$message}}
                            @enderror
                            </div>
                      </div>

                  </div>
                  <div class="row ">
                    <div class="col d-flex justify-content-center m-3">
                        <button type="submit" class="btn btn-info " name="kirim">Kirim</button>
                    </div>
                  </div>
              </div>
              <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
          <script>
  $( function() {

    $( "#nama" ).autocomplete({
      source: 'namasku'
    });
  } );
  </script>
        </body>
      </html>
