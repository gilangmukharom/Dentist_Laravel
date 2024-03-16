

<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
    <h1 class="h2">Teethq</h1>
    <div class="container-pretest-teethq mb-4 rounded d-flex flex-row flex-wrap p-3 align-items-center gap-3">
        <div class="navigasi-pretest-teethq d-flex flex-row w-100 justify-content-between align-content-center">
            <div class="url-pretest-teethq">
                <p class="m-auto">Teethq > Hasil pretest</p>
            </div>
            <button class="border-0 rounded text-0 p-2">History</button>
        </div>

        <div class="box-statistik w-100 d-flex justify-content-between">
            <div class="card-teethq-pretest d-flex justify-content-between w-25 rounded">
                <div class="card-header p-4">
                    <h5 class="text-white">Pretest</h5>
                </div>
                <div class="image-card w-75">
                    <img src="<?php echo e(asset('assets/img/teethq-pretest.png')); ?>" class="w-100" alt="">
                </div>
            </div>
            <div class="card-teethq-pretest d-flex justify-content-between w-25 rounded">
                <div class="card-header p-4">
                    <h5 class="text-white">Pretest</h5>
                </div>
                <div class="image-card w-75">
                    <img src="<?php echo e(asset('assets/img/teethq-pretest.png')); ?>" class="w-100" alt="">
                </div>
            </div>
        </div>
        <hr class="w-100">
        <table class="w-100">
            <tr class="text-center">
                <td class="p-3">
                    <p>Nama</p>
                </td>
                <td>
                    <p>Tanggal</p>
                </td>
                <td>
                    <p>Skor Sikap</p>
                </td>
                <td>
                    <p>Skor Tindakan</p>
                </td>
                <td>
                    <p>Skor Pengetahuan</p>
                </td>
                <td>
                    <p>Action</p>
                </td>
            </tr>
            <tr class="rounded border shadow text-center">
              <td class="pt-4 pb-4"><?php echo e($username); ?></td>
              <td><?php echo e($tanggal_pretest); ?></td>
              <td><?php echo e($kategori_sikap); ?></td>
              <td><?php echo e($kategori_tindakan); ?></td>
              <td><?php echo e($kategori_pengetahuan); ?></td>
              <td><button>Download</button></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/hasil_pretest.blade.php ENDPATH**/ ?>