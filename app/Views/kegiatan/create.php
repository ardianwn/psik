<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Tambah Acara
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Tambah Acara</h2>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="<?= site_url('kegiatan/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nama_acara" class="form-label">Nama Acara</label>
        <input type="text" name="nama_acara" class="form-control" id="nama_acara" required>
    </div>
    <div class="mb-3">
        <label for="pic" class="form-label">PIC</label>
        <input type="text" name="pic" class="form-control" id="pic" required>
    </div>        
    <div class="mb-3">
        <label for="tim_tugas" class="form-label">Tim</label>
        <input type="text" name="tim_tugas" class="form-control" id="tim_tugas" required>
    </div>
    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" required>
    </div>
    <div class="mb-3">
        <label for="waktu_acara" class="form-label">Waktu</label>
        <input type="datetime-local" name="waktu_acara" class="form-control" id="waktu_acara" required>
    </div>
    <div class="mb-3">
        <label for="status_kegiatan" class="form-label">Status</label>
        <select name="status_kegiatan" class="form-control" id="status_kegiatan" required>
            <option value="Planned">Planned</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Completed">Completed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
<?= $this->endSection() ?>
