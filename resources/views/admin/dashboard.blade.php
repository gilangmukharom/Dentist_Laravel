@extends('include.sidebar_admin')

@section('content')
    <div class="container-dashboard pt-2">
        <div class="header-dashboard d-flex justify-content-between p-4">
            <div class="title-dashboard">
                <h2>Dashboard</h2>
            </div>
        </div>

        <div class="body-dashboard bg-1 rounded position-relative d-flex justify-content-between">
            <div class="notes-dashboard p-5 text-white">
                <h1>Selamat datang, dokter!</h1>
                <p>semangat untuk hari ini</p>
            </div>
            <div class="element-dashboard d-flex justify-content-evenly w-50 position-absolute mt-5">
                <div class="card-element bg-body-secondary rounded shadow d-flex flex-column justify-content-between">
                    <div class="header-element p-2">Jumlah</div>
                    <div class="body-element text-center">
                        <h1>29 Siswa</h1>
                    </div>
                    <div class="footer-element w-100"><img class="w-100" src="{{ asset('assets/img/wave-dokter.png') }}"
                            alt=""></div>
                </div>
                <div class="card-element bg-body-tertiary rounded shadow" id="calendar">
                </div>
            </div>
        </div>

        <div class="main-content mt-5">
            <table class="w-100">
                <tr class="text-center">
                    <td class="p-3">
                        <p>Nama</p>
                    </td>
                    <td>
                        <p>Tanggal</p>
                    </td>
                    <td>
                        <p>Skor Sikap</p>
                    </td>
                    <td>
                        <p>Skor Tindakan</p>
                    </td>
                    <td>
                        <p>Skor Pengetahuan</p>
                    </td>
                    <td>
                        <p>Action</p>
                    </td>
                </tr>
                <tr class="rounded border shadow text-center">
                    <td class="pt-4 pb-4">Gilang</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td><button>Download</button></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

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
