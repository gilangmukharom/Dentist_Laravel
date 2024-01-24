<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Quiz Keterampilan</title>
</head>

<body class="login-body">
    <div class="navigasi-keterampilan d-flex justify-content-between align-items-center p-2">
        <div class="title-keterampilan">
            <h1>Quiz</h1>
            <p class="text-0">Keterampilan Gigi dan Mulut</p>
        </div>
        <div class="timer-keterampilan bg-light rounded-5 p-2">
            <h1 id="timer">30</h1>
        </div>
    </div>
    <div class="box-keterampilan d-flex flex-column justify-content-center align-items-center">
        <div class="soal-keterampilan m-5 bg-light p-4 rounded-5">
            <h1>Plak gigi dapat dibersihkan dengan cara?</h1>
        </div>
        <div class="jawaban-keterampilan d-flex flex-column flex-lg-row flex-md-row flex-sm-column gap-5 justify-content-center align-items-center">
            <img src="{{asset('assets/img/Keterampilan/1.png')}}" class="w-25" alt="">
            <img src="{{asset('assets/img/Keterampilan/2.png')}}" class="w-25" alt="">
            <img src="{{asset('assets/img/Keterampilan/3.png')}}" class="w-25" alt="">
        </div>
    </div>
</body>

</html>