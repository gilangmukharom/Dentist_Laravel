@extends('include.sidebar')

@section('content')
    <p>Kembali</p>

    <div class="content-activity w-100 rounded p-5">
        <div class="form-activity m-auto w-90 position-relative">
            <div class="title-activity">
                <h1>Day 1</h1>
            </div>
            <form id="dailyForm" action="{{ route('user.first_daily') }}" method="POST" enctype="multipart/form-data"
                class="d-flex flex-wrap flex-row gap-3 justify-between">
                @csrf
                <div class="input-nama d-flex flex-column">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="nama rounded border-1 p-2" required>
                </div>
                <div class="input-file">
                    <label for="bukti">Bukti</label>
                    <input type="file" name="bukti" class="bukti w-100 rounded p-2" required>
                </div>
                <div class="input-time">
                    <div class="sikat-pagi d-flex mb-3 flex-row">
                        <label for="pagi" class="w-100">Sikat gigi pagi</label>
                        <input type="time" name="waktu_sikat_gigi_pagi" class="pagi w-100 border-1 rounded p-2">
                    </div>
                    <div class="sikat-malam d-flex mb-3 flex-row">
                        <label for="malam" class="w-100">Sikat gigi malam</label>
                        <input type="time" name="waktu_sikat_gigi_malam" class="malam w-100 border-1 rounded p-2"
                            id="waktu_sikat_gigi_malam">
                    </div>
                </div>
                <div class="input-deskripsi">
                    <label for="deskripsi">Deskripsi makanan dan minuman yang dikonsumsi</label>
                    <textarea name="deskripsi" class="deskripsi border-1 rounded h-100 w-100"></textarea>
                </div>
                <button type="submit" class="btn btn-danger rounded border-0">
                    Submit
                </button>
            </form>
        </div>
    @endsection
