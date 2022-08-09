<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.myapp') }} | @yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('/theme') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/theme') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('/theme') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ url('/theme') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/theme') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('/theme') }}/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/theme') }}/index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{{ config('app.myapp') }}</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ url('/images') }}/default.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ url('/images') }}/default.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }} <br>

                                        @if (Auth::user()->level == 1)
                                            <b>Admin Perpustakaan</b>
                                        @elseif(Auth::user()->level == 2)
                                            <b>Petugas Perpustakaan</b>
                                        @else
                                            <b>Tidak Ada</b>
                                        @endif
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat btn-block"><i
                                            class="fa fa-sign-out"></i> Log out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ url('/images') }}/default.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            @if (Auth::user()->active == 1)
                                Online
                            @elseif(Auth::user()->active == 2)
                                Offline
                            @else
                                Tidak Jelas
                            @endif
                        </a>
                    </div>
                </div>
                <!-- Sidebar user panel -->
                <!-- search form -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu</li>
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i> <span>Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if (Auth::user()->level == 2)
                                <li>
                                    <a href="{{ url('/kategori') }}">
                                        <i class="fa fa-bars"></i> <span>Kategori</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/rak') }}">
                                        <i class="fa fa-pencil"></i> <span>Rak</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->level == 1)
                                <li>
                                    <a href="{{ url('/prodi') }}">
                                        <i class="fa fa-building"></i> <span>Prodi</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('/anggota') }}">
                                    <i class="fa fa-user"></i> <span>Anggota</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/buku') }}">
                                    <i class="fa fa-book"></i> <span>Buku</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Transaksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('/pinjam') }}">
                                    <i class="fa fa-gavel"></i> <span>Pinjam Buku</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/pengembalian') }}">
                                    <i class="fa fa-sign-out"></i> <span>Pengembalian Buku</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->level == 1)
                        <li>
                            <a href="{{ url('/laporan') }}">
                                <i class="fa fa-area-chart"></i> <span>Laporan</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/laporan_perhari') }}">
                                <i class="fa fa-area-chart"></i> <span>Laporan</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ url('/help') }}">
                            <i class="fa fa-gears"></i> Help
                        </a>
                    </li>
                    @if (Auth::user()->level == 1)
                        <li>
                            <a href="{{ url('/users') }}">
                                <i class="fa fa-users"></i> <span>Users</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('page_header')
                </h1>
                @yield('page_breadcrumb')
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('page_content')
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ config('app.myapp') }} 2020 .</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ url('/theme') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ url('/theme') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{{ url('/theme') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/theme') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{ url('/theme') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ url('/theme') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/theme') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/theme') }}/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

    @yield('page_scripts')
</body>

</html>
