<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyek 3 Propertiku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href={{url("Landing/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/magnific-popup.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/jquery-ui.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/bootstrap-datepicker.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/mediaelementplayer.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/animate.css")}}>
    <link rel="stylesheet" href={{url("Landing/fonts/flaticon/font/flaticon.css")}}>
    <link rel="stylesheet" href={{url("Landing/css/fl-bigmug-line.css")}}>


    <link rel="stylesheet" href={{url("Landing/css/aos.css")}}>

    <link rel="stylesheet" href={{url("Landing/css/style.css")}}>

  </head>
  <body>

  <div class="site-loader"></div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0"><strong>Propertiku</strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                {{-- <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="home.html">Home</a>
                  </li>
                  <li>
                    <a href="properties.html">Properties</a>
                  </li>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="about.html">About</a></li> --}}
                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="active">
                        <a href={{url("/")}}>Home</a>
                    </li>
                    <li >
                        <a href={{url("/properties")}}>Properties</a>
                    </li>
                    <li><a href={{url("/blog")}}>Blog</a></li>
                    <li><a href={{url("/about")}}>About</a></li>

                    @if(empty(auth()->user()->name))
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/admin/login') }}"> Login </a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"> Login </a></li>
                    @else
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/pengunjung/full-calender/') }}">Events</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/admin/logout') }}"> Logout </a></li>
                    @endif

                </ul>


                </ul>
              </nav>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover overlay" style="background-image: url(Landing/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url(Landing/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      </div>

    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                    <option value="">Condo</option>
                    <option value="">Commercial Building</option>
                    <option value="">Land Property</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                    <option value="">For Sale</option>
                    <option value="">For Rent</option>
                    <option value="">For Lease</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                    <option value="">New York</option>
                    <option value="">Brooklyn</option>
                    <option value="">London</option>
                    <option value="">Japan</option>
                    <option value="">Philippines</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="index.html" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>

              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="#" class="view-list px-3 border-right active">All</a>
                  <a href="#" class="view-list px-3 border-right">Rent</a>
                  <a href="#" class="view-list px-3">Sale</a>
                </div>


                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="">Price Ascending</option>
                    <option value="">Price Descending</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                @foreach ($foto_syarat as $desk)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <img src="{{ url('storage/' . $desk->foto) }}" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#"></a>
                            <h2 class="property-title"><a href="property-details.html">
                            @if (empty($desk->getPerum->nama_perumahan))
                                        <b>
                                            <i>
                                                Perumahan Belum terdaftar
                                            </i>
                                        </b>
                                    @else
                                    {{$desk->getPerum->nama_perumahan}}
                                    @endif
                                </a>
                            </h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                            @if (empty($desk->getAlamat->alamat))
                                        <b>
                                            <i>
                                                Perumahan Belum terdaftar
                                            </i>
                                        </b>
                                    @else
                                    {{$desk->getAlamat->alamat}}
                                    @endif
                            </span>
                            <strong class="property-price text-primary mb-3 d-block text-success">{{ currency_IDR($desk->harga) }}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Type</span>
                                    <span class="property-specs-number">{{ $desk->type }}</span>
                                </li>
                                <li>
                                    <span class="property-specs">Stock</span>
                                    <span class="property-specs-number">{{ $desk->stock }}</span>

                                </li>

                            </ul>
                            <a href="/owner/deskripsi_rumah/paymentHarga/{{ $desk->id }}"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-monesy"></i> payment
                            </a>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="site-pagination">
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <span>...</span>
                        <a href="#">10</a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Proyek 3</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>



          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Properties</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>



          </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
                Copyright &copy;<script data-cfasync="false" ></script><script>document.write(new Date().getFullYear());</script> Kelompok 4 <i class="icon-heart text-danger" aria-hidden="true"></i>
                </p>
          </div>

        </div>
      </div>
    </footer>

  </div>

  <script src={{url("Landing/js/jquery-3.3.1.min.js")}}></script>
  <script src={{url("Landing/js/jquery-migrate-3.0.1.min.js")}}></script>
  <script src={{url("Landing/js/jquery-ui.js")}}></script>
  <script src={{url("Landing/js/popper.min.js")}}></script>
  <script src={{url("Landing/js/bootstrap.min.js")}}></script>
  <script src={{url("Landing/js/owl.carousel.min.js")}}></script>
  <script src={{url("Landing/js/mediaelement-and-player.min.js")}}></script>
  <script src={{url("Landing/js/jquery.stellar.min.js")}}></script>
  <script src={{url("Landing/js/jquery.countdown.min.js")}}></script>
  <script src={{url("Landing/js/jquery.magnific-popup.min.js")}}></script>
  <script src={{url("Landing/js/bootstrap-datepicker.min.js")}}></script>
  <script src={{url("Landing/js/aos.js")}}></script>

  <script src={{url("Landing/js/main.js")}}></script>

  </body>
</html>
