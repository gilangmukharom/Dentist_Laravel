@extends('include.sidebar_admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Informasi</h1>

        <form action="{{ route('admin.informasi.update', $informasi) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $informasi->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="isi_informasi" class="form-label">Isi Informasi</label>
                <textarea class="form-control" id="isi_informasi" name="isi_informasi" rows="6" required>{{ $informasi->isi_informasi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
