

<?php $__env->startSection('content'); ?>

<div class="container-setting">
    <form action="<?php echo e(route('admin.delete_data')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger">Reset</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.sidebar_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/admin/setting.blade.php ENDPATH**/ ?>