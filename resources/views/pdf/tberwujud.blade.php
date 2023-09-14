<!DOCTYPE html>
<html>
<head>
    <title>Data Aset Tidak Berwujud</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Penyesuaian untuk tampilan cetak PDF */
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 12px;
                transform: rotate(90deg);
                transform-origin: left top;
            }
            table {
                font-size: 12px;
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                border: 1px solid #000;
            }
            h1 {
                text-align: center;
                margin-bottom: 10px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <h1>Berwujud Data PDF</h1>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Keadaan</th>
                <th>Masa Pemakaian</th>
                <th>Tanggal Terima</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->keadaan }}</td>
                    <td>{{ $item->masa_pemakaian }}</td>
                    <td>{{ $item->tanggal_terima }}</td>
                    <td>Rp {{ number_format($item->Nilai, 0, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
