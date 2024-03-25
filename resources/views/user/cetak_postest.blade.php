<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data PDF Pretest</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header_cetak {
            width: 100%;
            text-align: center;
        }

        .info_pretest {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            margin-top: 5px;
        }

        .data_user {
            text-align: left;
        }

        .tanggal_pretest {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header_cetak">
        <h1>Data Postest</h1>
        <div class="info_pretest">
            <div class="data_user">
                <p>Nama : {{ $data['username'] }}</p>
                <p>Alamat : {{ $data['alamat'] }}</p>
                <p>Asal Sekolah : {{ $data['sekolah'] }}</p>
            </div>
            <div class="tanggal_pretest">
                <p>Tanggal : {{ $data['tanggal_pretest'] }}</p>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Nilai</th>
                <th>Kategori</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Skor Pengetahuan</td>
                <td>{{ $data['skor_pengetahuan'] }}</td>
                <td>{{ $data['kategori_pengetahuan'] }}</td>
                <td>
                    <p>Complete</p>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Skor Sikap</td>
                <td>{{ $data['skor_sikap'] }}</td>
                <td>{{ $data['kategori_sikap'] }}</td>
                <td>
                    <p>Complete</p>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Skor Tindakan</td>
                <td>{{ $data['skor_tindakan'] }}</td>
                <td>{{ $data['kategori_tindakan'] }}</td>
                <td>
                    <p>Complete</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
