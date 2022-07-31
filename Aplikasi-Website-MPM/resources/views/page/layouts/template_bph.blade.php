<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="title" content="Sistem MPM POLINDRA">
  <meta name="description" content="Sistem MPM POLINDRA - Sistem MPM POLINDRA">
  <meta name="keywords" content="Sistem MPM POLINDRA">
  <meta name="copyright" content="M Ilham Teguhriyadi"> 
  <meta name="author" content="M Ilham Teguhriyadi">

  <link rel="icon" href="{{ url('/gambar/logo_fix_mpm.png') }}">
  
  <title> .: MPM POLINDRA | @yield("page_title") :. </title>

  @include("page.layouts.partials.css.style_bph")

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  @include("page.layouts.partials.navbar.v_nav_bph")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      @yield("content_header")
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
    <strong>Copyright &copy; 2021.</strong> All rights reserved. Design By <b>Kelompok - 10</b>
  </footer>
</div>

@include("page.layouts.partials.js.style_bph")

@yield("page_scripts")

</body>
</html>
