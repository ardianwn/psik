<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Absensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/header') ?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<div class="custom-container mt-3">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h4 class="mb-4">Form Absensi</h4>
    
    <style>
         .custom-container {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 15px;
            border: 1px solid #D9D9D9;
            padding: 50px;
            width: 100%; /* Full width */
            max-width: 98%; /* Set maximum width */
            height: 87%; /* Set fixed height */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for better appearance */
            overflow: auto; /* Add scroll if content overflows */

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

        h4{
            text-align: center;
        }
    </style>
    <div class="custom-container mt-3">
    <form action="<?= site_url('/absensi/store'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <input type="hidden" name="id_users" value="<?= session()->get('id_users'); ?>">

        <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
        </div>

        <div class="mb-3">
            <label for="absensi_status" class="form-label">Absensi</label>
            <select class="form-select" id="absensi_status" name="absensi_status" required>
                <option value="" disabled selected>Select Status</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Dokumentasi (Upload Foto)</label>
            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" accept="image/*" required>
        </div>

        <div class="text-end mt-5">
            <button type="submit" class="btn btn-primary btn-custom btn-primary-custom">Simpan</button>
        </div>
    </form>
    </div>
</div>

<?= $this->endSection() ?>
