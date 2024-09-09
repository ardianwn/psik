<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Daftar Pra Produksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Daftar Pra Produksi</h2>

    <div class="d-flex justify-content-between mb-3">
        <!-- Tambah Pra Produksi -->
        <a href="/pra_produksi/create" class="btn btn-primary">Tambah</a>

        <!-- Search Form -->
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search">
    </div>

    <!-- Table -->
    <table class="table table-bordered table-hover" id="pra_produksi">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Acara</th>
                <th>Status Internet</th>
                <th>Status Listrik</th>
                <th>Status Lokasi</th>
                <th>Status Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pra_produksi as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['id_acara']; ?></td>
                <td><?= $row['status_internet']; ?></td>
                <td><?= $row['status_listrik']; ?></td>
                <td><?= $row['status_lokasi']; ?></td>
                <td><?= $row['status_barang']; ?></td>
                <td>
                    <a href="/pra_produksi/edit/<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/pra_produksi/delete/<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="pasca_produksi">Selanjutnya</a></p>

    <!-- Pagination -->
    <nav id="paginationNav">
        <ul class="pagination">
            <!-- Pagination items will be generated by JavaScript -->
        </ul>
    </nav>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const praProduksi = document.getElementById('pra_produksi');
    const tableRows = Array.from(praProduksi.querySelectorAll('tbody tr'));
    const paginationNav = document.getElementById('paginationNav');

    function updateTable() {
        // Get the search term
        const searchTerm = searchInput.value.toLowerCase();

        // Filter rows based on the search term
        const filteredRows = tableRows.filter(row => {
            const cells = row.getElementsByTagName('td');
            let match = false;
            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    match = true;
                    break;
                }
            }
            return match;
        });

        // Pagination
        const totalRows = filteredRows.length;
        const totalPages = Math.ceil(totalRows / itemsPerPage);

        // Show only rows for the current page
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        tableRows.forEach(row => row.style.display = 'none'); // Hide all rows
        filteredRows.slice(startIndex, endIndex).forEach(row => row.style.display = '');

        // Update pagination controls
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

        // Highlight the current page
        paginationNav.querySelectorAll('.page-item').forEach(item => {
            item.classList.toggle('active', item.textContent.trim() == currentPage);
        });
    }

    // Event listeners
    searchInput.addEventListener('input', updateTable);

    // Initial update
    updateTable();
});
</script>

<?= $this->endSection() ?>