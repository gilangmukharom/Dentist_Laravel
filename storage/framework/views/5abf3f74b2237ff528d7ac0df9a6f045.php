

<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>
    <div class="container-dashboard p-5">
        <div class="header-dashboard d-flex justify-content-between">
            <div class="title-dashboard">
                <h1><b>Dashboard</b></h1>
            </div>
            <div class="profile-dashboard">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-inline-flex align-items-center gap-2" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-picture">
                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" alt="profile">
                        </div>
                        <div class="profile-name">
                            <p>Gilang Mukharom</p>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><button class="dropdown-item"
                                onclick="window.location.href='<?php echo e(route('user.edit-profile')); ?>'">Edit Profile</button></li>
                        <li><button class="dropdown-item"
                                onclick="window.location.href='<?php echo e(route('logout')); ?>'">Logout</button></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-dashboard">
            <div class="content-dashboard-student d-flex flex-rows gap-2">
                <div class="opening-dashboard w-75">
                    <div class="card w-100 h-100 d-flex flex-column justify-content-evenly align-items-start p-5">
                        <div class="title-card">
                            <p>Daily Activity 14 Days</p>
                        </div>
                        <div class="body-card w-50">
                            <h3 class="text-white">Selamat datang <?php echo e($username); ?>! Yuk mulai aktifitas hari ini</h3>
                        </div>
                        <div class="footer-card">
                            <button type="btn" style="background-color: #FFBD13; color:white; width: 150px" class="btn p-2">Mulai</button>
                        </div>
                    </div>
                </div>
                <div class="card-element bg-body-tertiary rounded shadow w-25" id="calendar"> </div>
            </div>
            <div class="dashboard-performance">
                <p><b>Performance</b></p>
                <canvas id="myChart" class="h-25 w-100"></canvas>
            </div>
            <div class="leaderboard">
                <p><b>Leaderboard Score</b></p>
                <table class="w-100">
                    <tr class="text-center header-table">
                        <td class="p-1">
                            <p>No</p>
                        </td>
                        <td class="p-1">
                            <p>Nama</p>
                        </td>
                        <td class="p-1">
                            <p>Skor Sikap</p>
                        </td>
                        <td>
                            <p>Skor Tindakan</p>
                        </td>
                        <td>
                            <p>Skor Pengetahuan</p>
                        </td>
                        <td>
                            <p>Skor Daily</p>
                        </td>
                    </tr>
                    <tr class="rounded border shadow text-center">
                        <td class="pt-4 pb-4">1</td>
                        <td class="pt-4 pb-4"><?php echo e($username); ?></td>
                        <td><?php echo e($kategori_sikap); ?></td>
                        <td><?php echo e($kategori_tindakan); ?></td>
                        <td><?php echo e($kategori_pengetahuan); ?></td>
                    </tr>
                </table>
            </div>
            <a href="<?php echo e(route('user.cetak_laporan')); ?>" class="btn btn-primary">Generate PDF</a>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3'], // Labels untuk sumbu X
                datasets: [{
                    label: 'Total Jawaban',
                    data: <?php echo json_encode($skor_sikap_stat); ?>, // Data dari controller
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna untuk setiap bar
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna garis tepi
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/index.blade.php ENDPATH**/ ?>