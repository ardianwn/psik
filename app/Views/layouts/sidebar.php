
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title'); ?></title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="#">
                    <img src="<?= base_url('image/logopsik.png'); ?>" alt="VOKASI Logo" class="img-fluid" style="max-width: 70px;"> <!-- Ubah ini -->
                </a>
            </div>
        </div>
            <ul class="sidebar-nav">
                <!-- Menu Profile, dapat diakses oleh semua role -->
                <li class="sidebar-item">
                    <a href="<?= base_url('/absensi/create') ?>" class="sidebar-link">
                        <i class="lni lni-notepad"></i>
                        <span>Absensi</span>
                    </a>
                </li>

                <!-- Menu Agenda, dapat diakses oleh semua role -->
                <li class="sidebar-item">
                    <a href="<?= base_url('/calendar') ?>" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Agenda</span> <!-- Menu untuk Google Calendar -->
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?= base_url('/kegiatan') ?>" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Manajemen Produksi</span>
                    </a>
                </li>

                <!-- Menu Laporan Kinerja, hanya untuk admin -->
                <?php if (session()->get('role') == 'admin') : ?>
                <li class="sidebar-item">
                    <a href="<?= base_url('/laporan_kinerja') ?>" class="sidebar-link">
                        <i class="lni lni-write"></i>
                        <span>Laporan Kinerja</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Menu Master Data, hanya untuk admin -->
                <?php if (session()->get('role') == 'admin') : ?>
                <li class="sidebar-item">
                    <a href="#!" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Master Data</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= base_url('/data_anggota/index') ?>" class="sidebar-link">Data Anggota</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('/administrator/index') ?>" class="sidebar-link">Administrator</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>

            <div class="sidebar-footer">
                <a href="login" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main">
            <?= $this->renderSection('content') ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('js/sidebar.js') ?>"></script>
</body>

</html>