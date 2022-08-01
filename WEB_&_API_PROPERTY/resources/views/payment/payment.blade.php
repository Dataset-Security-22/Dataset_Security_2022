
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-2zX06oFgZ2b1zznF"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyek 3 Propertiku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
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
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="index.html">Home</a>
                  </li>
                  <li >
                    <a href="properties.html">Properties</a>
                  </li>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="about.html">About</a></li>
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
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Sale</span>
              <h1 class="mb-2">625 S. Berendo St</h1>
              <p class="mb-5"><strong class="h2 text-success font-weight-bold">$1,000,500</strong></p>
              <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Harga</label>
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
                <label for="offer-types">Type</label>
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
                <label for="select-city">Kota</label>
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
                <a href="index.html" class="icon-view view-module"><span class="icon-view_module"></span></a>
                <a href="view-list.html" class="icon-view view-list active"><span class="icon-view_list"></span></a>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">


          <div class="row mb-4">
          <div class="col-md-12">
            <div class="property-entry horizontal d-lg-flex">

              <a href="#" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                </div>
                <img src="{{ url('storage/' . $edit->foto) }}" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <h2 class="property-title"><a href="#">

                    @if (empty($edit->getPerum->nama_perumahan))
                    <b>
                        <i>
                            Perumahan Belum terdaftar
                        </i>
                    </b>
                @else
                {{$edit->getPerum->nama_perumahan}}
                @endif
                </a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                @if (empty($edit->getAlamat->alamat))
                                        <b>
                                            <i>
                                                Perumahan Belum terdaftar
                                            </i>
                                        </b>
                                    @else
                                    {{$edit->getAlamat->alamat}}
                                    @endif
                </span>
                <h5>
                <li>
                     Tipe Rumah {{$edit->type}}
                </li>
                <li>
                    kusen terbuat dari {{$edit->kusen}}
                </li>
                <li>
                    Jendela terbuat dari {{$edit->jendela}}
                </li>
                <li>
                    Plafond{{$edit->plafond}}
                </li>
                <li>
                    Air {{$edit->air}}
                </li>
                <li>
                    {{$edit->air}}
                </li>
                <li>
                    Tegangan Listrik {{$edit->listrik}}
                </li>
                <li>
                    Pondasi {{$edit->pondasi}}
                </li>
                <li>
                    Atap Terbuat dari {{$edit->atap}}
                </li>
                <li>
                    Jenis WC {{$edit->wc}}
                </li>


                </h5>
                <br>
                <strong class="property-price text-primary mb-3 d-block text-success">{{ currency_IDR($edit->harga) }}</strong>



                <button id="pay-button">Pay!</button>

                <form action="" id="submit_form" method="POST">
                    @csrf
                    <input type="hidden" name="json" id="json_callback">
                    <input type="hidden" name="id_deskripsi_rumah" value="{{ $id_deskripsi_rumah }}">
                    <input type="hidden" name="id_user_order" value="{{ $id_user_order }}">
                    <input type="hidden" name="id_owner_order" value="{{ $id_owner_order }}">
                </form>

                <script type="text/javascript">
                    // For example trigger on button clicked, or any time you need
                    var payButton = document.getElementById('pay-button');
                    payButton.addEventListener('click', function() {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                        window.snap.pay('{{ $snap_token }}', {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onPending: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onClose: function() {
                                /* You may add your own implementation here */
                                alert('you closed the popup without finishing the payment');
                            }
                        })
                    });

                    function send_response_to_form(result) {
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                    }
                </script>




            </div>

            </div>
          </div>
    </div>

        <div class="row mt-5">
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
              <h3 class="footer-heading mb-4">About Homeland</h3>
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
                  <li><a href="#">Buy</a></li>
                  <li><a href="#">Rent</a></li>
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
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js")}}></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
  <script src={{url("Landing/js/circleaudioplayer.js")}}></script>

  <script src={{url("Landing/js/main.js")}}></script>

  </body>
</html>


