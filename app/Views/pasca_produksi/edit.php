<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Edit Pasca Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Edit Pasca Produksi</h2>

    <form action="/pasca_produksi/update/<?= $pasca_produksi['id']; ?>" method="post">
        <div class="form-group">
            <label for="id_acara">ID Acara</label>
            <select name="id_acara" class="form-control">
                <?php foreach ($kegiatan as $acara): ?>
                    <option value="<?= $acara['id_acara']; ?>" <?= $pasca_produksi['id_acara'] == $acara['id_acara'] ? 'selected' : ''; ?>>
                        <?= $acara['nama_acara']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status_barang">Status Barang</label>
            <input type="text" name="status_barang" class="form-control" value="<?= $pasca_produksi['status_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" class="form-control" required><?= $pasca_produksi['catatan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
