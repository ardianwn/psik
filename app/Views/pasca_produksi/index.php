<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Daftar Pasca Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Daftar Pasca Produksi</h2>

    <a href="/pasca_produksi/create" class="btn btn-primary mb-3">Tambah Pasca Produksi</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
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
    <p><a href="kegiatan">Kembali ke Halaman Awal</a></p>
</div>
<?= $this->endSection() ?>
