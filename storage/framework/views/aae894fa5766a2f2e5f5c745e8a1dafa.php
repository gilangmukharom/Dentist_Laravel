<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/style.css', 'resources/js/app.js']); ?>;
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Dentist - Skor Pengetahuan</title>
</head>

<body class="login-body">
    <div class="navigasi-pengetahuan d-flex justify-content-between align-items-center p-2">
        <div class="title-pengetahuan">
            <h1>Quiz</h1>
            <p class="text-0">Keterampilan Gigi dan Mulut</p>
        </div>
    </div>
    <div class="box-skor-keterampilan m-auto w-75 d-flex flex-column justify-content-center align-items-center">
        <div class="title-skor text-0">
            <h1>Skor Kamu</h1>
        </div>

        <div class="content-skor-keterampilan p-2 bg-white w-100 rounded-3">
            <table class="p-5 w-50">
                <tr>
                    <td>
                        <p>Tanggal</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>21-12-2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jam</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>10.00</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Total Soal</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>5 Soal</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jawaban Benar</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>4</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jawaban Salah</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>1</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Presentase</p>
                    </td>
                    <td>
                        <p>:</p>
                    </td>
                    <td>
                        <p>85.00%</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="status-skor w-100 mt-2 p-3 rounded-3 d-flex flex-column justify-content-center align-items-center">
            <h1>Berhasil</h1>
            <p>Selamat kamu berhasil menyelesaikan quiz dengan baik!</p>
            <button class="btn btn-light" onclick="location.href='/user/index'">Dashboard</button>
        </div>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\LARAVEL\tens-dentist\resources\views/user/skor_keterampilan.blade.php ENDPATH**/ ?>