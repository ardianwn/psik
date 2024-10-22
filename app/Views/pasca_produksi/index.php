<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Daftar Pasca Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>
<div class="custom-container mt-3">
    <h4>Daftar Pasca Produksi</h4>
    <style>
        .custom-container{
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 15px;
            border: 1px solid #D9D9D9;
            padding: 50px;
            width: 98%;
        }
        /* Styling untuk masing-masing tombol */
        .btn-custom {
            margin-right: 10px; /* Jarak antar tombol */
            border-radius: 10px; /* Border radius */
            border: 1px solid transparent; /* Tambahkan border */
        }

        /* Styling tombol sesuai tema */
        .btn-primary-custom {
            background-color: #02347e;
            color: white;
            border-color: #02347e;
        }

        .btn-success-custom {
            background-color: #1d6f42;
            color: white;
            border-color: #1d6f42;
        }

        .btn-danger-custom {
            background-color: #960019;
            color: white;
            border-color: #960019;
        }

        /* Styling untuk input search */
        .search-input {
            border-radius: 15px;
            padding: 0.375rem 1.75rem;
            width: 200px;
            border: 1px solid #ced4da;
        }

        /* Styling table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 2px solid #000;
        }

        .custom-th{
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

        /* Styling pagination */
        .pagination {
            justify-content: flex-end;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>

    <a href="/pasca_produksi/create" class="btn btn-primary btn-custom btn-primary-custom">Tambah</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr class="custom-th">
                <th>ID</th>
                <th>ID Acara</th>
                <th>Status Barang</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasca_produksi as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['id_acara']; ?></td>
                <td><?= $row['status_barang']; ?></td>
                <td><?= $row['catatan']; ?></td>
                <td>
                    <a href="/pasca_produksi/edit/<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/pasca_produksi/delete/<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-5 mb-3">
        <a href="kegiatan" class="btn btn-secondary">Kembali ke Halaman Awal</a>
    </div>
</div>
<?= $this->endSection() ?>
