<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Alamat</h4>
                <?php
                    use App\Models\Profil;

                    $data = Profil::select("alamat", "no_hp", "email")->first();
                ?>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i>
                        @if (empty($data->alamat))
                        Losarang
                        @else
                        {{ $data->alamat  }}
                        @endif
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt me-3"></i>
                        @if (empty($data->no_hp))
                        12345
                        @else
                            {{  $data->no_hp  }}
                        @endif
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i>
                        @if(empty($data->email))
                        admin@gmail.com
                        @else
                        {{ $data->email }}
                        @endif
                    </p>
                <?php

                ?>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Services</h4>
                <a class="btn btn-link" href="">Air Freight</a>
                <a class="btn btn-link" href="">Sea Freight</a>
                <a class="btn btn-link" href="">Road Freight</a>
                <a class="btn btn-link" href="">Logistic Solutions</a>
                <a class="btn btn-link" href="">Industry solutions</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Rumah Tahfidz Quran</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Desain Oleh <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer End -->