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

  @vite(['resources/css/style.css', 'resources/js/app.js'])

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.0/main.min.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-1 sidebar">
        <div class="position-sticky">
          <img src="{{ asset('assets/img/logo3.png') }}" alt="Logo Dentist" height="50" class="mt-lg-5 mb-lg-3">
          <ul class="nav flex-column gap-3 gap-lg-4">
            <li class="nav-item">
              <a class="nav-link active text-0" href={{ route('admin.index') }} id="dashboard-link">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active text-0" href={{ route('admin.setting') }} id="setting-link">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Reset Data</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active text-0" href="{{ route('admin.informasi') }}" id="info-link">
                <i class="fa fa-bell" aria-hidden="true"></i>
                <span>Informasi</span>
              </a>
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
        <button class="btn btn-toggle d-md-none w-100 bg-1" id="sidebarToggle">
          <i class="fa fa-align-justify" aria-hidden="true"></i>
          <span>Menu</span>
        </button>
      </nav>

      <!-- Content -->
      <main class="col-md-10 ms-sm-auto col-lg-10" id="main-content">
        <!-- Toggle Sidebar Button -->
        <button class="btn btn-toggle d-md-none w-50 bg-1" id="sidebarToggle">
          <i class="fa fa-align-justify" aria-hidden="true"></i>
          <span>Menu</span>
        </button>
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#sidebarToggle').on('click', function() {
        $('#sidebar').toggleClass('d-none'); // Toggling the sidebar visibility
        $('#main-content').toggleClass('col-md-9 ms-sm-auto col-lg-10'); // Adjusting main content width
      });
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
        } else if (linkId === 'setting-link') {
          loadContent('{{ route("admin.setting") }}');
        } else if (linkId === 'info-link') {
          loadContent('{{ route("admin.informasi") }}');
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

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <nav id="sidebar" class="active">
            {{-- <h1><a href="index.html" class="logo">M.</a></h1> --}}
            {{-- {{-- ?
</html> --}}
