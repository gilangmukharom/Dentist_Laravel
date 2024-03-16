@extends('include.sidebar')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2">History Quiz</h1>
    <div class="container-pretest-teethq mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        <div class="navigasi-quiz d-flex flex-row w-100 justify-content-between align-content-center">
            <div class="url-quiz">
                <p class="m-auto">Quiz > History</p>
            </div>
        </div>

        <hr class="w-100">
        {{-- <table class="w-100">
            <tr class="text-center">
                <td class="p-3">
                    <p>Jenis Quiz</p>
                </td>
                <td>
                    <p>Tanggal</p>
                </td>
                <td>
                    <p>Jumlah Soal</p>
                </td>
                <td>
                    <p>Skor Quiz</p>
                </td>
                <td>
                    <p>Status</p>
                </td>
            </tr>
            <tr class="rounded border shadow text-center">
                <td class="pt-4 pb-4">Keterampilan</td>
                <td class="pt-4 pb-4">{{ $quizKeterampilan->tanggal_quiz_keterampilan }}</td>
                <td class="pt-4 pb-4">5</td>
                <td class="pt-4 pb-4">{{ $quizKeterampilan->nilai_quiz_keterampilan }}</td>
                <td>Completed</td>
            </tr>
        </table> --}}

        @if ($user->quiz_keterampilan && $user->quiz_keterampilan->count() > 0)
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Jenis Quiz</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Nilai Quiz</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->quiz_keterampilan as $quiz_keterampilan)
                        <tr class="rounded border shadow text-center">
                            <td class="pt-4 pb-4">Keterampilan</td>
                            <td class="pt-4 pb-4">{{ $quiz_keterampilan->tanggal_quiz_keterampilan }}</td>
                            <td class="pt-4 pb-4">5</td>
                            <td class="pt-4 pb-4">{{ $quiz_keterampilan->nilai_quiz_keterampilan }}</td>
                            <td class="pt-4 pb-4">Completed</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Belum ada data Quiz Keterampilan.</p>
        @endif
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
