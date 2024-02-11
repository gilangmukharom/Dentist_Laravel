<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Quiz Keterampilan</title>
</head>

<body class="login-body">
  <div class="navigasi-keterampilan d-flex justify-content-between align-items-center p-2">
    <div class="title-keterampilan">
      <h1>Quiz</h1>
      <p class="text-0">Keterampilan Gigi dan Mulut</p>
    </div>
    <div class="timer-keterampilan bg-light rounded-5 p-2">
      <h1 id="timer">30</h1>
    </div>
  </div>
  <div class="box-keterampilan d-flex flex-column justify-content-center align-items-center">
    <div class="soal-keterampilan m-5 bg-light p-4 rounded-5">
      <h1>
        {{ $q_keterampilans->pertanyaan }}
      </h1>
    </div>
    <div class="jawaban-keterampilan d-flex flex-column flex-lg-row flex-md-row flex-sm-column gap-5 justify-content-center align-items-center">
      <form action="{{ route('user.cek_quiz_keterampilan') }}" method="POST" id="quizForm">
        @csrf
        <div class="pilihan d-flex flex-rows">
          @foreach($q_keterampilans->jawaban as $jawaban)
          <input type="radio" name="jawaban" value="{{$jawaban->id}}">
          <img src="{{ asset('assets/img/Keterampilan/' . $jawaban->image_path) }}" alt="Option Image" width="50"><br>
          @endforeach
        </div>
        <button type="button" id="nextButton" class="btn btn-primary">Next</button>
        <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
        <input type="hidden" name="answers[]" id="answers" value="">
        <input type="hidden" id="currentQuestionId" value="{{ $q_keterampilans->id }}">
      </form>
    </div>
  </div>

  <script>
    @if(session('correct_answer'))
        var correctAnswersCount = {{ Session::get('correct_answers_count', 0) }};
        alert("Jawaban Anda benar! Total jawaban benar: " + correctAnswersCount);
    @elseif(session('incorrect_answer'))
        alert("jawaban Anda Salah!");
    @endif
  </script>
    <script>
        $(document).ready(function() {
            $('#nextButton').click(function() {
                var userAnswerId = $('input[name="jawaban"]:checked').val();
                var currentQuestionId = $('#currentQuestionId').val();
                var answers = $('#answers').val();
    
                answers += currentQuestionId + ':' + userAnswerId + ',';
                $('#answers').val(answers);
    
                var url = "{{ route('user.next_quiz_keterampilan', ':currentQuestionId') }}";
                url = url.replace(':currentQuestionId', currentQuestionId);
    
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        $('.soal-keterampilan h1').text(response.pertanyaan);
                        $('#currentQuestionId').val(response.id);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
    
            $('#submitButton').click(function() {
                var userAnswerId = $('input[name="jawaban"]:checked').val();
                var currentQuestionId = $('#currentQuestionId').val();
                var answers = $('#answers').val();
    
                answers += currentQuestionId + ':' + userAnswerId;
    
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.cek_quiz_keterampilan') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        jawaban: userAnswerId
                    },
                    success: function(response) {
                        if (response.correct) {
                            var correctAnswersCount = response.total_correct;
                            alert("Jawaban Anda benar! Total jawaban benar: " + correctAnswersCount);
                            // Tampilkan atau perbarui total jawaban keterampilan jika diperlukan
                        } else {
                            alert("Jawaban Anda salah!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>