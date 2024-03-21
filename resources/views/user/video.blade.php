@extends('include.sidebar')

@section('title', 'Dentist - Video')

@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Video</h1>
    <hr>
    <div class="box-video d-flex flex-row">
      <div class="card-video d-flex flex-column rounded justify-content-center align-items-center p-2">
        <div class="header-card">
          <iframe src="https://www.youtube.com/embed/YmzRdK3Phk8?si=VeA_aCMB5rEWG3_2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="header-body">
          <div class="title-video">
            <p>Film animasi pendek 3D Gigi</p>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
