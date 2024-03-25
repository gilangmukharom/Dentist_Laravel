@extends('include.sidebar')

@section('title', 'Dentist - Daily Activity')

@section('content')
    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif

    <p>Kembali</p>

    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <div class="content-activity container-fluid rounded p-3">
        <div class="form-activity mx-auto w-md-75 w-lg-50 w-xl-25 position-relative">
            <div class="title-activity mb-5">
                <h1>Day {{ $nomor }}</h1>
            </div>
            <form action="{{ route('user.create_daily') }}" method="POST" enctype="multipart/form-data"
                class="d-flex flex-wrap flex-md-row gap-3 justify-between">
                @csrf
                <div class="input-nama d-flex flex-grow-1 flex-column flex-md-row">
                    <label for="nama" class="flex-grow-1">Nama</label>
                    <input type="text" name="nama" class="flex-grow-1 nama rounded border p-2" disabled>
                </div>
                <div class="input-file">
                    <label for="bukti">Bukti</label>
                    <input type="file" name="bukti" class="bukti w-100 rounded p-2" required>
                </div>
                <div class="input-time flex-grow-1">
                    <div class="sikat-pagi d-flex mb-3 flex-column flex-md-row">
                        <label for="pagi" class="flex-grow-1">Sikat gigi pagi</label>
                        <input type="time" name="waktu_sikat_gigi_pagi" class="pagi flex-grow-1 border rounded p-2">
                    </div>
                    <div class="sikat-malam d-flex mb-3 flex-column flex-md-row">
                        <label for="malam" class="flex-grow-1">Sikat gigi malam</label>
                        <input type="time" name="waktu_sikat_gigi_malam" class="malam flex-grow-1 border rounded p-2">
                    </div>
                </div>
                <div class="input-deskripsi flex-grow-1">
                    <label for="deskripsi">Deskripsi makanan dan minuman yang dikonsumsi</label>
                    <textarea name="deskripsi" class="deskripsi border rounded p-2 w-100"></textarea>
                </div>
                <div class="btn-submit-daily w-100 mt-5">
                    <button type="submit" class="btn btn-danger rounded border-0">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Jika terdapat pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script>
            var cek_input_daily_value = @json($dailyCore);
            console.log("ini inputnya :", cek_input_daily_value);
        </script>
    </div>
@endsection
