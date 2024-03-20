@extends('include.sidebar')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    @if ($cek_input_daily == false)
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
    <div class="container-dashboard">
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-auto" id="errorModalLabel"><b>Daily activity hari ini</b></h5>
                    </div>
                    <div class="modal-body">
                        <p>Yahhh... kamu belum mengisi daily activity pada hari ini, Yuk isi!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary m-auto" onclick="location.href='/user/14days'">Isi
                            sekarang</button>
                        <button type="button" class="btn btn-secondary m-auto" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
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
                            <p>{{$username}}</p>
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

        <div class="body-dashboard d-flex flex-wrap flex-column flex-lg-rows w-100">
            <div class="content-dashboard-student d-flex flex-lg-row flex-column gap-2 w-100">
                <div class="opening-dashboard w-100">
                    <div class="card w-100 h-100 d-flex flex-column justify-content-evenly align-items-start p-5">
                        <div class="title-card">
                            <p style="font-size: 1.5em;">Daily Activity 14 Days</p>
                        </div>
                        <div class="body-card w-100">
                            <h3 class="text-white" style="font-size: 2em;">Selamat datang {{$username}}</h3>
                            <h3 class="text-white" style="font-size: 2em;">Yuk mulai aktifitas hari ini!</h3>
                        </div>
                        <img class="index-header-img h-100 w-auto position-absolute" src="{{ asset('assets/img/index-header.png') }}" alt="">
                        <div class="footer-card">
                            <button onclick="location.href='/user/14days'" type="btn" style="background-color: #FFBD13; color:white; width: 20vw" class="btn p-2 rounded-3">Mulai</button>
                        </div>
                    </div>
                    
                </div>
                <div class="card-element calendar bg-body-tertiary rounded shadow" id="calendar"> </div>
            </div>

            <div class="dashboard-performance mt-5">
                <p><b>Performance</b></p>
                <div class="stat_performance d-flex flex-columns gap-5 flex-wrap">
                    <div class="chart_daily bg-white rounded shadow">
                        {!! $chart2->container() !!}
                    </div>
                    <div class="chart_teethq bg-white rounded shadow d-flex justify-content-center align-items-center">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            <div class="leaderboard w-100 mt-5">
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

    <script>
        var cek_input_daily_value = @json($cek_input_daily);
        console.log(cek_input_daily_value);
    </script>
@endsection
