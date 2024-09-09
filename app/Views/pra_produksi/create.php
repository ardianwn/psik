<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Tambah Pra Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Tambah Pra Produksi</h2>

    <form action="/pra_produksi/store" method="post">
        <div class="form-group">
            <label>ID Acara</label>
            <select class="form-control" name="id_acara" required>
                <option value="">Pilih Acara</option>
                <?php foreach ($acaraList as $acara): ?>
                <option value="<?= $acara['id_acara']; ?>"><?= $acara['nama_acara']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Status Internet</label>
            <input type="text" class="form-control" name="status_internet" required>
        </div>
        <div class="form-group">
            <label>Status Listrik</label>
            <input type="text" class="form-control" name="status_listrik" required>
        </div>
        <div class="form-group">
            <label>Status Lokasi</label>
            <input type="text" class="form-control" name="status_lokasi" required>
        </div>
        <div class="form-group">
            <label>Status Barang</label>
            <input type="text" class="form-control" name="status_barang" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pra_produksi" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>
