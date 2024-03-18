@extends('include.sidebar')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <div class="container-dashboard p-5">
        <div class="header-dashboard d-flex justify-content-between">
            <div class="title-dashboard">
                <h1><b>Dashboard</b></h1>
            </div>
            <div class="profile-dashboard">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-inline-flex align-items-center gap-2" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-picture">
                            <img src="{{ asset('assets/img/profile.png') }}" alt="profile">
                        </div>
                        <div class="profile-name">
                            <p>Gilang Mukharom</p>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><button class="dropdown-item"
                                onclick="window.location.href='{{ route('user.edit-profile') }}'">Edit Profile</button></li>
                        <li><button class="dropdown-item"
                                onclick="window.location.href='{{ route('logout') }}'">Logout</button></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-dashboard">
            <div class="content-dashboard-student d-flex flex-rows gap-2">
                <div class="opening-dashboard w-75">
                    <div class="card w-100 h-100 d-flex flex-column justify-content-evenly align-items-start p-5">
                        <div class="title-card">
                            <p>Daily Activity 14 Days</p>
                        </div>
                        <div class="body-card w-50">
                            <h3 class="text-white">Selamat datang Izzul! Yuk mulai aktifitas hari ini</h3>
                        </div>
                        <div class="footer-card">
                            <button onclick="location.href='/user/14days'" type="btn"
                                style="background-color: #FFBD13; color:white; width: 150px" class="btn p-2">Mulai</button>
                        </div>
                    </div>
                </div>
                <div class="card-element bg-body-tertiary rounded shadow w-25" id="calendar"> </div>
            </div>
            <div class="dashboard-performance">
                <p><b>Performance</b></p>
                <div class="stat_performance d-flex flex-columns gap-2">
                    <div class="m-5 w-50 bg-white rounded shadow">
                        {!! $chart2->container() !!}
                    </div>
                    <div class="p-6 m-5 w-25 bg-white rounded shadow d-flex justify-content-center align-items-center">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            <div class="leaderboard">
                <p><b>Leaderboard Score</b></p>
                <table class="w-100">
                    <tr class="text-center header-table">
                        <td class="p-1">
                            <p>No</p>
                        </td>
                        <td class="p-1">
                            <p>Nama</p>
                        </td>
                        <td class="p-1">
                            <p>Skor Sikap</p>
                        </td>
                        <td>
                            <p>Skor Tindakan</p>
                        </td>
                        <td>
                            <p>Skor Pengetahuan</p>
                        </td>
                        <td>
                            <p>Skor Daily</p>
                        </td>
                    </tr>
                    @foreach ($userData as $index => $data)
                    <tr class="rounded border shadow text-center">
                        <td class="pt-4 pb-4">{{ $index + 1 }}</td>
                        <td class="pt-4 pb-4">{{ $data['username'] }}</td>
                        <td>{{ $data['kategori_sikap'] }}</td>
                        <td>{{ $data['kategori_tindakan'] }}</td>
                        <td>{{ $data['kategori_pengetahuan'] }}</td>
                        <td>{{ $data['kategori_daily'] }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
            <a href="{{ route('user.cetak_laporan') }}" class="btn btn-primary">Generate PDF</a>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <script src="{{ $chart->cdn() }}"></script>
    <script src="{{ $chart2->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart2->script() }}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
@endsection
