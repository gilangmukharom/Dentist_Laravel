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
        {{ $questions->question }}
      </h1>
    </div>
    <div class="jawaban-keterampilan d-flex flex-column flex-lg-row flex-md-row flex-sm-column gap-5 justify-content-center align-items-center">
      <button class="option" data-answer="option1">
        <img src="{{ asset('assets/img/pengetahuan/' . $questions->image_path) }}" alt="Option 1">
      </button>
      <button class="option" data-answer="option2">
        <img src="{{ asset('assets/img/pengetahuan/' . $questions->image_path2) }}" alt="Option 2">
      </button>
      <span class="error-message" id="error-message1"></span>
      <div id="correct-answer-message" style="display: none; color: green;">Jawaban Benar!</div>
    </div>
  </div>


<script>
    $(document).ready(function() {
      let timer = 30; // Waktu quiz (dalam detik)
      let currentQuestion = 1; // Nomor soal saat ini
      let answeredQuestions = [];
      let correctAnswersCount = 0; // Menambahkan variabel untuk menghitung jawaban benar
      const maxQuestions = 3; // Menentukan batas jumlah pertanyaan

      loadQuestion(currentQuestion); // Memuat soal pertama

      let interval = setInterval(function() {
        $('#timer').text(timer--);
        if (timer < 0) {
          clearInterval(interval);
          // Logika jika waktu habis
        }
      }, 1000);

      $('.option').on('click', function() {
        let selectedOption = $(this).data('answer').toString();
        let questionId = currentQuestion;

        console.log("Selected Option: " + selectedOption);

        $.ajax({
          url: '/quiz/check-answer',
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            question_id: questionId,
            selected_option: selectedOption,
          },
          success: function(response) {
            console.log("Server Response: " + response.correct);
            if (response.correct) {
              console.log("Jawaban Benar!");
              $('#correct-answer-message').show();
              $('#error-message1').hide();
              answeredQuestions.push(questionId);
              correctAnswersCount++; // Menambah jumlah jawaban benar

              if (correctAnswersCount >= maxQuestions) {
                // Jika sudah menjawab 3x, alihkan ke halaman finish_keterampilan
                window.location.href = '/user/finish_keterampilan';
                return;
              }
            } else {
              // Logika jika jawaban salah
              $('#error-message1').text('Jawaban Salah').show();
              $('#correct-answer-message').hide();
            }

            // Tambahkan logika untuk memuat soal berikutnya setelah mendapatkan jawaban
            getNextRandomQuestionId(answeredQuestions, function() {
              loadQuestion(currentQuestion);
            });
          },
          error: function() {
            // Logika jika ada kesalahan
            console.log('Error checking answer');
          }
        });
      });

      // Fungsi untuk memuat pertanyaan secara acak yang belum pernah muncul
      function getNextRandomQuestionId(answeredQuestions, callback) {
  $.ajax({
    url: '/quiz/get-next-random-question',
    method: 'GET',
    data: {
      answered_questions: answeredQuestions,
    },
    success: function (response) {
      // Pastikan response memiliki properti question_id
      if (response.question_id) {
        currentQuestion = response.question_id;
        callback(); // Panggil callback setelah mendapatkan pertanyaan acak
        resetTimer();
      } else {
        console.log('No question_id in response');
        console.log("Semua pertanyaan sudah dijawab.");
        // Tambahkan logika jika semua pertanyaan sudah dijawab
        window.location.href = '/user/finish_keterampilan';
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('Error loading random question:', textStatus, errorThrown);
    }
  });
}

      // Fungsi untuk memuat soal menggunakan Ajax
      function loadQuestion(questionId) {
        $.ajax({
          url: '/quiz/get-next-question/' + questionId,
          method: 'GET',
          success: function(response) {
            // Perbarui UI dengan soal baru
            $('.soal-keterampilan h1').text(response.question);
            // Ganti sumber gambar atau konten lainnya sesuai kebutuhan
            $('.option[data-answer="option1"] img').attr('src', response.image_path1);
            $('.option[data-answer="option2"] img').attr('src', response.image_path2);
            // Sembunyikan pesan jawaban benar/salah
            $('#correct-answer-message, #error-message1').hide();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error loading question:', textStatus, errorThrown);
          }
        });
      }

      function resetTimer() {
        timer = 30;
      }
    });
  </script>


</body>

</html>