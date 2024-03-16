@extends('include.sidebar')

@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Informasi</h1>
    
    <div class="box-info mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        <div class="card-info bg-light rounded p-3 w-25 d-flex flex-column gap-2 justify-content-center align-items-center"
        onclick="window.location='{{ route('user.info_detail') }}'"
        style="cursor: pointer">
            <div class="card-header-info">
                <div class="title-info">
                    <p>Data Implemetasi Dentist 2023</p>
                </div>
            </div>
            <div class="card-body-info w-auto h-50">
                <img src="{{asset('assets/img/info.png')}}" class="w-100 h-100" alt="">
            </div>
            <div class="card-footer-info">
                <p class="text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque soluta ab aut eius fugit esse praesentium ad inventore beatae, accusantium impedit omnis. Fugit accusantium cumque facere veniam labore? Voluptatibus, aspernatur?</p>
            </div>
        </div>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
