<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dentist - Postest Tindakan</title>
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
  <form method="post" action="{{ route('user.postest_tindakan.submit') }}">
    @csrf
    @foreach($pertanyaans as $question)
    <p>
      {{ $question->pertanyaan }}
    </p>
    @foreach(json_decode($question->pilihan) as $key => $option)
    <input type="radio" name="pertanyaan[{{ $question->id }}]" value="{{ $option }}">
    {{ $option }}<br>
    @endforeach
    @endforeach
    <button type="submit">Submit</button>
  </form>
</body>

</html>