

<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
    <h1 class="h2">Aktivitas Harian</h1>
    
    

    <div class="content-14days">
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(session('error')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php if($dailyCores->count() > 0): ?>
            <?php $__currentLoopData = $dailyCores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyCore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card card-14days" <?php echo e($todays = \Carbon\Carbon::now()->format('Y-m-d')); ?>

                    style="background-color: <?php echo e($dailyCore->tanggal_input || $todays == $dailyCore->tanggal_daily ? 'green' : '#D9D9D9'); ?>"
                    data-nomor="<?php echo e($dailyCore->nomor); ?>">

                    <div class="card-body text-center">
                        <h1 class="card-title text-white"><?php echo e($dailyCore->nomor); ?></h1>
                        <p class="card-title text-white"><?php echo e($dailyCore->tanggal_daily); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>Tidak ada data Daily Cores.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.querySelectorAll('.card-14days').forEach(function(card) {

            card.addEventListener('click', function() {
                var nomor = this.dataset.nomor;
                var bgColor = this.style.backgroundColor;
                if (bgColor === 'green') {
                    window.location.href = '<?php echo e(route('user.daysactivity', ['nomor' => ':nomor'])); ?>'
                        .replace(':nomor', nomor);
                } else {
                    alert('Tidak dapat mengisi daily activity');
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/14days.blade.php ENDPATH**/ ?>