<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand me-5" href="#">SEBURA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-center me-3">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li>
                        @if(auth()->user() !== null)
                        <p class="text-info mt-2 me-3"><i class="fa fa-user me-1"></i>Hallo, {{ auth()->user()->nama }}
                        </p>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/pengurus">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/visidanmisi">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="/strukturpengurus">Struktur Kepengurusan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pageacara">Acara</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form class="d-flex">
                <a class="btn btn-outline-success" href='/logout'>LOGOUT</a>
            </form>
        </div>
    </div>
</nav>
