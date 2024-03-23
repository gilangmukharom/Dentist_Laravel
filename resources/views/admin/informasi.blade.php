@extends('include.sidebar_admin')

@section('content')

<div class="container-setting">
    <h1>Halaman Informasi Admin</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi Informasi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasi as $index => $info)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $info->judul }}</td>
                    <td>{{ $info->isi_informasi }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $info->gambar) }}" alt="Gambar Informasi" width="100">
                    </td>
                    <td>
                        <a href="{{ route('admin.informasi.edit', $info) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
