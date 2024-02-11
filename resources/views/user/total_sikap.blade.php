<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Sikap</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  @vite(['resources/css/style.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="{{ asset('assets/img/logo.png') }}" alt="logo tans dent" height="40">
    </div>
    <canvas id="doughnutChart" width="400" height="400"></canvas>
  </div>

  <script>
    var totalJawaban = "<?php echo json_encode($totalJawaban); ?>";
    console.log(totalJawaban);
    var doughnutChart = document.getElementById('doughnutChart').getContext('2d');
    var myDoughnutChart = new Chart(doughnutChart, {
        type: 'pie',
        data: {
            labels: ['Jawaban'], // Misalnya
            datasets: [{
                label: 'Total Jawaban',
                data: totalJawaban, // Gunakan variabel totalJawaban di sini
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Warna untuk setiap bagian dalam grafik
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>