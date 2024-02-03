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
            <p class="text-0">Pengetahuan Gigi dan Mulut</p>
        </div>
        <div class="timer-pengetahuan bg-light rounded-5 p-2">
            <h1 id="timer">30</h1>
        </div>
    </div>
    <div class="box-pengetahuan d-flex flex-column justify-content-center align-items-center">
        <div class="soal-pengetahuan m-5 bg-light p-4 rounded-5">
            <h1>Manakah makanan yang tidak baik untuk gigi?</h1>
        </div>
        <div class="jawaban-pengetahuan d-flex flex-row gap-5 justify-content-center align-items-center">
            <img src="{{asset('assets/img/pengetahuan/1.png')}}" class="w-25" alt="">
            <img src="{{asset('assets/img/pengetahuan/2.png')}}" class="w-25" alt="">
        </div>
    </div>
</body>

</html>