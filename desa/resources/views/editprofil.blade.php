
<!DOCTYPE html>
<html>

<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
            <meta name="author" content="Creative Tim">
            <title>Sisdayu | @yield("page_title")</title>
            <!-- Favicon -->
            <link rel="icon" href="/admin/assets/img/brand/favicon.png" type="image/png">
            <!-- Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
            <!-- Icons -->
            <link rel="stylesheet" href="/admin/assets/vendor/nucleo/css/nucleo.css" type="text/css">
            <link rel="stylesheet" href="/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
            <!-- Page plugins -->
            <!-- Argon CSS -->
        <link rel="stylesheet" href="/admin/assets/css/argon.css?v=1.2.0" type="text/css">
        </head>

        <body>
        <!-- Sidenav -->
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                <img src="/admin/assets/img/brand/blue.jpg" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-home"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/skd">
                        <i class="ni ni-email-83"></i>
                        <span class="nav-link-text">Surat Masuk SKD</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/sku">

                        <i class="ni ni-email-83"></i>
                        <span class="nav-link-text" >Surat Masuk SKU</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/sktm">
                        <i class="ni ni-email-83"></i>
                        <span class="nav-link-text">Surat Masuk SKTM</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/penduduk">
                        <i class="ni ni-single-02 text-yellow"></i>
                        <span class="nav-link-text">Data Kependudukan</span>
                    </a>
                    </li>


                    <li class="nav-item">
                    <a class="nav-link" href="/akun">
                        <i class="ni ni-circle-08 text-pink"></i>
                        <span class="nav-link-text">Akun</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="ni ni-button-power"></i>
                        <span class="nav-link-text">Logout</span>
                    </a>
                    </li>
                </ul>
                </nav>
                <!-- Main content -->
                <div class="main-content" id="panel">
                <!-- Topnav -->
                <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                    <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Search form -->
                        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </form>
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <i class="ni ni-bell-55"></i> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">

                        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="/admin/assets/img/theme/team-4.jpg">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                                </div>
                            </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item">
                                <i class="ni ni-button-power"></i>
                                <span>Logout</span>
                            </a>
                            </div>
                        </li>
                        </ul>
                    </div>
                    </div>
                </nav>
                <!-- Header -->
                <!-- Header -->
                <div class="header bg-primary pb-6">
                    <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboards</a></li>

                            </ol>
                            </nav>
                        </div>
                        @yield("page_tambah")
                        <div class="col-lg-6 col-5 text-right">
                            <!-- <a href="#" class="btn btn-sm btn-neutral">Tambah Data</a> -->

                        </div>
                        </div>
                        <!-- Card stats -->

                        @if(session("session"))
                        <div class="alert alert-success">
                        {{ session("session") }}
                        </div>
                        @endif

                    </div>
                    </div>
                </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h3 class="mb-0">Edit Profile</h3>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                    <form action="/user/{{$user->id}}" method="post" >
                    @csrf
                    @method('put')

                        <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Full Name</label>
                                <input type="text" name="full_name" id="input-username" class="form-control" placeholder="Full name" value="{{ $user->nama }}">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email address</label>
                                <input type="email" name="email" id="input-email" class="form-control" placeholder="Email Address" value="{{ $user->email }}">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Password</label>
                                <input type="password" name="password" id="input-first-name" class="form-control" placeholder="Password" >
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Confirm Password</label>
                                <input type="password" name="confirm_password" id="input-last-name" class="form-control" placeholder="Confirm Password"> <br>
                                <div class="submit-btn-area">
                                    <button id="form_submit" type="submit">Simpan <i class="ti-arrow-right"></i></button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
        </div>

        <!-- Content -->
        <div class="container-fluid mt--6">
                    @yield("page_content")
                    <footer class="footer pt-0">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="" class="font-weight-bold ml-1" >Proyek 2</a>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                            <a href="" class="nav-link" >Proyek 2</a>
                            </li>
                            <li class="nav-item">
                            <a href="" class="nav-link" >Kelompok 2</a>
                            </li>
                            <li class="nav-item">
                            <a href="" class="nav-link" >Sisdayu</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li> -->
                        </ul>
                        </div>
                    </div>
                    </footer>
                </div>
                </div>
                <!-- Argon Scripts -->
                <!-- Core -->
                <script src="/admin/assets/vendor/jquery/dist/jquery.min.js"></script>
                <script src="/admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="/admin/assets/vendor/js-cookie/js.cookie.js"></script>
                <script src="/admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
                <script src="/admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
                <!-- Optional JS -->
                <script src="/admin/assets/vendor/chart.js/dist/Chart.min.js"></script>
                <script src="/admin/assets/vendor/chart.js/dist/Chart.extension.js"></script>
                <!-- Argon JS -->
                <script src="/admin/assets/js/argon.js?v=1.2.0"></script>
            </body>
            </html>
