<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Daftar Transaksi</title>
    <style>
        body {
            font-family: monospace;
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
    <h1>Laporan Daftar Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $index => $transaksi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->anggota->nama }}</td>
                    <td>{{ $transaksi->buku->judul_buku }}</td>
                    <td>{{ $transaksi->tglpinjam }}</td>
                    <td>{{ $transaksi->tglkembali }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($transaksis->isEmpty())
        <p style="text-align: center; margin-top: 20px;">Tidak ada data transaksi.</p>
    @endif
</body>
</html>