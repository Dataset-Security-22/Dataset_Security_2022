@extends("layouts.template_pengunjung")

@section("page_content")

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Data Kategori</h2>
            <h3 class="section-subheading text-muted">Traditional Dance Vibes</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/bali.jpg" height="600px" width="10000px" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Tari Bali</div>
                        <div class="portfolio-caption-subheading text-muted">Tari Bali</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/dayak.jpg" height="200px" width="10000px"  />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Tari Dayak</div>
                        <div class="portfolio-caption-subheading text-muted">Tari Dayak</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/jaipong.jpg" height="200px" width="10000px" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Tari Jaipong</div>
                        <div class="portfolio-caption-subheading text-muted">Tari Jaipong</div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <!-- Portfolio item 4-->
                <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/merak2.jpg" height="200px" width="10000px"  />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Tari Merak</div>
                    <div class="portfolio-caption-subheading text-muted">Tari Merak</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 5-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/topeng.jpg" height="800px" width="10000px"  />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Tari Topeng</div>
                    <div class="portfolio-caption-subheading text-muted">Tari Topeng</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 6-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ url('/landing') }}/assets/img/portfolio/tari piring.jpg" height="200px" width="10000px"  />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Tari Piring</div>
                    <div class="portfolio-caption-subheading text-muted">Tari Piring</div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        </div>
    </div>
</section>
@endsection



