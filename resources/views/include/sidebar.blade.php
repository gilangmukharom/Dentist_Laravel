<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    {{ config('app.name', 'Laravel') }}
  </title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-1 sidebar">
        <div class="position-sticky">
          <img src="{{ asset('assets/img/logo3.png') }}" alt="Logo Dentist" height="50" class="mt-lg-5 mb-lg-3">
          <ul class="nav flex-column gap-3 gap-lg-4">
            <li class="nav-item">
              <a class="nav-link active text-0" href="#" id="dashboard-link">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn dropdown-toggle text-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-th-list" aria-hidden="true"></i> Daily Activity
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#" id="quiz">Quiz</a></li>
                  <li><a class="dropdown-item" href="#" id="14days">14 Days</a></li>
                  <li><a class="dropdown-item" href="#" id="video-link">Video</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn dropdown-toggle text-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-cogs" aria-hidden="true"></i> Teeth Q
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#" id="activity-link">Pretest</a></li>
                  <li><a class="dropdown-item" href="#" id="activity-link">Postest</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn dropdown-toggle text-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell" aria-hidden="true"></i> Information
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#" id="info-link">Informasi Umum</a></li>
                  <li><a class="dropdown-item" href="#" id="panduan-link">Panduan Tans</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                <span>Logout</span>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </ul>
        </div>
      </nav>

      <!-- Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="main-content">
        <!-- Toggle Sidebar Button -->
        <button class="btn btn-toggle d-md-none w-100 bg-1" id="sidebarToggle">
          <i class="fa fa-align-justify" aria-hidden="true"></i>
          <span>Menu</span>
        </button>
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Fungsi untuk memuat konten dinamis
      function loadContent(url) {
        $.ajax({
          url: url,
          type: 'GET',
          success: function(data) {
            var content = $(data).find('#main-content').html();

            // Update the main content
            $('#main-content').html(content);

            // Remove 'active' class from all links
            $('.nav-link').removeClass('active');
            $('.dropdown-item').removeClass('active');

            // Set 'active' class to the clicked link
            $('[href="' + url + '"]').addClass('active');
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }


      // Handle clicks on sidebar links using event delegation
      $(document).on('click', '.nav-link, .dropdown-item', function(e) {
        e.preventDefault(); // Prevent default navigation

        var linkId = $(this).attr('id');

        // Load content based on the clicked link
        if (linkId === 'dashboard-link') {
          loadContent('{{ route("user.index") }}');
        } else if (linkId === 'activity-link') {
          loadContent('{{ route("user.activity") }}');
        } else if (linkId === 'video-link') {
          loadContent('{{ route("user.video") }}');
        } else if (linkId === 'teeth-link') {
          loadContent('{{ route("user.teethq") }}');
        } else if (linkId === 'info-link') {
          loadContent('{{ route("user.info") }}');
        } else if (linkId === '14days') {
          loadContent('{{ route("user.14days") }}');
        } else if (linkId === 'quiz') {
          loadContent('{{ route("user.quiz") }}');
        } else if (linkId === 'panduan-link') {
          loadContent('{{ route("user.panduan") }}');
        }

        $('.nav-link').removeClass('active text-1');
        $(this).addClass('active text-1');


        $('li.nav-item').removeClass('bg-light rounded');
        $(this).closest('li.nav-item').addClass('bg-light rounded');
      });
    });
  </script>
</body>

</html>