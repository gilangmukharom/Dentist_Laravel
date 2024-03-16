<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pretest</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
</head>

<body>
  <div class="container">
    <div class="logo">
        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="logo tans dent" height="40">
    </div>
    <form id="pretest-form" class="rounded m-auto p-4 w-90 border border-2">
      <h1 class="mt-5 mb-4">Pengetahuan</h1>
      <?php echo csrf_field(); ?>
      <?php $__currentLoopData = $pretests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pretest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="mb-4 question" data-index="<?php echo e($index); ?>">
        <p>
          <?php echo e($index + 1); ?>.
          <?php echo e($pretest->text); ?>

        </p>
        <input type="hidden" name="answers[<?php echo e($pretest->id); ?>][question_id]" value="<?php echo e($pretest->id); ?>">
        <ul class="list-unstyled">
          <?php $__currentLoopData = json_decode($pretest->choices); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            <label>
              <input type="radio" name="answers[<?php echo e($pretest->id); ?>][answer]" value="<?php echo e($choice); ?>">
              <?php echo e($choice); ?>

            </label>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <div class="navigation d-flex flex-row justify-content-end gap-3 p-5">
        <button type="button" class="btn btn-secondary prev-question">Soal Sebelumnya</button>
        <button type="button" class="btn btn-secondary next-question">Soal Berikutnya</button>
        <button type="button" class="btn btn-primary d-none check-answers">Submit Jawaban</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      var currentIndex = 0;
      var maxIndex = $('.question').length - 1;
      var questions = $('.question');

      function showQuestions(startIndex) {
        questions.hide();
        for (var i = startIndex; i < startIndex + 2; i++) {
          if (i >= questions.length) {
            break;
          }
          questions.eq(i).show();
        }
      }

      showQuestions(currentIndex);

      $('.next-question').on('click', function() {
        currentIndex += 2;
        if (currentIndex >= maxIndex) {
          currentIndex = maxIndex;
          $('.check-answers').removeClass('d-none');
        }
        showQuestions(currentIndex);
      });

      $('.prev-question').on('click', function() {
        currentIndex -= 2;
        if (currentIndex < 0) {
          currentIndex = 0;
        }
        $('.check-answers').addClass('d-none');
        showQuestions(currentIndex);
      });

      $('.check-answers').on('click', function() {
        // Memeriksa apakah ada soal yang belum dijawab
        var unansweredQuestions = $('.question').filter(function() {
            return !$("input[name^='answers']", this).is(':checked');
        });

        if (unansweredQuestions.length > 0) {
            alert('Mohon jawab semua pertanyaan sebelum mengirimkan jawaban.');
            return;
        }

        var form = $('#pretest-form');
        $.ajax({
          type: 'POST',
          url: '/user/cek_pretest',
          data: form.serialize(),
          success: function(response) {
            form.find('.result').html(response.result);
            window.location.href = '/user/hasil_pretest';
          }
        });
      });
    });
  </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/pretest.blade.php ENDPATH**/ ?>