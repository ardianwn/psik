<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Tambah Pasca Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Tambah Pasca Produksi</h2>

    <form action="/pasca_produksi/store" method="post">
        <div class="form-group">
            <label for="id_acara">ID Acara</label>
            <select name="id_acara" class="form-control">
                <?php foreach ($kegiatan as $acara): ?>
                    <option value="<?= $acara['id_acara']; ?>"><?= $acara['nama_acara']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status_barang">Status Barang</label>
            <input type="text" name="status_barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>
