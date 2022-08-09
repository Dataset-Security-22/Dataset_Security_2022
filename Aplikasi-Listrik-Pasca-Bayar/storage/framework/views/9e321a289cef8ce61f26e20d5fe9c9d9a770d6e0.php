<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listrik Pasca Bayar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(url('/theme')); ?>/dist/css/skins/_all-skins.min.css">

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
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="<?php echo e(asset('public/theme')); ?>/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Listrik</b> Pasca Bayar</span>
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
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo e(asset('public/theme')); ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo e(Auth::user()->nama); ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="<?php echo e(asset('public/theme')); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                      <p>
                        <?php echo e(Auth::user()->nama); ?> -

                        <?php if(Auth::user()->role == 1): ?>
                        Admin
                        <?php elseif(Auth::user()->role == 2): ?>
                        Petugas
                        <?php else: ?>
                        Tidak Jelas
                        <?php endif; ?>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="">
                        <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-block"><i class="fa fa-sign-out"></i> Log out</a>
                      </div>
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
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">Menu</li>
              <li>
                <a href="<?php echo e(url('/dashboard')); ?>">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/tarif')); ?>">
                  <i class="fa fa-fax"></i> <span>Tarif</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/pelanggan')); ?>">
                  <i class="fa fa-user"></i> <span>Pelanggan</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/penggunaan')); ?>">
                  <i class="fa fa-pencil"></i> <span>Penggunaan</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/tagihan-pengguna')); ?>">
                  <i class="fa fa-folder-open"></i> <span>Tagihan Penggunaan</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/pembayaran')); ?>">
                  <i class="fa fa-money"></i> <span>Pembayaran</span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('/petugas')); ?>">
                  <i class="fa fa-users"></i> <span>Petugas</span>
                </a>
              </li>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $__env->yieldContent("page_header"); ?>
            </h1>
            <?php echo $__env->yieldContent("page_breadcrumb"); ?>
          </section>
          <!-- Main content -->
          <section class="content">
            <?php echo $__env->yieldContent("page_content"); ?>
            <!-- /.row -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2020 .</strong> All rights
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
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(asset('public/theme')); ?>/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('public/theme')); ?>/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo e(asset('public/theme')); ?>/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
          $(function () {
            $('#example1').DataTable()
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

        <?php echo $__env->yieldContent("page_scripts"); ?>

      </body>
      </html>
<?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/layouts/app.blade.php ENDPATH**/ ?>