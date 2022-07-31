@extends("template.layout")

@section("page_title", "DATA SKD")

@section("page_content")
<div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Data Kependudukan</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                    <form action="/penduduk/update/{{$penduduk->id}}" method="post">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">Nama Lengkap</label>
                                        <input type="text" name="nama" id="name" class="form-control" placeholder="name"  value="{{$penduduk->nama}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <input type="teks" name="nik" id="nik" class="form-control" placeholder="NIK"  value="{{$penduduk->nik}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" id="input-last-name" class="form-control" placeholder="Jenis Kelamin"  value="{{$penduduk->jenis_kelamin}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Agama</label>
                                        <input type="text" name="agama" id="input-last-name" class="form-control" placeholder="Agama"  value="{{$penduduk->agama}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Kewarganegaraan</label>
                                        <input type="text" name="kewarganegaraan" id="input-last-name" class="form-control" placeholder="Kewarganegaraan"  value="{{$penduduk->kewarganegaraan}}">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Alamat</label>
                                        <input type="text" name="alamat" id="input-last-name" class="form-control" placeholder="Alamat"  value="{{$penduduk->alamat}}">
                                    </div>
                                </div>

                                    <div class="submit-btn-area">
                                        <button id="form_submit" type="submit">Simpan <i class="ti-arrow-right"></i></button>
                                    </div>
                                </div>

                        </div>
                </div>
                  </div>
                </div>
                <hr class="my-4" />
            </div>
          </div>
@endsection
