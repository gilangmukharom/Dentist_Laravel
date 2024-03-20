<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/style.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    @include('include.navbar')
  </nav>

  <div class="header position-relative w-100">
    <div class="img-wrapper w-100 h-auto">
      <img src="{{ asset('assets/img/coverlp.jpg') }}" alt="Dentist Trans" class="img-fluid w-100 h-100">
    </div>
    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
      <h1>Selamat Datang di Tans’ Dent </h1>
      <p>Tan’s Dent-Card QR Model Berbasis Website merupakan website edukasi menggosok gigi dengan media
        interaktif untuk memfasilitasi keterampilan menggosok gigi anak usia dini</p>
      <button value="Masuk" class="btn bg-2 w-50" onclick="window.location="{{ url('/login') }}">Masuk</button>
    </div>
  </div>

  <div class="container-card mt-5 p-3">
    <div class="card-content d-flex flex-wrap flex-lg-nowrap gap-3 justify-content-between w-90 m-auto">
      <div class="card w-70 m-auto">
        <img src="{{ asset('assets/img/card.png') }}" alt="" srcset="">
      </div>
      <div class="card w-70 m-auto">
        <img src="{{ asset('assets/img/card2.png') }}" alt="" srcset="">
      </div>
      <div class="card w-70 m-auto">
        <img src="{{ asset('assets/img/card3.png') }}" alt="" srcset="">
      </div>
    </div>
  </div>

  <div class="container-text d-flex flex-row justify-content-between w-90 m-auto mt-5 pb-5">
    <div class="text-content d-flex flex-column justify-content-center">
      <h2>Mari Jaga Kesehatan Gigimu!</h2>
      <p class="w-80 text-start">Menjaga kesehatan gigi dan mulut sebenarnya tidak sulit karena dapat dilakukan sendiri di rumah. Yang
        terpenting adalah sikap konsisten dan menjadikannya sebagai bagian dari rutinitas. Kebiasaan yang harus
        dilakukan untuk menjaga mesehatan gigi dan mulut adalah rutin menggosok gigi, menggunakan sikat gigi
        yang lembut dan pasta gigi berflouride, berkumur dengan obat kumur, membersihkan gigi menggunakan benang
        gigi, memeriksakan secara teratur ke dokter gigi, membatasi konsumsi gula, tidak merokok dan menghindari
        minuman bersoda.</p>
      <h5>WHO (World Health Organization)</h5>
    </div>
    <div class="text-image d-none d-lg-block">
      <img src="{{ asset('assets/img/content1.png') }}" alt="" class="w-80">
    </div>
  </div>

  <div class="container-gallery w-100 bg-1 p-5">
    <h1 class="text-center text-white m-5">Gallery Video Edukasi Menyikat Gigi</h1>
    <div class="content-gallery d-flex justify-content-around p-5 flex-wrap gap-sm-5">
      <div class="youtube_frame">
        <iframe src="https://www.youtube.com/embed/nvOHBRzDs4A" class="w-100 h-100"></iframe>
      </div>
      <div class="youtube_frame">
        <iframe src="https://www.youtube.com/embed/nvOHBRzDs4A" class="w-100 h-100"></iframe>
      </div>
    </div>
  </div>

  <div class="container-testi">
    <h1 class="text-center text-1 p-5"><b>Testimonial</b></h1>
    <div class="content-testi d-flex">
      <div class="card-testi w-50 d-none d-lg-block p-0">
        <img src="{{ asset('assets/img/home-testi.png') }}" alt="" class="w-80 h-auto">
      </div>
      <div class="container-slider">
        <div class="card-slider">
          <div class="card border-0">
            <img src="{{ asset('assets/img/testi-2.png') }}" alt="" class="w-25 m-auto">
            <div class="card-body">
              <p class="card-text">Antarmuka aplikasi ini berwarna-warni dan intuitif, cocok untuk pengguna dari segala usia. Ini juga terintegrasi dengan sikat gigi pintar, memberikan data secara real-time tentang kebiasaan menyikat gigi. Selain itu, SmilePal menyertakan fitur yang memungkinkan pengguna menetapkan tujuan kesehatan gigi dan melacak kemajuan mereka dari waktu ke waktu.</p>
              <p class="card-text text-center"><strong>Jane Doe</strong></p>
            </div>
          </div>
          <div class="card border-0">
            <img src="{{ asset('assets/img/testi-2.png') }}" alt="" class="w-25 m-auto">
            <div class="card-body">
              <p class="card-text">Antarmuka aplikasi ini berwarna-warni dan intuitif, cocok untuk pengguna dari segala usia. Ini juga terintegrasi dengan sikat gigi pintar, memberikan data secara real-time tentang kebiasaan menyikat gigi. Selain itu, SmilePal menyertakan fitur yang memungkinkan pengguna menetapkan tujuan kesehatan gigi dan melacak kemajuan mereka dari waktu ke waktu.</p>
              <p class="card-text text-center"><strong>Jane Doe</strong></p>
            </div>
          </div>
          <div class="card border-0">
            <img src="{{ asset('assets/img/testi-2.png') }}" alt="" class="w-25 m-auto">
            <div class="card-body">
              <p class="card-text">Antarmuka aplikasi ini berwarna-warni dan intuitif, cocok untuk pengguna dari segala usia. Ini juga terintegrasi dengan sikat gigi pintar, memberikan data secara real-time tentang kebiasaan menyikat gigi. Selain itu, SmilePal menyertakan fitur yang memungkinkan pengguna menetapkan tujuan kesehatan gigi dan melacak kemajuan mereka dari waktu ke waktu.</p>
              <p class="card-text text-center"><strong>Jane Doe</strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    @include('include.footer')
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>