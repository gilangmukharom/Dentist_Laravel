@extends('include.sidebar')
@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">Daily Activity 14 Days</h1>

    <div class="content-14days">
        @php
            $user_id = auth()->id();
        @endphp
        @for ($i = 1; $i <= 14; $i++)
            @php
                $colorClass = 'red'; // By default, set color to red

                // For day 1, always set color to green if filled by the logged-in user
                if ($i === 1 ) {
                    $colorClass = 'green';
                }

                // Check if user has filled day 1 and current day is 3, 4, 5, ..., 14
                if ($user_id && $i <= 14 && \App\Models\daily_activities::where('user_id', $user_id)->where('day', $i - 1)->exists()) {
                    $colorClass = 'green';
                }
            @endphp
            <div class="card-14days" id="card-{{ $i }}" style="background-color: {{ $colorClass }}" data-day="{{ $i }}">
                <h1>Day {{ $i }}</h1>
            </div>
        @endfor
    </div>

    <script src="{{ asset('assets/js/components.js') }}"></script>

    <script>
        // Add click event listener to each card
        document.querySelectorAll('.card-14days').forEach(function(card) {
            var day = card.dataset.day;
    
            card.addEventListener('click', function() {
                var bgColor = this.style.backgroundColor;
                if (bgColor === 'green') {
                    window.location.href = '{{ route("user.daysactivity") }}' + '?day=' + day;
                } else {
                    alert('Silahkan isi dulu day ' + day);
                }
            });
        });
    </script>
    
@endsection
