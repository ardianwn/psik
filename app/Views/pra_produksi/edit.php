<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Edit Pra Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Edit Pra Produksi</h2>

    <form action="/pra_produksi/update/<?= $pra_produksi['id']; ?>" method="post">
        <div class="form-group">
            <label>ID Acara</label>
            <select class="form-control" name="id_acara" required>
                <?php foreach ($acaraList as $acara): ?>
                <option value="<?= $acara['id_acara']; ?>" <?= $pra_produksi['id_acara'] == $acara['id_acara'] ? 'selected' : ''; ?>>
                    <?= $acara['nama_acara']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Status Internet</label>
            <input type="text" class="form-control" name="status_internet" value="<?= $pra_produksi['status_internet']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status Listrik</label>
            <input type="text" class="form-control" name="status_listrik" value="<?= $pra_produksi['status_listrik']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status Lokasi</label>
            <input type="text" class="form-control" name="status_lokasi" value="<?= $pra_produksi['status_lokasi']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status Barang</label>
            <input type="text" class="form-control" name="status_barang" value="<?= $pra_produksi['status_barang']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/pra_produksi" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>
