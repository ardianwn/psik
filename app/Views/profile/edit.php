<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Edit Profil
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

    .custom-container .card-header {
    background-color: #02347e !important;
    color: white !important;
    }


    .form-control {
        border-radius: 8px;
    }
</style>

<div class="custom-container mt-3">
<!-- Form untuk mengubah data profil -->
<div class="card mt-4">
        <div class="card-header bg-primary text-white">
            Edit Profil
        </div>
        <div class="card-body">
            <form action="<?= base_url('profile/update'); ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $profile['nama']; ?>" required>
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $profile['email']; ?>" required>
                </div>

                <div class="form-group mt-3">
                    <label for="divisi">Divisi</label>
                    <input type="text" class="form-control" name="divisi" id="divisi" value="<?= $profile['divisi']; ?>">
                </div>

                <div class="text-end mt-5">
                    <button type="submit" class="btn btn-primary btn-custom btn-primary-custom">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>