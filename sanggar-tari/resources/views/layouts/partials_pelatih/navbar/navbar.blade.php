<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="../../index3.html" class="navbar-brand">
      <img src="{{ url('/template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sanggar Tari</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/pelatih/dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Absen</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ url('/pelatih/absen/hari_ini') }}" class="dropdown-item"> Absen </a></li>
            <li><a href="{{ url('/pelatih/absen/pertanggal') }}" class="dropdown-item"> Absen Per Tanggal </a></li>
            <!-- End Level two -->
          </ul>
        </li>
        <li class="nav-item">
          <a  href="{{ url('/pelatih/nilai') }}"  class="nav-link">Nilai</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-0 ml-md-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link"  data-slide="true" href="{{ url('/admin/logout') }}" role="button">
          Logout
        </a>
      </li>
    </ul>
  </div>
</nav>