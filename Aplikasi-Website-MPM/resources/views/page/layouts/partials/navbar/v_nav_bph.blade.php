<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="{{ url('/page/bph/dashboard') }}" class="navbar-brand">
      <img src="{{ url('/gambar/logo_fix_mpm.png') }}" alt="LOGO MPM" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MPM POLINDRA</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/page/bph/dashboard') }}" class="nav-link"><i class="fa fa-dashboard"></i> Dashboard </a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-edit"></i> Absensi</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ url('/page/bph/data_absen') }}" class="dropdown-item"> Data Absen </a></li>
            <li><a href="{{ url('/page/bph/data_absen_pertanggal') }}" class="dropdown-item"> Data Absen Per Tanggal </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-money"></i> Kas</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li>
              <a href="{{ url('/page/bph/kas/data_kas') }}" class="dropdown-item">Data KAS</a>
            </li>
            <li>
              <a href="{{ url('/page/bph/kas/data_kas_pertanggal') }}" class="dropdown-item">Data KAS Pertanggal</a>
            </li>
          </ul>
        </li> 
         <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-edit"></i> Report </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ url('/page/bph/laporan/data_absen') }}" class="dropdown-item"> Laporan Data Absen </a></li>
            <li><a href="{{ url('/page/bph/laporan/data_kas') }}" class="dropdown-item"> Laporan Data Kas </a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a onclick="return confirm('Yakin ? Anda Ingin Logout ?')" class="nav-link" href="{{ url('/page/bph/logout') }}" role="button">
          <i class="fa fa-sign-out"> </i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>