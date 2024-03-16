<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Login</title>
</head>

<body class="error-body">
  <div class="container-fluid container-login min-vh-100">
    <div class="login-content d-block w-100">
      <div class="login-logo">
        <img src="<?php echo e(asset('assets/img/logo2.png')); ?>" alt="logo tans dent" class="m-4" height="40">
      </div>
    </div>

    <div class="error-content w-75 bg-white rounded-4 p-5 m-auto mt-5">
        <div class="error-box w-50 d-flex flex-column m-auto align-items-center">
            <h1>Maaf Halaman Ini Dapat Diakses Ketika Sudah Login</h1>
            <p>Silahkan login Terlebih Dahulu Ya...</p>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
        </div>
    </div>
  </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/auth/error.blade.php ENDPATH**/ ?>