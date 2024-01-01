<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
        <div class="navbar-collapse justify-content-start">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Dentist" height="50">
            </a>
        </div>        
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <a class="nav-link text-prim font-weight-bold" href="{{ url('/') }}" style="font-weight: bold;">Home</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-prim" href="{{ url('/about') }}" style="font-weight: bold;">About</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-prim" href="#footer" style="font-weight: bold;">Contact Us</a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end">
            <a class="navbar-brand" href="#">
                <i class="fa fa-user"></i>
            </a>
        </div>
    </div>
</div>