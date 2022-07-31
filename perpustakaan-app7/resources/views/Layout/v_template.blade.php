<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/template/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/template/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/template/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="/template/bower_components/select2/dist/css/select2.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="/template/dist/img/mda.png"  alt="User Image"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="/template/dist/img/mda.png"  alt="User Image"><b>DR-Perpus</b>App</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            {{-- @if(auth()->user()->id_role == 1) --}}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/template/dist/img/user-icon.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{auth()->user()->name}} </span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/template/dist/img/user-icon.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{auth()->user()->name}}
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">



                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        {{-- <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/template/dist/img/user-icon.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{auth()->user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                {{-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> --}}
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                @include("Layout.v_nav")
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content-header">
                @yield("content-header")
            </section>
            {{-- <section class="content-header">
                <h1>
                    @yield('title')

                </h1>

            </section> --}}

            <!-- Main content -->
            <section class="content">
                @yield("content")
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">

            </div>
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Kelompok4</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->

        <!-- ./wrapper -->

        <!-- jQuery 3 -->
    </div>

    <script src="/template/bower_components/select2/js/select2.full.min.js"></script>
    <script src="/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/template/bower_components/jquery-ui/jquery-ui.min.js"></script>

    <script src="/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/template/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Morris.js charts -->
    <script src="/template/bower_components/raphael/raphael.min.js"></script>
    <script src="/template/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/template/bower_components/moment/min/moment.min.js"></script>
    <script src="/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/template/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/template/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/template/dist/js/demo.js"></script>
    <script src="/template/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="/template/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/template/bower_components/Flot/jquery.flot.categories.js"></script>

    <script>
        $(function () {
            $('.select2').select2(),
            $('#example1').DataTable(),
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>



    @yield("page_scripts")
</body>
</html>
