<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> .: Pelatih :. </title>

  <!-- Google Font: Source Sans Pro -->
  @include("layouts.partials_pelatih.css.style_css")
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    @include("layouts.partials_pelatih.navbar.navbar")
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        @yield("header")
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        @yield("content")
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-center">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021.</strong> All rights reserved. Design By <b>Kelompok - 1.</b>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  
  @yield("scripts_js")
  
  @include("layouts.partials_pelatih.js.style_js")



</body>
</html>
