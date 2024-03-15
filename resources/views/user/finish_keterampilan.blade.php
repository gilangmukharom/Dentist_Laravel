<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/style.css', 'resources/js/app.js']);
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Quiz Pengetahuan</title>
</head>

<body class="login-body">
    <div class="navigasi-pengetahuan d-flex justify-content-between align-items-center p-2">
        <div class="title-pengetahuan">
            <h1>Quiz</h1>
            <p class="text-0">Keterampilan Gigi dan Mulut</p>
        </div>
    </div>
    <div class="box-finish-pengetahuan d-flex flex-column justify-content-center align-items-center">
        <div class="title-finish-pengetahuan text-0">
            <h1>Selamat, kamu telah menyelesaikan quiz!</h1>
        </div>
        <div class="body-finish-pengetahuan d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('assets/img/award.png')}}" class="w-75" alt="">
            {{-- <p>Correct Answers: {{ $percentage }}</p> --}}
            <div class="button-finish d-flex gap-5">
                <button class="btn btn-light" onclick="location.href='/user/index'">Dashboard</button>
                <button class="btn btn-warning text-white" onclick="location.href='/user/skor_keterampilan'">Lihat Skor</button>
            </div>
        </div>
    </div>
</body>

</html>