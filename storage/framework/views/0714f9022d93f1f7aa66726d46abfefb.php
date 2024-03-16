<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Pengetahuan</title>
</head>

<body>
  <h1>Quiz</h1>
  <?php if(Session::has('success')): ?>
  <div class="alert alert-success">
    <?php echo e(Session::get('success')); ?>

  </div>
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  <div class="alert alert-danger">
    <?php echo e(Session::get('error')); ?>

  </div>
  <?php endif; ?>
  <form method="post" action="<?php echo e(route('user.test_tindakan.submit')); ?>">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $pertanyaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p>
      <?php echo e($question->pertanyaan); ?>

    </p>
    <?php $__currentLoopData = json_decode($question->pilihan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="radio" name="pertanyaan[<?php echo e($question->id); ?>]" value="<?php echo e($option); ?>">
    <?php echo e($option); ?><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="submit">Submit</button>
  </form>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/test_tindakan.blade.php ENDPATH**/ ?>