<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @vite(['resources/css/style.css', 'resources/css/style_sidebar.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/jquery.min.js', 'resources/js/bootstrap.min.js', 'resources/js/popper.js'])
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Data untuk PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header_cetak">
        <h1>Data Pengguna</h1>
        <div class="info_pretest">
            <div class="data_user">
                <p>Nama : Admin Tans Dentis</p>
                <p>Alamat : Semarang - Jawa Tengah</p>
                <p>Asal Sekolah : SDN 2 Semarang</p>
            </div>
            <div class="tanggal_pretest">
                <p>Tanggal : 12 April 2024</p>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th colspan="3" class="text-center">Pretest</th>
                <th colspan="3">Postest</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>Sikap</th>
                <th>Pengetahuan</th>
                <th>Tindakan</th>
                <th>Sikap</th>
                <th>Pengetahuan</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->total_jawaban_sikap }}</td>
                    <td>{{ $item->total_jawaban_pengetahuan }}</td>
                    <td>{{ $item->total_jawaban_tindakans }}</td>
                    <td>{{ $item->total_postest_sikap }}</td>
                    <td>{{ $item->total_postest_pengetahuan }}</td>
                    <td>{{ $item->total_postest_tindakans }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
