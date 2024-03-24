@extends('include.sidebar')

@section('title', 'Dentist - Informasi')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h3><b>Informasi</b></h3>
    
    <div class="box-info mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        @foreach($informasi as $info)
        <div class="card-info bg-light rounded p-3 w-100 d-flex flex-column gap-2 justify-content-center align-items-center"
             onclick="window.location='{{ route('user.info_detail', $info->id) }}'"
             style="cursor: pointer">
            <div class="card-header-info">
                <div class="title-info">
                    <h4><b>{{ $info->judul }}</b></h4>
                </div>
            </div>
            <div class="card-body-info">
                <img src="{{ asset('storage/' . $info->gambar) }}" class="w-100" alt="Gambar Informasi">
            </div>
            <div class="card-footer-info">
                <p class="text-justify">{{ $info->isi_informasi }}</p>
            </div>
        </div>    
        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
