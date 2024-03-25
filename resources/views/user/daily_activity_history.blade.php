@extends('include.sidebar')

@section('title', 'Dentist - Daily Activity')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
    <a class="m-3 cursor-pointer text-decoration-none text-black" href="/user/14days">Kembali</a>

    <div class="content-activity container-fluid rounded p-5">
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-auto" id="errorModalLabel"><b>Selamat, kamu sudah mengisi daily
                                activity!</b></h5>
                    </div>
                    <div class="modal-body">
                        @foreach ($doneDaily as $daily)
                            <p><b>Detail daily activity {{ $daily->nomor }}</b></p>
                            <div class="waktu_daily d-flex flex-column">
                                <div class="d-flex justify-content-between mb-3">
                                    <p>Pagi :</p>
                                    <p><b>{{ $daily->waktu_sikat_gigi_pagi }}</b></p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p>Malam :</p>
                                    <p><b>{{ $daily->waktu_sikat_gigi_malam }}</b></p>
                                </div>
                            </div>
                            <div class="bukti_daily mb-3">
                                <img src="{{ asset('storage/' . $daily->bukti) }}" alt="Gambar" class="img-fluid">
                                <p class="mt-3">Deskripsi : {{ $daily->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary m-auto" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-activity mx-auto w-md-75 w-lg-50 w-xl-25 position-relative">
            <div class="title-activity mb-4">
                <h1>Day {{ $daily->nomor }}</h1>
            </div>
            @foreach ($doneDaily as $daily)
                <form action="{{ route('user.create_daily') }}" method="POST" enctype="multipart/form-data"
                    class="d-flex flex-wrap flex-md-row gap-3 justify-between">
                    @csrf
                    <div class="input-nama d-flex flex-column">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="nama rounded border p-2" disabled
                            placeholder="{{ $daily->nama }}">
                    </div>
                    <div class="input-file">
                        <label for="bukti">Bukti :</label>
                        <img src="{{ asset('storage/' . $daily->bukti) }}" alt="Gambar" class="img-fluid">
                    </div>
                    <div class="input-time">
                        <div class="sikat-pagi d-flex mb-3 flex-column">
                            <label for="pagi">Sikat gigi pagi</label>
                            <input type="text" name="waktu_sikat_gigi_pagi" class="pagi border rounded p-2"
                                disabled placeholder="{{ $daily->waktu_sikat_gigi_pagi }}">
                        </div>
                        <div class="sikat-malam d-flex mb-3 flex-column">
                            <label for="malam">Sikat gigi malam</label>
                            <input type="text" name="waktu_sikat_gigi_malam" class="malam border rounded p-2"
                                disabled placeholder="{{ $daily->waktu_sikat_gigi_malam }}">
                        </div>
                    </div>
                    <div class="input-deskripsi">
                        <label for="deskripsi">Deskripsi makanan dan minuman yang dikonsumsi</label>
                        <textarea name="deskripsi" class="deskripsi border rounded p-2" disabled
                            placeholder="{{ $daily->deskripsi }}"></textarea>
                    </div>
                </form>
            @endforeach
        </div>

        <script>
            console.log('{{ asset('storage/' . $daily->bukti) }}');
        </script>
    @endsection
