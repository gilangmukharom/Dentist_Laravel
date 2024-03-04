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
            <div class="leaderboard">
                <table class="w-100">
                    <tr class="text-center">
                        <td class="p-3">
                            <p>No</p>
                        </td>
                        <td class="p-3">
                            <p>Nama</p>
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
                            <p>Skor Daily</p>
                        </td>
                    </tr>
                    <tr class="rounded border shadow text-center">
                        <td class="pt-4 pb-4">1</td>
                        <td class="pt-4 pb-4">{{$username}}</td>
                        <td>{{$kategori_sikap}}</td>
                        <td>{{$kategori_tindakan}}</td>
                        <td>{{$kategori_pengetahuan}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
