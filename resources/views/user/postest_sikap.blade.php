<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Sikap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="logo p-4">
            <img src="{{ asset('assets/img/logo4.png') }}" alt="logo tans dent" height="40">
        </div>
        <form id="pretest-form" class="rounded m-auto p-2 w-90 border border-2" method="POST"
            action="{{ url('user/cek_postest_sikap') }}">
            @csrf
            <h1 class="mt-2 mb-4">Sikap</h1>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>SS</th>
                            <th>S</th>
                            <th>TS</th>
                            <th>STS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($test_sikaps as $key => $sikap)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sikap->pertanyaan }}</td>
                                <td><input type="radio" name="jawaban[{{ $sikap->id }}]" value="4"></td>
                                <td><input type="radio" name="jawaban[{{ $sikap->id }}]" value="3"></td>
                                <td><input type="radio" name="jawaban[{{ $sikap->id }}]" value="2"></td>
                                <td><input type="radio" name="jawaban[{{ $sikap->id }}]" value="1"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="button-form w-100 d-flex justify-content-end">
                <button class="btn bg-2 text-0" type="submit">Soal berikutnya</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>
