

<?php $__env->startSection('content'); ?>
    <?php if(session('error')): ?>
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    <?php endif; ?>
    <p class="m-3 cursor-pointer" onclick="window.location='/user/14days'">Kembali</p>

    <div class="content-activity w-100 rounded p-5">
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-auto" id="errorModalLabel"><b>Selamat, kamu sudah mengisi daily activity!</b></h5>
                        
                    </div>
                    <div class="modal-body">

                        <?php $__currentLoopData = $doneDaily; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><b>Detail daily activity <?php echo e($daily->nomor); ?></b></p>
                            <div class="waktu_daily d-flex flex-row justify-content-between">
                                <p>Pagi : <b><?php echo e($daily->waktu_sikat_gigi_pagi); ?></b></p>
                                <p>Status : <b>Done</b></p>
                            </div>
                            <div class="waktu_daily d-flex flex-row justify-content-between">
                                <p>Pagi : <b><?php echo e($daily->waktu_sikat_gigi_malam); ?></b></p>
                                <p>Status : <b>Done</b></p>
                            </div>
                            <div class="bukti_daily d-flex flex-row justify-content-between">
                                <img src="<?php echo e(asset('storage/' . $daily->bukti)); ?>" alt="Gambar" width="40%">
                                <textarea name="deskripsi" id="" disabled><?php echo e($daily->deskripsi); ?></textarea>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary m-auto" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-activity m-auto w-90 position-relative">
            <div class="title-activity">
                <h1>Day <?php echo e($daily->nomor); ?></h1>
            </div>
            <?php $__currentLoopData = $doneDaily; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('user.create_daily')); ?>" method="POST" enctype="multipart/form-data"
                    class="d-flex flex-wrap flex-row gap-3 justify-between">
                    <?php echo csrf_field(); ?>
                    <div class="input-nama d-flex flex-column">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="nama rounded border-1 p-2" disabled
                            placeholder="<?php echo e($daily->nama); ?>">
                    </div>
                    <div class="input-file">
                        <label for="bukti">Bukti</label>
                        <input type="file" name="bukti" class="bukti w-100 rounded p-2" disabled>
                    </div>
                    <div class="input-time">
                        <div class="sikat-pagi d-flex mb-3 flex-row">
                            <label for="pagi" class="w-100">Sikat gigi pagi</label>
                            <input type="text" name="waktu_sikat_gigi_pagi" class="pagi w-100 border-1 rounded p-1" disabled
                                placeholder="<?php echo e($daily->waktu_sikat_gigi_pagi); ?>">
                        </div>
                        <div class="sikat-malam d-flex mb-3 flex-row">
                            <label for="malam" class="w-100">Sikat gigi malam</label>
                            <input type="text" name="waktu_sikat_gigi_malam" class="malam w-100 border-1 rounded p-1"
                                disabled placeholder="<?php echo e($daily->waktu_sikat_gigi_malam); ?>">
                        </div>
                    </div>
                    <div class="input-deskripsi">
                        <label for="deskripsi">Deskripsi makanan dan minuman yang dikonsumsi</label>
                     <textarea name="deskripsi" class="deskripsi border-1 rounded h-100 w-100" disabled
                     placeholder="<?php echo e($daily->deskripsi); ?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger rounded border-0">
                        Submit
                    </button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <script src="<?php echo e(asset('assets/js/components.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/daily_activity_history.blade.php ENDPATH**/ ?>