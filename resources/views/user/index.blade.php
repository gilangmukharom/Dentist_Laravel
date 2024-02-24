@extends('include.sidebar')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <div class="container-dashboard p-5">
        <div class="header-dashboard d-flex justify-content-between">
            <div class="title-dashboard">
                <h1>Dashboard</h1>
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
                        <li><button class="dropdown-item" onclick="window.location.href='{{ route('user.edit-profile') }}'">Edit Profile</button></li>
                        <li><button class="dropdown-item" onclick="window.location.href='{{ route('logout') }}'">Logout</button></li>                        
                    </ul>
                </div>
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
@endsection
