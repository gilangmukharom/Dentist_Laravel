<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Pengetahuan</title>
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
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <form method="post" class="rounded m-auto p-4 w-90 border border-2"
            action="{{ route('user.postest_pengetahuan.submit') }}">
            @csrf
            <h3 class="mt-2 mb-4"><b>Pengetahuan</b></h3>
            @foreach ($pertanyaans as $question)
                <p>
                    {{ $question->pertanyaan }}
                </p>
                @foreach (json_decode($question->pilihan) as $key => $option)
                    <input type="radio" name="pertanyaan[{{ $question->id }}]" value="{{ $option }}">
                    {{ $option }}<br>
                @endforeach
            @endforeach
            <div class="button-form w-100 d-flex justify-content-end">
                <button class="btn bg-2 text-0" type="submit">Soal berikutnya</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>
