<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Register</title>
</head>

<body class="register-body">
  <div class="container-fluid container-register d-flex flex-wrap flex-lg-nowrap min-vh-100">
    <div class="register-content d-flex flex-column w-100">
      <div class="register-logo">
        <img src="{{ asset('assets/img/logo2.png') }}" alt="logo tans dent" class="m-4" height="40">
      </div>
      <div class="register-box d-flex flex-column m-5">
        <div class="register-title">
          <h1 class="text-white text-left">Hallo, Belum punya akun?</h1>
        </div>
        <div class="register-animation text-left">
          <p class="text-white">
            Silahkan daftar diri anda untuk explorasi lebih luas, Tans Dent merupakan aplikasi menggosok gigi berbasis website dengan model QR dengan media interaktif untuk memfasilitasi keterampilan menggosok gigi anak usia dini
          </p>
        </div>
      </div>
    </div>

    <div class="register-form w-100 m-auto">
      <form action="" method="post" class="form-control d-flex flex-column gap-2 m-auto">
        <h1 class="m-auto p-3">Register</h1>
        <div class="register-username d-flex flex-column form-group">
          <label for="username">Username<span class="text-danger">*</span></label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="register-tempat d-flex flex-column form-group">
          <label for="tempat">Tempat Lahir<span class="text-danger">*</span></label>
          <input type="text" name="tempat" class="form-control">
        </div>
        <div class="register-tanggal d-flex flex-column form-group">
          <label for="tanggal">Tanggal Lahir<span class="text-danger">*</span></label>
          <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="register-alamat d-flex flex-column form-group">
          <label for="alamat">Alamat<span class="text-danger">*</span></label>
          <input type="text" name="alamat" class="form-control">
        </div>
        <div class="register-sekolah d-flex flex-column form-group">
          <label for="sekolah">Sekolah<span class="text-danger">*</span></label>
          <input type="text" name="sekolah" class="form-control">
        </div>
        <div class="register-ortu d-flex flex-column form-group">
          <label for="ortu">Nama Orang Tua<span class="text-danger">*</span></label>
          <input type="text" name="ortu" class="form-control">
        </div>

        <div class="form-group password-input-group">
          <label for="password">Password<span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>
        </div>

        <input type="submit" value="Submit" class="bg-2 w-50 m-auto btn">

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