<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Sikap</title>
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
    <form id="pretest-form" class="rounded m-auto p-4 w-90 border border-2" method="POST" action="<?php echo e(url('user/cek_test_sikap')); ?>">
      <?php echo csrf_field(); ?>
      <h1 class="mt-2 mb-4">Sikap</h1>
      <?php $__currentLoopData = $test_sikaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sikap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <p><?php echo e($sikap->pertanyaan); ?></p>
            <div class="pilihan_jawaban d-flex flex-column">
              <label><input type="radio" name="jawaban[<?php echo e($sikap->id); ?>]" id="jawaban_[<?php echo e($sikap->id); ?>]_1" value="1"> SS</label>
              <label><input type="radio" name="jawaban[<?php echo e($sikap->id); ?>]" value="2"> S</label>
              <label><input type="radio" name="jawaban[<?php echo e($sikap->id); ?>]" value="3"> TS</label>
              <label><input type="radio" name="jawaban[<?php echo e($sikap->id); ?>]" value="4"> STS</label>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="submit">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/test_sikap.blade.php ENDPATH**/ ?>