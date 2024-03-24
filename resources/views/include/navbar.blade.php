@vite(['resources/css/style.css', 'resources/js/app.js'])

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse w-100" id="navbarNav">
    <div class="navbar-collapse w-70">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Dentist" height="50">
        </a>
    </div>
    <div class="navbar-link d-flex flex-row justify-content-between w-100">
        <ul class="navbar-nav">
            <li class="nav-item me-3">
                <a class="nav-link text-prim font-weight-bold" href="{{ url('/') }}"
                    style="font-weight: bold;">Home</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-prim" href="{{ url('/about') }}" style="font-weight: bold;">About</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link text-prim" href="{{ url('/') }}#footer" style="font-weight: bold;">Contact Us</a>
            </li>
        </ul>
    </div>
</div>
