@extends('include.sidebar')

@section('content')
    <div class="container-dashboard p-5">
        <div class="header-dashboard d-flex justify-content-between">
            <div class="title-dashboard">
                <h1>Dashboard</h1>
            </div>
            <div class="profile-dashboard">
                <h1>sajdsab</h1>
            </div>
        </div>

        <div class="body-dashboard">
            <div class="notes-dashboard">
                <div class="title-notes">Daily activity 14 Days</div>
                <div class="body-notes">Selamat Datang, Intan! Yuk mulai aktivitas hari ini</div>
                <div class="notes-button">
                    <a href="#" class="btn btn-primary">Mulai</a>
                </div>
            </div>
            <div class="calendar-dashboard">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
@endsection
