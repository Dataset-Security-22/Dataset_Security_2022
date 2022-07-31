@extends("page.layouts.template_user")

@section("title", "Dashboard")

@section("page_scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session("sukses"))
<script type="text/javascript">
    swal({
        title: "Berhasil",
        text: "{{ session('sukses') }}",
        icon: "success",
        button: "OK",
    });
</script>
@endif

@endsection

@section("page_content")

<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>SISTEM MPM POLINDRA</h1>
                <h2>Aplikasi berbasis Web yang ditunjukkan untuk MPM POLINDRA.</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#tentang_kami" class="btn-get-started scrollto">Selengkapnya</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ url('/template_user/template') }}/assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="tentang_kami" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tentang Kami</h2>
            </div>

            <div class="row content">
                <div class="col-lg-12">
                    @foreach($data_tentang_kami as $data)
                    <p style="text-align: justify;">
                        {!! $data->body !!}
                    </p>
                    @endforeach
                    <a href="{{ url('/tentang_kami') }}" class="btn btn-primary">
                        Selengkapnya
                    </a>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>
                    Apabila ada yang ingin ditanyakan seputar <b>MPM POLINDRA</b>. Bisa menghubungi kontak di bawah ini.
                </p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Lokasi:</h4>
                            <p>
                                Jln. Lohbener lama No. 08 Kec. Lohbener Kab. Indramayu 45252
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>mpmpolindra@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Telepon:</h4>
                            <p>0853-1463-0396</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-md-7 mt-5 mt-lg-0">
                    <form action="{{ url('/kirim_pesan') }}" method="post" role="form">
                      {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                              <label for="nama"> Nama </label>
                              <input type="text" name="nama" class="form-control mt-2 mb-3" id="nama" required placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group col-md-6">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control mt-2 mb-3" name="email" id="email" required placeholder="Masukkan Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul"> Judul </label>
                                        <input type="text" class="form-control mt-2 mb-3" name="judul" id="judul" required placeholder="Masukkan Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="pesan"> Pesan </label>
                                        <textarea class="form-control" name="pesan" rows="10" required placeholder="Masukkan Pesan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

@endsection
