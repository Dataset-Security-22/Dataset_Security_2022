<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Dashboard</li>
    <li class="{{ request()->is('/')? 'active' : '' }}">
        <a href="/">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>


        <li class="{{ request()->is('kategori')? 'active' : '' }}">
            <a href="/kategori">
                <i class="fa fa-bars"style="color:blue"></i>

                <span> Kategori</span>
            </a>
        </li>
        <li class="{{ request()->is('produk')? 'active' : '' }}">
            <a href="/produk">
                <i class="fa  fa-cart-plus"style="color:green"></i>

                <span> Produk </span>
            </a>
        </li>
        <li class="{{ request()->is('kupon')? 'active' : '' }}">
            <a href="/kupon">
                <i class="fa fa-money"></i>

                <span> Kupon </span>
            </a>
        </li>
        <li class="{{ request()->is('pesanan')? 'active' : '' }}">
            <a href="/pesanan">
                <i class="fa  fa-file-archive-o"style="color:red"></i>

                <span> Pesanan </span>
            </a>
        </li>

        <li class="{{ request()->is('pembayaran')? 'active' : '' }}">
            <a href="/pembayaran">
                <i class="fa  fa-money"style="color:green"></i>

                <span>  Pembayaran </span>
            </a>
        </li>
        <li class="{{ request()->is('pelanggan')? 'active' : '' }}">
            <a href="/pelanggan">
                <i class="fa fa-users"></i>

                <span>  Pelanggan </span>
            </a>
        </li>
        <li class="{{ request()->is('review')? 'active' : '' }}">
            <a href="/review">
                <i class="fa  fa-edit "style="color:green"></i>

                <span> Review Pelanggan </span>
            </a>
        </li>
        <li class="{{ request()->is('kontak')? 'active' : '' }}">
            <a href="/kontak">
                <i class="fa fa-phone" style="color:green"></i>

                <span>  Kontak </span>
            </a>
        </li>



</ul>
