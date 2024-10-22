<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Edit Acara
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>
<div class="container mt-3">
    <h4>Edit Acara</h4>

    <style>
        .container {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin-left: 15px;
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
        h4 {
            text-align: center;
        }
    </style>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('kegiatan/update/' . $kegiatan['id_acara']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <div class="mb-3">
        <label for="nama_acara" class="form-label">Nama Acara</label>
        <input type="text" name="nama_acara" class="form-control" id="nama_acara" value="<?= $kegiatan['nama_acara']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="pic" class="form-label">PIC</label>
        <input type="text" name="pic" class="form-control" id="pic" value="<?= $kegiatan['pic']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="tim_tugas" class="form-label">Tim</label>
        <input type="text" name="tim_tugas" class="form-control" id="tim_tugas" value="<?= $kegiatan['tim_tugas']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $kegiatan['lokasi']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="waktu_acara" class="form-label">Waktu</label>
        <input type="datetime-local" name="waktu_acara" class="form-control" id="waktu_acara" value="<?= date('Y-m-d\TH:i', strtotime($kegiatan['waktu_acara'])); ?>" required>
    </div>
    <div class="mb-3">
        <label for="status_kegiatan" class="form-label">Status</label>
        <select name="status_kegiatan" class="form-control" id="status_kegiatan" required>
            <option value="Planned" <?= $kegiatan['status_kegiatan'] == 'Planned' ? 'selected' : ''; ?>>Planned</option>
            <option value="Ongoing" <?= $kegiatan['status_kegiatan'] == 'Ongoing' ? 'selected' : ''; ?>>Ongoing</option>
            <option value="Completed" <?= $kegiatan['status_kegiatan'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<?= $this->endSection() ?>
