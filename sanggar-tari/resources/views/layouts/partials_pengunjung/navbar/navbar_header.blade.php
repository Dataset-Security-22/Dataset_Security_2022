<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        {{-- <div>
            <a class="navbar-brand" href="#page-top"><img src="{{ url('/landing') }}/assets/img/LOGO-TARI.IN.png" width="300px" height="800px" alt="..." /></a>
        </div> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pengunjung/kategori/') }}">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pengunjung/form/store') }}">Form</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                
                @if(empty(auth()->user()->name))
                {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/admin/login') }}"> Login </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/login') }}"> Login </a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ url('/pengunjung/full-calender/') }}">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/logout') }}"> Logout </a></li>
                @endif
                
            </ul>
        </div>
    </div>
</nav>
