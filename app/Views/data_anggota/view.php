<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Detail Anggota
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/header') ?>

<style>
    .custom-container {
        font-family: 'Poppins', sans-serif;
        background-color: #fff;
        margin: 15px;
        border: 1px solid #D9D9D9;
        padding: 50px;
        width: 100%;
        max-width: 98%;
        height: 87%;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    .btn-custom {
        margin-right: 10px;
        border-radius: 10px;
        border: 1px solid transparent;
    }

    .btn-secondary-custom {
        background-color: #6c757d;
        color: white;
        border-color: #6c757d;
    }

    h4 {
        text-align: center;
    }

    .custom-container .card-header {
        background-color: #02347e !important;
        color: white !important;
    }

    .form-control {
        border-radius: 8px;
    }
</style>

<div class="custom-container mt-3">
    <h4 class="mb-4"><b>Detail Anggota</b></h4>

    <!-- Menampilkan data anggota -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Informasi Anggota
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> <?= $user['nama']; ?></p>
            <p><strong>Email:</strong> <?= $user['email']; ?></p>
            <p><strong>Divisi:</strong> <?= $user['divisi']; ?></p>
            <p><strong>Tanggal Bergabung:</strong> <?= $user['tanggal_bergabung']; ?></p>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-end mt-4">
        <a href="<?= base_url('/data_anggota/index') ?>" class="btn btn-secondary btn-custom btn-secondary-custom">
            Kembali
        </a>
    </div>
</div>

<?= $this->endSection() ?>
