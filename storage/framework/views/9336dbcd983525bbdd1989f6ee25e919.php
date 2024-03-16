<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>
    <?php echo e(config('app.name', 'Laravel')); ?>

  </title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Scripts -->
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-1 sidebar">
        <div class="position-sticky">
          <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Logo Dentist" height="50">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="dashboard-link">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="activity-link">
                Activity
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="video-link">
                Video
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="quiz-link">
                Quiz
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="info-link">
                Information
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="main-content">
        <!-- Toggle Sidebar Button -->
        <button class="btn btn-primary d-md-none" id="sidebarToggle">
          <i class="bi bi-list"></i>
          <span>Toggle Sidebar</span>
        </button>
        <?php echo $__env->yieldContent('content'); ?>
      </main>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Toggle sidebar on small screens
      $("#sidebarToggle").on("click", function() {
        $("#sidebar").toggleClass("d-none");
      });
    });

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

            // Set 'active' class to the clicked link
            $('[href="' + url + '"]').addClass('active');
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }


      // Handle clicks on sidebar links using event delegation
      $(document).on('click', '.nav-link', function(e) {
        e.preventDefault(); // Prevent default navigation

        var linkId = $(this).attr('id');

        // Load content based on the clicked link
        if (linkId === 'dashboard-link') {
          loadContent('<?php echo e(route("user.index")); ?>');
        } else if (linkId === 'activity-link') {
          loadContent('<?php echo e(route("user.activity")); ?>');
        } else if (linkId === 'video-link'){
          loadContent('<?php echo e(route("user.video")); ?>');
        }else if (linkId === 'quiz-link'){
          loadContent('<?php echo e(route("user.quiz")); ?>');
        }else if (linkId === 'info-link'){
          loadContent('<?php echo e(route("user.info")); ?>');
        }

        $('.nav-link').removeClass('active');

        // Add 'active' class to the clicked link
        $(this).addClass('active');

        // Remove 'bg-light' class from all list items
        $('li.nav-item').removeClass('bg-light rounded');

        // Add 'bg-light' class to the parent list item of the clicked link
        $(this).closest('li.nav-item').addClass('bg-light rounded');
      });
    });
  </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/include/app.blade.php ENDPATH**/ ?>