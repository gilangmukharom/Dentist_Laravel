@extends('include.sidebar')

@section('title', 'Dentist - Informasi Detail')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Informasi Detail</h1>
    <div class="box-info-detail mb-4 rounded p-3">
        <div class="navigasi-info-detail">
            <a href="{{ route('user.info') }}">Kembali</a>
        </div>
        <div class="content-info-detail d-flex flex-column gap-4">
            <div class="image-info-detail w-auto h-50">
                <img src="{{ asset('storage/' . $informasi->gambar) }}" class="w-100 h-100" alt="Gambar Informasi">
            </div>
            <div class="text-info-detail">
                <div class="title-info-detail">
                    <h1><b>{{ $informasi->judul }}</b></h1>
                </div>
                <div class="desc-info-detail">
                    <p class="text-justify">{{ $informasi->isi_informasi }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
