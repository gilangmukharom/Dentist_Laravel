<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>;
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Quiz Pengetahuan</title>
</head>

<body class="login-body">
    <div class="navigasi-pengetahuan d-flex justify-content-between align-items-center p-2">
        <div class="title-pengetahuan">
            <h1>Quiz</h1>
            <p class="text-0">Pengetahuan Gigi dan Mulut</p>
        </div>
        <div class="timer-pengetahuan bg-light d-flex justify-content-center align-items-center">
            <h2 id="timer">30</h2>
        </div>
    </div>
    <div class="box-pengetahuan d-flex flex-column justify-content-center align-items-center">
        <div class="jawaban-pengetahuan d-flex flex-row gap-5 justify-content-center align-items-center">
            <form action="<?php echo e(route('user.hasil_quiz_pengetahuan')); ?>" method="POST" id="quizForm">
                <?php echo csrf_field(); ?>
                <?php $__currentLoopData = $q_pengetahuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="soal_jawab" data-question="<?php echo e($index); ?>"
                        style="display: <?php echo e($index === 0 ? 'block' : 'none'); ?>">
                        <div class="soal-pengetahuan m-5 bg-light p-4 rounded-5 text-center">
                            <h1>
                                <?php echo e($question->question); ?>

                            </h1>
                        </div>
                        <div class="pilihan d-flex gap-4 w-75 m-auto">
                            <label
                                class="image-radio-label d-flex flex-column justify-content-center align-items-center bg-light rounded">
                                <img src="<?php echo e(asset('assets/img/Keterampilan/' . $question->image_a)); ?>"
                                    alt="Option Image" class="w-50"><br>
                                <input type="radio" name="jawabans[<?php echo e($question->id); ?>]" value="A">
                            </label>
                            <label
                                class="image-radio-label d-flex flex-column justify-content-center align-items-center bg-light rounded">
                                <img src="<?php echo e(asset('assets/img/Keterampilan/' . $question->image_b)); ?>"
                                    alt="Option Image" class="w-50"><br>
                                <input type="radio" name="jawabans[<?php echo e($question->id); ?>]" value="B">
                            </label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="button-group d-flex justify-content-center align-items-center m-3">
                    <button class="btn btn-light" type="button" onclick="nextQuestion()">Lanjutkan</button>
                    <button class="btn btn-light" type="submit" style="display: none;"
                        id="submitButton">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var timerDuration = 30;
        var timerElement = document.getElementById('timer');

        function startTimer() {
            var timer = setInterval(function() {
                timerDuration--;
                timerElement.innerText = timerDuration;

                if (timerDuration <= 0) {
                    clearInterval(timer);
                    nextQuestion();
                }
            }, 1000);
        }

        function nextQuestion() {
            const currentQuestion = document.querySelector('.soal_jawab:not([style*="display: none"])');
            const nextQuestion = document.querySelector(
                `.soal_jawab[data-question="${parseInt(currentQuestion.dataset.question) + 1}"]`);

            if (nextQuestion) {
                currentQuestion.style.display = "none";
                nextQuestion.style.display = "block";

                if (nextQuestion.dataset.question === "<?php echo e(count($q_pengetahuans) - 1); ?>") {
                    document.getElementById('submitButton').style.display = "block";
                    document.querySelector('button[type="button"]').style.display = "none";
                }

                // Restart timer for the next question
                timerDuration = 3;
                timerElement.innerText = timerDuration;
                startTimer();
            } else {
                document.getElementById('submitButton').click();
            }
        }
        startTimer();
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/quiz_pengetahuan.blade.php ENDPATH**/ ?>