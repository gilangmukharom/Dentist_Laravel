@extends('include.sidebar')
@section('content')
@vite(['resources/css/style.css', 'resources/js/app.js']);
    <h1 class="h2">Activity</h1>
    <p>Selamat datang di halaman activity.</p>

    <script src="{{ asset('assets/js/components.js') }}"></script>
@endsection
