<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Panduan Pretest</title>
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
        <div class="time-panduan p-3">
          <h1>Test Debris Tans Dent</h1>
          <p>Tangaal : 2 Februari 2024</p>
          <p>Jam : 07.00</p>
        </div>
        <div class="panduan-pretest d-flex flex-column align-items-center m-auto w-90">
          <div class="title-panduan-pretest">
            <h1>Panduan mengisi test debris</h1>
          </div>
          <div class="box-panduan">
            <p>Pre-test dentist digunakan untuk mengetahui pengetahuan, sikap, tindakan serta debris indikator pada anak.
              Dalam hal ini pre test akan di bagi dalam empat sesi pengisian:
            </p>
            <p>1.Test pengetahuan</p>
            <p>1.Test sikap</p>
            <p>1.Test tindakan</p>
            <p>1.Test debris index</p>
            <p>Selama proses menjalankan test anak diharapkan untuk menyelesaikan seluruh test yang ada.
              Apabila sudah berhasil mengisi pre test anak dapat mengakses menu lain yang tersedia di tans dent ini.
            </p>
            <p>Semangat dan selamat mengerjakan!</p>
          </div>
          <div class="button-panduan p-3">
            <button class="rounded" onclick="window.location='/user/index'">Kembali</button>
            <button class="rounded" onclick="window.location='/user/test_debris'">Mulai kerjakan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>