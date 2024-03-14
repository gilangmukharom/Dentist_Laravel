@extends('include.sidebar')
@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Aktivitas Harian</h1>

    <div class="content-14days">
        @if ($dailyCores->count() > 0)
            @foreach ($dailyCores as $dailyCore)
                <div class="card card-14days"
                {{ $today = \Carbon\Carbon::now()->format('Y-m-d'); }}
                    style="background-color: {{ $dailyCore->tanggal_input || $today == $dailyCore->tanggal_daily ? 'green' : 'red'; }}"
                    data-nomor="{{ $dailyCore->nomor }}">

                    <div class="card-body text-center">
                        <h1 class="card-title">{{ $dailyCore->nomor }}</h1>
                        <p class="card-title">{{ $dailyCore->tanggal_daily }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada data Daily Cores.</p>
        @endif
    </div>

    <script src="{{ asset('assets/js/components.js') }}"></script>

    <script>
        document.querySelectorAll('.card-14days').forEach(function(card) {
            var day = card.dataset.day;

            card.addEventListener('click', function() {
                var nomor = this.dataset.nomor;
                var bgColor = this.style.backgroundColor;
                if (bgColor === 'green') {
                    window.location.href = '{{ route('user.daysactivity', ['nomor' => ':nomor']) }}'
                        .replace(':nomor', nomor);
                } else {
                    alert('Silakan isi terlebih dahulu hari sebelumnya');
                }
            });
        });
    </script>

@endsection
