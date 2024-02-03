<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/style.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Register</title>
</head>

<body class="register-body">

  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Registrasi Berhasil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if(Auth::user())
          <p>Selamat datang,
            {{ Auth::user()->username }}!
          </p>
          <p>Registrasi Anda berhasil.</p>
          @else
          <p>Registrasi Anda berhasil.</p>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

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
      <form action="{{ url('/register_auth') }}" id="registerForm" method="post" class="form-control d-flex flex-column gap-2 m-auto p-3">
        @csrf
        <h1 class="m-auto p-3">Register</h1>
        <div class="register-username d-flex flex-column form-group">
          <label for="username">Username<span class="text-danger">*</span></label>
          <input type="text" name="username" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="register-tempat d-flex flex-column form-group">
          <label for="tempat">Tempat Lahir<span class="text-danger">*</span></label>
          <input type="text" name="tempat_lahir" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="register-tanggal d-flex flex-column form-group">
          <label for="tanggal">Tanggal Lahir<span class="text-danger">*</span></label>
          <input type="date" name="tanggal_lahir" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="register-alamat d-flex flex-column form-group">
          <label for="alamat">Alamat<span class="text-danger">*</span></label>
          <input type="text" name="alamat" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="register-sekolah d-flex flex-column form-group">
          <label for="sekolah">Sekolah<span class="text-danger">*</span></label>
          <input type="text" name="sekolah" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>
        <div class="register-ortu d-flex flex-column form-group">
          <label for="ortu">Nama Orang Tua<span class="text-danger">*</span></label>
          <input type="text" name="nama_ortu" class="form-control" required>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-group password-input-group">
          <label for="password">Password<span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <input type="submit" id="submitBtn" class="bg-2 w-50 m-auto btn" data-bs-toggle="modal" data-bs-target="#successModal">

      </form>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  @if(Session::has('success'))
  <script>
    $(document).ready(function() {
      $('#successModal').modal('show');
    });
  </script>
  @endif

  <script>
    $(document).ready(function () {
      // Intercept the form submission
      $('#registerForm').submit(function (event) {
        // Check if all required fields are filled
        var formIsValid = true;
  
        $('.form-control[required]').each(function () {
          if ($(this).val().trim() === '') {
            formIsValid = false;
            // Display invalid feedback
            $(this).siblings('.invalid-feedback').text('Field ini harus diisi.');
          } else {
            // Clear invalid feedback if the field is filled
            $(this).siblings('.invalid-feedback').text('');
          }
        });
  
        // If the form is not valid, prevent submission
        if (!formIsValid) {
          event.preventDefault();
        } else {
          // Show the success modal
          $('#successModal').modal('show');
          
          // Uncomment the line below if you want to submit the form after showing the success modal
          // $(this).off('submit').submit();
        }
      });
  
      // Toggle password visibility
      $('#password-toggle').click(function () {
        var passwordInput = $('#password');
        passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
      });
  
      // Clear validation messages when the input is valid
      $('#registerForm input').on('input', function () {
        var validField = $(this);
        validField.siblings('.invalid-feedback').text('');
      });
  
      // Disable submit button initially
      $('#submitBtn').attr('disabled', true);
  
      // Enable submit button only when all required fields are filled
      $('.form-control[required]').on('input', function () {
        var allFieldsFilled = true;
  
        $('.form-control[required]').each(function () {
          if ($(this).val().trim() === '') {
            allFieldsFilled = false;
            return false; // Exit the loop early if any field is empty
          }
        });
  
        $('#submitBtn').attr('disabled', !allFieldsFilled);
      });
    });
  </script>

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