@extends('include.sidebar')

@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js']);
    <h1 class="h2">Informasi Detail</h1>
    <div class="box-info-detail mb-4 rounded p-3">
        <div class="navigasi-info-detail">
            <p>Kembali</p>
        </div>
        <div class="content-info-detail d-flex flex-row gap-4">
            <div class="image-info-detail w-auto h-50">
                <img src="{{asset('assets/img/award.png')}}" class="w-100 h-100" alt="">
            </div>
            <div class="text-info-detail">
                <div class="title-info-detail">
                    <h1>Cek Kesehatan Gigi Gratis</h1>
                </div>
                <div class="desc-info-detail">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi suscipit atque sapiente architecto dolorem eligendi non nostrum aliquam cumque, maxime tempore at soluta blanditiis ex culpa ullam fugit odio dicta?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
