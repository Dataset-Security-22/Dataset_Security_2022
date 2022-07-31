<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="#dashboard">MPM POLINDRA</a></h1>
        
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto" href="{{ url('/') }}"> Dashboard </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ url('/tentang_kami') }}">Tentang Kami</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ url('/galeri') }}">
                        Galeri
                    </a>
                </li>
                <li>
                   <a href="{{ url('/blog') }}" class="nav-link">
                       Blog
                   </a> 
                </li>
                @if(empty(auth()->user()->nama))
                <li>
                    <a class="getstarted" href="{{ url('/login') }}">
                        Login
                    </a>
                </li>
                @elseif(auth()->user()->nama)
                <li class="dropdown">
                    <a href="#">
                        <span>Aspirasi</span> 
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('/form_aspirasi') }}"> Form </a>
                        </li>
                        <li>
                            <a href="#"> Data Aspirasi </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="getstarted" href="{{ url('/logout') }}">
                        Logout
                    </a>
                </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
