<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register - Sisdayu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="/layouts/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/layouts/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/layouts/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/layouts/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/layouts/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/layouts/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/layouts/assets/css/typography.css">
    <link rel="stylesheet" href="/layouts/assets/css/default-css.css">
    <link rel="stylesheet" href="/layouts/assets/css/styles.css">
    <link rel="stylesheet" href="/layouts/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/layouts/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="/register_cek" method="post">
                    <div class="login-form-head">
                        <h4>Daftar</h4>
                        <p>Silahkan Daftar Terlebih Dahulu</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Full Name</label>
                            <input type="text" id="exampleInputName1" name="nama">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" id="exampleInputPassword2" name="password2">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        @csrf
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Punya Akun? <a href="/login">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="/layouts/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/layouts/assets/js/popper.min.js"></script>
    <script src="/layouts/assets/js/bootstrap.min.js"></script>
    <script src="/layouts/assets/js/owl.carousel.min.js"></script>
    <script src="/layouts/assets/js/metisMenu.min.js"></script>
    <script src="/layouts/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/layouts/assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="/layouts/assets/js/plugins.js"></script>
    <script src="/layouts/assets/js/scripts.js"></script>
</body>

</html>
