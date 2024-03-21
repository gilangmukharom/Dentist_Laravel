@extends('include.sidebar')

@section('title', 'Dentist - History Quiz')

@section('content')
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <h1 class="h2"><b>History Quiz</b></h1>
    <div class="container-pretest-teethq mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        <div class="navigasi-quiz d-flex flex-row w-100 justify-content-between align-content-center">
            <div class="url-quiz">
                <p class="m-0">Quiz > History</p>
            </div>
        </div>

        <hr class="w-100 bg-black">

        @if ($quizKeterampilan->count() > 0)
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Jenis Quiz</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah Soal</th>
                        <th scope="col">Nilai Quiz</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizKeterampilan as $quiz)
                        <tr class="rounded border shadow text-center">
                            <td class="pt-4 pb-4">Keterampilan</td>
                            <td class="pt-4 pb-4">{{ $quiz->tanggal_quiz_keterampilan }}</td>
                            <td class="pt-4 pb-4">5</td>
                            <td class="pt-4 pb-4">{{ $quiz->nilai_quiz_keterampilan }}</td>
                            <td class="pt-4 pb-4">Completed</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <!-- Pagination Links -->
                {{ $quizKeterampilan->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>Belum ada data Quiz Keterampilan.</p>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
