

<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
    <h1 class="h2">History Quiz</h1>
    <div class="container-pretest-teethq mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        <div class="navigasi-quiz d-flex flex-row w-100 justify-content-between align-content-center">
            <div class="url-quiz">
                <p class="m-auto">Quiz > History</p>
            </div>
        </div>

        <hr class="w-100">
        

        <?php if($user->quiz_keterampilan && $user->quiz_keterampilan->count() > 0): ?>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Jenis Quiz</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Nilai Quiz</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user->quiz_keterampilan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz_keterampilan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="rounded border shadow text-center">
                            <td class="pt-4 pb-4">Keterampilan</td>
                            <td class="pt-4 pb-4"><?php echo e($quiz_keterampilan->tanggal_quiz_keterampilan); ?></td>
                            <td class="pt-4 pb-4">5</td>
                            <td class="pt-4 pb-4"><?php echo e($quiz_keterampilan->nilai_quiz_keterampilan); ?></td>
                            <td class="pt-4 pb-4">Completed</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Belum ada data Quiz Keterampilan.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/history_quiz.blade.php ENDPATH**/ ?>