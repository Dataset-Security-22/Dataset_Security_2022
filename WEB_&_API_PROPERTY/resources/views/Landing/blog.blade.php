<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyek 3 Propertiku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href={{url("Landing/https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500")}}>
    <link rel="stylesheet" href={{url("Landing/fonts/icomoon/style.css")}}>

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
                    <a href="index.html">Home</a>
                  </li>
                  <li >
                    <a href="properties.html">Properties</a>
                  </li>
                  <li class="active"><a href="blog.html">Blog</a></li>
                  <li><a href="about.html">About</a></li> --}}

                </ul>
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

              </nav>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(Landing/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Our Blog</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
            @foreach ($foto_syarat as $desk)
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <a href="#"><img src="{{ url('storage/' . $desk->foto) }}" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <h2 class="h3 text-black mb-3"><a href="#">{{$desk->nama_perumahan }}</a></h2>
              <span class="d-block text-secondary small text-uppercase">{{$desk->alamat }}</span>
              <p ><a href="#">{{$desk->uraian }}</a></p>
            </div>
          </div>
          @endforeach
        </div>






        <div class="row" data-aos="fade-up">
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
