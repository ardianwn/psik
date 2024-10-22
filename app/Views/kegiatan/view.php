<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Detail Acara
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<div class="custom-container mt-3">
    <h4>Detail Acara</h4>
    <style>
        .custom-container {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin-left: 15px;
            border: 1px solid #D9D9D9;
            padding: 50px;
            width: 100%; /* Full width */
            max-width: 98%; /* Set maximum width */
            height: 87%; /* Set fixed height */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for better appearance */
            overflow: auto; /* Add scroll if content overflows */
        }
        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 2px solid #000;
        }

        .custom-th {
            background-color: #02347e;
            color: white;
        }
        th {
            background-color: #02347e;
            text-align: center;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }
    </style>

    <!-- Detail Kegiatan -->
    <table>
        <thead>
            <tr class="custom-th">
                <th>Nama Acara</th>
                <th>PIC</th>
                <th>Tim</th>
                <th>Lokasi</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $kegiatan['nama_acara']; ?></td>
                <td><?= $kegiatan['pic']; ?></td>
                <td><?= $kegiatan['tim_tugas']; ?></td>
                <td><?= $kegiatan['lokasi']; ?></td>
                <td><?= $kegiatan['waktu_acara']; ?></td>
                <td><?= $kegiatan['status_kegiatan']; ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Detail Pra Produksi -->
    <h5 class="mt-3">Pra Produksi</h5>
    <table>
        <thead>
            <tr class="custom-th">
                <th>Status Internet</th>
                <th>Status Listrik</th>
                <th>Status Lokasi</th>
                <th>Status Barang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $pra_produksi['status_internet'] ?? 'N/A'; ?></td>
                <td><?= $pra_produksi['status_listrik'] ?? 'N/A'; ?></td>
                <td><?= $pra_produksi['status_lokasi'] ?? 'N/A'; ?></td>
                <td><?= $pra_produksi['status_barang'] ?? 'N/A'; ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Detail Pasca Produksi -->
    <h5 class="mt-3">Pasca Produksi</h5>
    <table>
        <thead>
            <tr class="custom-th">
                <th>Status Barang</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $pasca_produksi['status_barang'] ?? 'N/A'; ?></td>
                <td><?= $pasca_produksi['catatan'] ?? 'N/A'; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-5 mb-3">
        <a href="/kegiatan" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<?= $this->endSection() ?>
