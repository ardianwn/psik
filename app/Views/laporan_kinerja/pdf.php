<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kinerja PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Kinerja</h1>

    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Dokumentasi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($absensi as $a): ?>
            <tr>
                <td><?= $a['id_users'] ?></td>
                <td><?= $a['kegiatan'] ?></td>
                <td><?= $a['tanggal'] ?></td>
                <td><?= $a['absensi_status'] ?></td>
                <td><?= $a['dokumentasi'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
