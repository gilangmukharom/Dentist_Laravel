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
                <div class="about-text position-absolute">
                    <h1>About Us</h1>
                    <p>GIO Dental Care are located in Strategic Locations in Yogyakarta (Babarsari, Ambarukmo, Seturan,
                        Gejayan, Kaliurang, Godean), Magelang, Semarang, Jember, and Bali (Denpasar), Indonesia.
                        GiO has a team of dentists and specialist dentists who are ready to provide the best service for
                        you, with the typical hospitality of the Indonesian people, known for their honesty, always
                        giving their best, providing extraordinary care for your dental needs.
                        Find Quality, Excellence, and comfortable personal care at each of our clinics.
                        GiO Restores, Beautifies, and Enhances the natural beauty of your smile with the latest
                        technology, resulting in a healthy and beautiful smile. We treat yours wholeheartedly.
                        Sayang GiO, Ingat Gigi, Ingat GiO!</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
