<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dentist - Panduan Pretest</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
  <div class="container-panduan min-vh-100 d-flex justify-content-center position-relative">
    <div class="box-panduan-pretest z-0 w-100">
      <div class="logo position-absolute">
        <img src="{{ asset('assets/img/logo2.png') }}" alt="logo tans dent" class="m-4" height="40">
      </div>
      <div class="bg-panduan-pretest w-100 h-100">
        <img class="w-100 object-fit-cover" src="{{ asset('assets/img/Internet-Website-PNG-Photos.png') }}" alt="">
      </div>
    </div>
    <div class="content-panduan-pretest w-90 z-1 bg-light rounded position-absolute align-self-center">
      <div class="title-panduan">
        <div class="time-panduan p-3 w-50">
          <h1>Selamat kamu berhasil melanjutkan ke soal bagian 2</h1>
        </div>
        <div class="panduan-pretest d-flex flex-column align-items-center m-auto w-90">
          <div class="title-panduan-pretest">
            <h2>Panduan mengisi test sikap</h2>
          </div>
          <div class="box-panduan">
            <p>Pada bagian test sikap ini kamu di tugaskan memilih yang paling setuju atau tidak setuju dalam jawabanmu.
                Setiap jawaban yang benar akan memperoleh poin 4.
            </p>
            <p>Dengan keterangan sebagai berikut:</p>
            <table class="border border-2 border-black">
                <tr>
                    <td>SS</td>
                    <td class="gap">:</td>
                    <td>Sangat Setuju</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td class="gap">:</td>
                    <td>Setuju</td>
                </tr>
                <tr>
                    <td>TS</td>
                    <td class="gap">:</td>
                    <td>Tidak Setuju</td>
                </tr>
                <tr>
                    <td>STS</td>
                    <td class="gap">:</td>
                    <td>Sangat Tidak Setuju</td>
                </tr>
            </table>
            <p>Semangat dan selamat mengerjakan!</p>
          </div>
          <div class="button-panduan p-3">
            <button class="rounded" onclick="window.location='/user/index'">Kembali</button>
            <button class="rounded" onclick="window.location='/user/test_sikap'">Mulai kerjakan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>