<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Login</title>
</head>

<body class="login-body">
  <div class="container-fluid container-login d-flex flex-wrap flex-lg-nowrap min-vh-100">
    <div class="login-content d-flex flex-column w-100">
      <div class="login-logo">
        <img src="{{ asset('assets/img/logo2.png') }}" alt="logo tans dent" class="m-4" height="40">
      </div>
      <div class="login-box d-flex flex-column m-auto">
        <div class="login-title">
          <h1 class="text-white text-center">Hallo, Selamat Datang Kembali!</h1>
        </div>
        <div class="login-animation text-center">
          <img src="{{ asset('assets/img/login-animation.png') }}" alt="" class="img-fluid w-50 d-none d-lg-block m-auto">
        </div>
      </div>
    </div>

    <div class="login-form w-100 m-auto">
      <form action="" method="post" class="form-control d-flex flex-column gap-3 m-auto">
        <h1 class="m-auto">Login</h1>
        <div class="login-username d-flex flex-column">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group password-input-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <input type="submit" value="Login" class="bg-2 w-50 m-auto btn">

        <div class="register-buton m-auto">
          <a href="{{ route('register') }}" class="d-flex text-decoration-none"><p style="color: #A5A5A5">Belum punya akun?</p><p style="color: #FFBD13">Daftar disini</p></a>
        </div>

      </form>
    </div>
  </div>


  <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var showPasswordBtn = document.querySelector('.password-input-group button i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showPasswordBtn.className = 'fas fa-eye-slash';
        } else {
            passwordInput.type = 'password';
            showPasswordBtn.className = 'fas fa-eye';
        }
    }
</script>
</body>

</html>