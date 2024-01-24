@extends('include.sidebar')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <h1 class="h2">Daily Activity 14 Days</h1>

    <div class="content-14days">
        <div class="card-14days" id="card-activity">
            <h1>Day 1</h1>
        </div>
        <div class="card-14days">
            <h1>Day 2</h1>
        </div>
        <div class="card-14days">
            <h1>Day 3</h1>
        </div>
        <div class="card-14days">
            <h1>Day 4</h1>
        </div>
        <div class="card-14days">
            <h1>Day 5</h1>
        </div>
        <div class="card-14days">
            <h1>Day 6</h1>
        </div>
        <div class="card-14days">
            <h1>Day 7</h1>
        </div>
        <div class="card-14days">
            <h1>Day 8</h1>
        </div>
        <div class="card-14days">
            <h1>Day 9</h1>
        </div>
        <div class="card-14days">
            <h1>Day 10</h1>
        </div>
        <div class="card-14days">
            <h1>Day 11</h1>
        </div>
        <div class="card-14days">
            <h1>Day 12</h1>
        </div>
        <div class="card-14days">
            <h1>Day 13</h1>
        </div>
        <div class="card-14days">
            <h1>Day 14</h1>
        </div>
    </div>

    <script src="{{ asset('assets/js/components.js') }}"></script>

    <script>
        document.getElementById('card-activity').addEventListener('click', function() {
            window.location.href = '{{ route("user.daysactivity") }}';
        });
    </script>
@endsection
