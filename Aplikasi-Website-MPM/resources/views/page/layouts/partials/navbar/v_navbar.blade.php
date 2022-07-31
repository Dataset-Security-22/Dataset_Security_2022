<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">DASHBOARD</li>
    <li class="nav-item">
      <a href="{{ url('/page/admin/dashboard') }}" class="nav-link">
        <i class="nav-icon fa fa-dashboard"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-header">MENU</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-list"></i>
        <p>
          Daftar Menu
          <i class="fa fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('/page/admin/jurusan/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Jurusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/prodi/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Prodi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/kelas/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Kelas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/anggota/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Anggota</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/bagian/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Bagian</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/jabatan/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Jabatan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/divisi/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Divisi</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">Web</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-list"></i>
        <p>
          Landing
          <i class="fa fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('/page/admin/kategori') }}" class="nav-link">
            <i class="fa fa-bars nav-icon"></i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/post_blog') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Post Blog</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/proker/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Proker</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/berita/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Berita</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/profil/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Profil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/hubungi_kami') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Hubungi Kami</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">Report</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-bar-chart"></i>
        <p>
          Laporan
          <i class="fa fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('/page/admin/laporan/data_absen/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Laporan Data Absen</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/laporan/data_kas/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Laporan Data KAS</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">Settings</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-gear"></i>
        <p>
          Pengaturan
          <i class="fa fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('/page/admin/tentang_kami/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Tentang Kami</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/angkatan') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Angkatan</p>
          </a>
        </li>
        <li class="nav-item"></li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/last-login/') }}" class="nav-link">
            <i class="fa fa-sign-out nav-icon"></i>
            <p>Last Login</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">AKUN</li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>
          Account
          <i class="fa fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('/page/admin/akun/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/role/') }}" class="nav-link">
            <i class="fa fa-circle nav-icon"></i>
            <p>Role</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/page/admin/aktifkan_akun/') }}" class="nav-link">
            <i class="fa fa-sign-out nav-icon"></i>
            <p>Aktifkan Akun</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>