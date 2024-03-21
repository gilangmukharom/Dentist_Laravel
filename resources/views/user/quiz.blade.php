@extends('include.sidebar')

@section('title', 'Dentist - Quiz')

@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])
<h1 class="h2">Quiz</h1>
<div class="box-quiz w-100">
  <div class="navigasi-quiz d-flex flex-row w-100 justify-content-between align-content-center">
    <div class="url-quiz">
      <p class="m-auto">Quiz > pilih jenis quiz</p>
    </div>
    <button class="border-0 shadow rounded text-0 p-2" onclick="window.location='{{ route('user.history_quiz') }}'">History</button>
  </div>
  <hr>
  <div class="body-quiz d-flex gap-2 justify-content-center align-content-center w-100">
    <div class="card-quiz_keterampilan p-3 rounded d-flex flex-column gap-5 justify-content-center align-items-center" id="quiz_keterampilan">
      <img src="{{asset('assets/img/puzzle.png')}}" alt="">
      <p class="text-white">Quiz Keterampilan Gigi dan Mulut</p>
    </div>
    <div class="card-quiz_pengetahuan p-3 rounded d-flex flex-column gap-5 justify-content-center align-items-center" id="quiz_pengetahuan">
      <img src="{{asset('assets/img/pie.png')}}" alt="">
      <p class="text-white">Quiz Pengetahuan Gigi dan Mulut</p>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  document.getElementById("quiz_keterampilan").addEventListener('click', function() {
    window.location.href = '{{ route("user.quiz_keterampilan") }}';
  });
  document.getElementById("quiz_pengetahuan").addEventListener('click', function() {
    window.location.href = '{{ route("user.quiz_pengetahuan") }}';
  });
</script>

@endsection