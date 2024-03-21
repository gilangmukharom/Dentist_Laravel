@extends('include.sidebar')

@section('title', 'Dentist - Daily Activity')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="title-14days"><b>Aktivitas Harian</b></h1>

    <div class="content-14days">
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @if ($dailyCores->count() > 0)
            @foreach ($dailyCores as $dailyCore)
                <div class="card card-14days" {{ $todays = \Carbon\Carbon::now()->format('Y-m-d') }}
                    style="background-color: {{ $dailyCore->tanggal_input || $todays == $dailyCore->tanggal_daily ? 'green' : '#D9D9D9' }}"
                    data-nomor="{{ $dailyCore->nomor }}">

                    <div class="card-body text-center">
                        <h1 class="card-title text-white">{{ $dailyCore->nomor }}</h1>
                        <p class="card-title text-white">{{ $dailyCore->tanggal_daily }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada data Daily Cores.</p>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.querySelectorAll('.card-14days').forEach(function(card) {

            card.addEventListener('click', function() {
                var nomor = this.dataset.nomor;
                var bgColor = this.style.backgroundColor;
                if (bgColor === 'green') {
                    window.location.href = '{{ route('user.daysactivity', ['nomor' => ':nomor']) }}'
                        .replace(':nomor', nomor);
                } else {
                    alert('Tidak dapat mengisi daily activity');
                }
            });
        });
    </script>

@endsection
