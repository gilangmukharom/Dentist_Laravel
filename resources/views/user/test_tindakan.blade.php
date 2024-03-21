<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tindakan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Quiz</h1>
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
    <form method="post" action="{{ route('user.test_tindakan.submit') }}">
        @csrf
        @foreach ($pertanyaans as $question)
            <p>
                {{ $question->pertanyaan }}
            </p>
            @foreach (json_decode($question->pilihan) as $key => $option)
                <input type="radio" name="pertanyaan[{{ $question->id }}]" value="{{ $option }}">
                {{ $option }}<br>
            @endforeach
        @endforeach
        <button class="btn bg-1 text-0" type="submit">Submit</button>
    </form>
</body>

</html>
