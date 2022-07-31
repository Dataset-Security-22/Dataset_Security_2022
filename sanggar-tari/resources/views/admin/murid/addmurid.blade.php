@extends("layouts.template")

@section("ajax_calendar_js")

<script>
    function viewImage()
    {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Murid </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/data_murid') }}"> Data Murid </a>
                </li>
                <li class="breadcrumb-item active"> Data Murid </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/murid/') }}">
                    <h3 class="card-title">
                        <span class="btn btn-secondary col fileinput-button dz-clickable">
                            <i class="fa fa-reply"></i>
                            <span >Kembali</span>
                        </span>
                    </h3>
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/admin/murid/store/') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Murid</label>
                            <input type="text" name="nama_murid" class="form-control" id="" placeholder="Masukan Nama" required>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label>Jenis Kelamin&nbsp;
                                <input type="radio" name="jenis_kelamin" value="L" required> Laki-laki &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="jenis_kelamin" value="P" required> Perempuan
                            </label>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="number" name="umur" class="form-control" id="" placeholder="Umur Pelatih" required>
                        </div>
                        <div class="form-group">
                            <label>Nomer Handphone</label>
                            <input type="text" name="no_hp" class="form-control" id="" placeholder="Nomer Handphone" required>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="" name="alamat" class="form-control" id="" placeholder="Masukan Alamat" required>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Pelatih</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file"  name="foto" class="form-control" id="foto" placeholder="Masukan Foto/Gambar" required onchange="viewImage()">
                            <div class="text-danger">
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
