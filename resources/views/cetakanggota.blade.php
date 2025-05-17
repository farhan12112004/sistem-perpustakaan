<!-- resources/views/laporan/anggota.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Daftar Anggota</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <h1>Laporan Daftar Anggota</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $index => $anggota)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->jenis_kelamin }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
