<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dentist - About</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        @include('include.navbar')
    </nav>

    <div class="container-about">
        <div class="img-about w-100">
            <div class="position-absolute top-50 start-20 text-center text-white">
                <h3 class="text-1"><b>Welcome to the official website</b></h3>
                <h1 class="text-1"><b>Tans Dent</b></h1>
            </div>
            <img src="{{ asset('assets/img/bg-about.png') }}" alt="" class="w-100 h-100">
        </div>

        <div class="about-box w-100">
            <div class="about-content w-100 position-relative">
                <div class="about-text position-absolute p-4 text-justify">
                    <h1>About Us</h1>
                    </h1>
                    <p>Tan’s Dent-Card QR Model Berbasis Website ” merupakan suatu model yang dirancang untuk
                        meningkatkan perilaku menggosok gigi pada anak sekolah dasar dengan menggunakan Dent-Card QR
                        Model sebagai sarana pendukungnya selama 14 hari. Dent-Card ini dilengkapi dengan QR sebagai
                        kode barcode utuk mengakses laman website aktifitas harian menggosok gigi.</p>
                        
                        <p>Dent-Card ini didesain dengan menarik sebagai model yang dirancang sebagai upaya meningkatkan
                        perilaku menggosok gigi yang berbasis website meliputi monitoring toothbrush daily activity,
                        intruksi menggosok gigi, dan feedback sebagai daily activty anak dalam menggosok gigi serta
                        video edukasi.</p>
                        
                        <p>Hasil output Tan’s Dent Card dapat dilihat oleh tenaga kesehatan gigi sebagai track record
                        informasi tentang kesehatan gigi khususnya menggosok gigi pada anak sekolah dasar.</p>
                </div>
                <div class="about-image w-100 z-3">
                    <img src="{{ asset('assets/img/login-animation.png') }}" alt=""
                        class="w-25 position-absolute img-about1 z-2">
                    <img src="{{ asset('assets/img/wave.png') }}" alt=""
                        class="about-wave position-absolute z-1">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
