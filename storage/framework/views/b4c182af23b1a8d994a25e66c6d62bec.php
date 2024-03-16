

<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
    <div class="container-edit-profile p-5">
        <div class="header-edit-profile">
            <button>Kembali</button>
        </div>
        <div class="box-edit-profile">
            <div class="title-editprofile">Edit Profile</div>
            <form action="<?php echo e(route('user.profile-update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <!-- Upload Foto -->
                <div class="mb-3">
                    <label for="upload-foto" class="form-label">Upload Foto</label>
                    <input type="file" class="form-control" id="upload-foto" name="foto">
                </div>
            
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            
                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat-lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir">
                </div>
            
                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir">
                </div>
            
                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
            
                <!-- Sekolah -->
                <div class="mb-3">
                    <label for="sekolah" class="form-label">Sekolah</label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah">
                </div>
            
                <!-- Nama Orang Tua -->
                <div class="mb-3">
                    <label for="nama-orang-tua" class="form-label">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="nama-orang-tua" name="nama_orang_tua">
                </div>
            
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            
                <!-- Ganti Password -->
                <div class="mb-3">
                    <label for="ganti-password" class="form-label">Ganti Password</label>
                    <input type="password" class="form-control" id="ganti-password" name="ganti_password">
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/edit_profile.blade.php ENDPATH**/ ?>