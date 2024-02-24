@extends('include.sidebar')
@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Aktivitas Harian</h1>

    <div class="content-14days">
        @php
            $user_id = auth()->id();
            $currentDate = now(); // Tanggal dan waktu saat ini
        @endphp
        @for ($i = 1; $i <= 14; $i++)
            @php
                $activity = \App\Models\daily_activities::where('user_id', $user_id)
                    ->where('day', $i - 1)
                    ->first();

                // Set warna menjadi hijau untuk day 1 dan berdasarkan selisih tanggal untuk day lainnya
                if ($i === 1 || ($activity && $currentDate->diffInDays($activity->created_at) >= ($i - 1))) {
                    $colorClass = 'green';
                } else {
                    $colorClass = 'red';
                }
            @endphp
            <div class="card-14days" id="card-{{ $i }}" style="background-color: {{ $colorClass }}" data-day="{{ $i }}">
                <h1>Hari {{ $i }}</h1>
            </div>
        @endfor
    </div>

    <script src="{{ asset('assets/js/components.js') }}"></script>

    <script>
        // Tambahkan event click listener untuk setiap kartu
        document.querySelectorAll('.card-14days').forEach(function(card) {
            var day = card.dataset.day;
    
            card.addEventListener('click', function() {
                var bgColor = this.style.backgroundColor;
                if (bgColor === 'green') {
                    window.location.href = '{{ route("user.daysactivity") }}' + '?day=' + day;
                } else {
                    alert('Silakan isi terlebih dahulu hari ' + (day-1));
                }
            });
        });
    </script>
    
@endsection
