<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Daftar Administrator
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<div class="custom-container mt-3">
    <h4>Data Administrator</h4>

    <!-- Internal CSS -->
    <style>
        .custom-container{
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 15px;
            border: 1px solid #D9D9D9;
            padding: 50px;
            width: 98%;
        }
        
        /* Styling tombol sesuai tema */
        .btn-primary-custom {
            background-color: #02347e;
            color: white;
            border-color: #02347e;
        }

        .btn-info {
            background-color: #02347e;
            color: white;
        }

        .btn-warning {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
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

        .custom-th {
            background-color: #02347e;
            color: white;
        }

        th {
            text-align: center;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }
    </style>

    <!-- Tombol Tambah Admin -->
    <a href="<?= base_url('/administrator/create') ?>" class="btn btn-primary btn-primary-custom mb-3">Tambah Admin</a>

    <!-- Tabel Data Administrator -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="custom-th">
                <th>Nama</th>
                <th>Email</th>
                <th>Divisi</th>
                <th>Tanggal Bergabung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= $admin['nama'] ?></td>
                <td><?= $admin['email'] ?></td>
                <td><?= $admin['divisi'] ?></td>
                <td><?= $admin['tanggal_bergabung'] ?></td>
                <td>
                    <a href="<?= base_url('/administrator/view/'.$admin['id_users']) ?>" class="btn btn-info btn-sm">View</a>
                    <a href="<?= base_url('/administrator/edit/'.$admin['id_users']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('/administrator/delete/'.$admin['id_users']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination dan lainnya (jika diperlukan) -->
</div>

<?= $this->endSection() ?>
