

<!DOCTYPE html>
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

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/css/style_sidebar.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/jquery.min.js', 'resources/js/bootstrap.min.js', 'resources/js/popper.js']); ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            
            <img src="<?php echo e(asset('assets/img/logo3.png')); ?>" alt="Logo Dentist" height="80"
                class="logo mt-lg-5 mb-lg-3">
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><span class="fa fa-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-th-list" aria-hidden="true"></span> Daily Activity
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" id="quiz">Quiz</a></li>
                        <li><a class="dropdown-item" href="#" id="14days">14 Days</a></li>
                        <li><a class="dropdown-item" href="#" id="video-link">Video</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-cogs" aria-hidden="true"></span> Teeth Q
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" id="pretest-link">Pretest</a></li>
                        <li><a class="dropdown-item" href="#" id="activity-link">Postest</a></li>
                    </ul>
                </li>
                <li>
                    
                    <a href="#" class="dropdown-toggle text-0" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-bell" aria-hidden="true"></span> Information
                    </a>
                    <ul class="dropdown-menu text-bg-secondary" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" id="info-link">Informasi Umum</a></li>
                        <li><a class="dropdown-item" href="#" id="panduan-link">Panduan Tans</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span class="fa fa-sign-out"></span> Logout</a>
                </li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            

            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/include/sidebar_admin.blade.php ENDPATH**/ ?>