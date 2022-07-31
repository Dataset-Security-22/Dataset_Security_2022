<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.myapp') }} | @yield("page_header")</title>

  <!-- Custom fonts for this template -->
  <link href="{{ url('theme') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ url('theme') }}/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ url('theme') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sarpras</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
          Master
        </div>

        <?php if(Auth::user()->role==1) : ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-folder"></i>
              <span> Lahan </span>
            </a>
            <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white collapse-inner rounded">
                <h6 class="collapse-header">Data : </h6>
                <a class="collapse-item" href="{{ url('/admin/tanah') }}"><i class="fas fa-fw fa-tag"></i> Tanah </a>
                <a class="collapse-item" href="{{ url('/admin/ruangan') }}"><i class="fas fa-fw fa-eraser"></i> Ruangan </a>
                <a class="collapse-item" href="{{ url('/admin/lapangan') }}"><i class="fas fa-fw fa-cubes"></i> Lapangan </a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/kategori') }}">
              <i class="fas fa-fw fa-bars"></i>
              <span> Kategori </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-shopping-cart"></i> Transaksi

            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white collapse-inner rounded">
                <h6 class="collapse-header">Data : </h6>
                <?php if(Auth::user()->role==1) : ?>

                  <a class="collapse-item" href="{{ url('/admin/barang') }}"><i class="fas fa-fw fa-cubes"></i> Barang </a>
                  <a class="collapse-item" href="{{ url('/admin/stok') }}"><i class="fas fa-fw fa-cube"></i> Stock </a>
                  <a class="collapse-item" href="{{ url('/admin/asset') }}"><i class="fas fa-fw fa-eraser"></i> Asset</a>
                <?php elseif(Auth::user()->role==2) : ?>
                  <a class="collapse-item" href="{{ url('/admin/peminjaman') }}"><i class="fas fa-fw fa-eraser"></i> Peminjaman</a>
                <?php else : ?>
                  <a class="collapse-item" href="{{ url('/admin/peminjaman') }}"><i class="fas fa-fw fa-envelope"></i> Peminjaman</a>
                <?php endif ?>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/kondisi') }}">
              <i class="fas fa-fw fa-gavel"></i>Kondisi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/attribute') }}">
              <i class="fas fa-fw fa-eraser"></i>
              <span> Attribute </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/karyawan') }}">
              <i class="fas fa-fw fa-users"></i>
              <span> Karyawan </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/gambar') }}">
              <i class="fas fa-fw fa-image"></i>
              <span> Gambar </span>
            </a>
          </li>

          <hr class="sidebar-divider">

          <div class="sidebar-heading">
            Users
          </div>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/akun') }}">
              <i class="fas fa-fw fa-users"></i>
              <span> Admin </span>
            </a>
          </li>
        <?php elseif(Auth::user()->role==2) : ?>
          Ilham
        <?php else : ?>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin/peminjaman') }}">
              <i class="fas fa-fw fa-envelope"></i>
              Peminjaman
            </a>
          </li>
        <?php endif ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <div class="row pl-2">
              <div class="col-md-12">
                <b>Tanggal : {{ date("d - m - Y") }}</b>
              </div>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Akun
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-envelope text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">E-Mail</div>
                      <span class="font-weight-bold">{{ Auth::user()->email }}</span>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-eraser text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">Name</div>
                      {{ Auth::user()->name }}
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-warning">
                        <i class="fas fa-bars text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">Role</div>
                      @if(Auth::user()->role==1)
                      admin
                      @elseif(Auth::user()->role==2)
                      petugas
                      @else
                      guru
                      @endif
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="{{ url('/admin/logout') }}"> Logout </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            @yield("page_content")
          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span><b>Copyright &copy; 2019 - 2020 SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH KOTA CIREBON</b></span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->


    <script src="{{ url('theme') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('theme') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('theme') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('theme') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ url('theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('theme') }}/js/demo/datatables-demo.js"></script>


    @yield("page_scripts")
  </body>

  </html>
