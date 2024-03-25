@extends('include.sidebar')

@section('title', 'Dentist - Hasil Pretest')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2"><b>Teethq</b></h1>
    <div class="container-pretest-teethq mb-4 rounded d-flex flex-row flex-wrap align-items-center gap-3">
        <div class="navigasi-pretest-teethq d-flex flex-row w-100 justify-content-between align-content-center">
            <div class="url-pretest-teethq">
                <p class="m-auto">Teethq > Hasil pretest</p>
            </div>
        </div>

        <div class="box-statistik w-100 d-flex justify-content-between">
            <div class="card-teethq-pretest d-flex justify-content-between w-25 rounded">
                <div class="card-header p-4">
                    <h5 class="text-white">Pretest</h5>
                </div>
                <div class="image-card w-75">
                    <img src="{{ asset('assets/img/teethq-pretest.png') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
        <hr class="w-100">
        <div class="table-responsive">
            <table class="w-100">
                <tr class="text-center">
                    <td class="p-3">
                        <p>Nama</p>
                    </td>
                    <td>
                        <p>Tanggal</p>
                    </td>
                    <td>
                        <p>Skor Sikap</p>
                    </td>
                    <td>
                        <p>Skor Tindakan</p>
                    </td>
                    <td>
                        <p>Skor Pengetahuan</p>
                    </td>
                    <td>
                        <p>Action</p>
                    </td>
                </tr>
                <tr class="rounded border shadow text-center">
                    <td class="pt-4 pb-4">{{ $username }}</td>
                    <td>{{ $tanggal_pretest }}</td>
                    <td>{{ $kategori_sikap }}</td>
                    <td>{{ $kategori_tindakan }}</td>
                    <td>{{ $kategori_pengetahuan }}</td>
                    <td> <a href="{{ route('user.cetak_pretest') }}" class="btn btn-primary">Download</a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
