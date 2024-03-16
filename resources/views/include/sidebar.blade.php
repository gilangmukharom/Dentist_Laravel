<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @vite(['resources/css/style.css', 'resources/css/style_sidebar.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/jquery.min.js', 'resources/js/bootstrap.min.js', 'resources/js/popper.js'])
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <img src="{{ asset('assets/img/logo3.png') }}" alt="Logo Dentist" height="80"
                class="logo mt-lg-5 mb-lg-3">
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="{{route('user.index')}}"><span class="fa fa-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-th-list" aria-hidden="true"></span> Daily Activity <span class="fa fa-caret-down"></span>
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('user.quiz')}}" id="quiz">Quiz</a></li>
                        <li><a class="dropdown-item" href="{{route('user.14days')}}" id="14days">14 Days</a></li>
                        <li><a class="dropdown-item" href="{{route('user.video')}}" id="video-link">Video</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-cogs" aria-hidden="true"></span> Teeth Q <span class="fa fa-caret-down"></span>
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('user.panduan_pretest')}}" id="pretest-link">Pretest</a></li>
                        <li><a class="dropdown-item" href="{{route('user.panduan_postest')}}" id="activity-link">Postest</a></li>
                    </ul>
                </li>
                <li>
                    {{-- <a href="#"><span class="fa fa-cogs"></span> Services</a> --}}
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-bell" aria-hidden="true"></span> Information <span class="fa fa-caret-down"></span>
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('user.info')}}" id="info-link">Informasi Umum</a></li>
                        <li><a class="dropdown-item" href="{{route('user.panduan')}}" id="panduan-link">Panduan Tans</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span class="fa fa-sign-out"></span> Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            </ul>

            {{-- <div class="footer">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                </p>
            </div> --}}
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            {{-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button> --}}

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    </div>

</body>

</html>
