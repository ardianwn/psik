<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Laporan Kinerja
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<div class="custom-container mt-3">
    <?php if (!empty($absensi)): ?>
        <h4>Laporan Kinerja <?= $absensi[0]['nama_user']; ?></h4>
    <?php endif; ?>

    <style>
        .custom-container {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 15px;
            border: 1px solid #D9D9D9;
            padding: 50px;
            width: 98%;
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

        .btn-success-custom {
            background-color: #1d6f42;
            color: white;
            border-color: #1d6f42;
        }

        .btn-danger-custom {
            background-color: #960019;
            color: white;
            border-color: #960019;
        }

        .search-input {
            border-radius: 15px;
            padding: 0.375rem 1.75rem;
            width: 200px;
            border: 1px solid #ced4da;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 2px solid #000;
        }

        .custom-th {
            background-color: #02347e;
            color: white;
        }

        th {
            background-color: #02347e;
            text-align: center;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .btn-info {
            background-color: #02347e;
            color: white;
            margin-top: 3rem;
        }

        .pagination {
            justify-content: flex-end;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>

    <div class="box-table">
        <div class="d-flex justify-content-between mb-3 mt-3">
            <div class="d-inline-block">
                <a href="/laporan_kinerja/excel" class="btn btn-success btn-custom btn-success-custom">Download Excel</a>
                <a href="/laporan_kinerja/pdf" class="btn btn-danger btn-custom btn-danger-custom">Download PDF</a>
            </div>

            <input type="text" id="searchInput" class="form-control search-input" placeholder="Search">
        </div>

        <table class="table table-bordered table-hover" id="absensi">
            <thead>
                <tr class="custom-th">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Status Absensi</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($absensi as $index => $row): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $row['nama_user']; ?></td>
                    <td><?= $row['divisi']; ?></td>
                    <td><?= $row['kegiatan']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['absensi_status']; ?></td>
                    <td>
                        <?php if ($row['dokumentasi']): ?>
                            <a href="<?= base_url('uploads/' . $row['dokumentasi']) ?>" target="_blank">Lihat Foto</a>
                        <?php else: ?>
                            Tidak ada dokumentasi
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?= base_url('/laporan_kinerja') ?>" class="btn btn-info">Kembali</a>
        <nav id="paginationNav">
            <ul class="pagination"></ul>
        </nav>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        const absensiTable = document.getElementById('absensi');
        const tableRows = Array.from(absensiTable.querySelectorAll('tbody tr'));
        const paginationNav = document.getElementById('paginationNav');

        let itemsPerPage = 5;
        let currentPage = 1;

        function updateTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredRows = tableRows.filter(row => {
                const cells = row.getElementsByTagName('td');
                return Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchTerm));
            });

            const totalRows = filteredRows.length;
            const totalPages = Math.ceil(totalRows / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            tableRows.forEach(row => row.style.display = 'none');
            filteredRows.slice(startIndex, endIndex).forEach(row => row.style.display = '');

            paginationNav.querySelector('ul').innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.className = 'page-item';
                pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                pageItem.addEventListener('click', () => {
                    currentPage = i;
                    updateTable();
                });
                paginationNav.querySelector('ul').appendChild(pageItem);
            }

            paginationNav.querySelectorAll('.page-item').forEach(item => {
                item.classList.toggle('active', item.textContent.trim() == currentPage);
            });
        }

        searchInput.addEventListener('input', updateTable);
        updateTable();
    });
    </script>

<?= $this->endSection() ?>
