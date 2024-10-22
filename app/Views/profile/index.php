<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Profil Pengguna
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

    .btn-primary-custom {
        background-color: #02347e;
        color: white;
        border-color: #02347e;
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
    <h4 class="mb-0">Profil Pengguna</h4>

    <!-- Tombol Edit Profil -->
    <div class="text-end mb-3">
        <a href="<?= base_url('profile/edit'); ?>" class="btn btn-outline-primary btn-custom">
            <i class="lni lni-pencil"></i> Edit Profil
        </a>
    </div>

    <!-- Menampilkan data profil -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Informasi Profil
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> <?= $profile['nama']; ?></p>
            <p><strong>Username:</strong> <?= $profile['username']; ?></p>
            <p><strong>Email:</strong> <?= $profile['email']; ?></p>
            <p><strong>Divisi:</strong> <?= $profile['divisi']; ?></p>
            <p><strong>Tanggal Bergabung:</strong> <?= $profile['tanggal_bergabung']; ?></p>
        </div>
    </div>

<?= $this->endSection() ?>
