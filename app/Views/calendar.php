<?= $this->extend('layouts/sidebar') ?>

<?= $this->section('title') ?>
Kalender Acara
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/header') ?>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />

    <!-- jQuery (Optional, but often used with FullCalendar) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script> <!-- Tambahkan pustaka bahasa -->

    <style>
        #calendar {
            margin: 20px; /* Margin atas, bawah, kanan, dan kiri */
            padding: 20px; /* Optional: Padding di dalam kalender */
            border: 1px solid #ddd; /* Optional: Border untuk tampilan */
            border-radius: 8px; /* Optional: Sudut border melengkung */
            background-color: #f9f9f9; /* Optional: Warna latar belakang */
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'id', // Menggunakan bahasa Indonesia
            initialView: 'dayGridMonth', // Tampilan default
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' // Format tampilan
            },
            editable: true, // Event dapat di-drag & drop
            selectable: true, // Bisa pilih rentang tanggal
            timeZone: 'local', // Gunakan waktu lokal
            events: '<?= base_url('calendar/fetchEvents') ?>', // Ambil event dari backend

            // Format waktu 24 jam
            eventTimeFormat: { // Format waktu di dalam event
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false
            },
            titleFormat: { // Format judul untuk tampilan bulan dan minggu
                month: 'long', // Nama bulan lengkap

            },
            // Fungsi untuk menambahkan event baru
            select: function(info) {
                var title = prompt('Masukkan Judul Kegiatan:');
                if (!title) return;

                var description = prompt('Masukkan Deskripsi Kegiatan (Opsional):');

                // Input manual waktu mulai dan selesai
                var startTime = prompt('Masukkan Waktu Mulai (YYYY-MM-DD HH:MM):', info.startStr.replace("T", " ").slice(0, 16));
                if (!startTime) return;

                var endTime = prompt('Masukkan Waktu Selesai (YYYY-MM-DD HH:MM) [Opsional]:', info.endStr ? info.endStr.replace("T", " ").slice(0, 16) : '');
                
                $.ajax({
                    url: '<?= base_url('calendar/addEvent') ?>',
                    method: 'POST',
                    data: {
                        title: title,
                        description: description, // Tambah deskripsi
                        start: startTime, // Waktu mulai yang diinputkan
                        end: endTime || null, // Waktu selesai (opsional)
                        allDay: false // Nonaktifkan allDay untuk waktu spesifik
                    },
                    success: function() {
                        calendar.refetchEvents(); // Refresh event setelah ditambahkan
                    }
                });
            },

            // Fungsi untuk memperbarui event saat di-drag & drop
            eventDrop: function(info) {
                $.ajax({
                    url: '<?= base_url('calendar/updateEvent') ?>',
                    method: 'POST',
                    data: {
                        id: info.event.id,
                        title: info.event.title,
                        description: info.event.extendedProps.description || '', // Kirim deskripsi juga
                        start: info.event.start.toISOString(), // Gunakan format ISO
                        end: info.event.end ? info.event.end.toISOString() : null, // Gunakan format ISO
                        allDay: info.event.allDay
                    },
                    success: function() {
                        calendar.refetchEvents(); // Refresh event setelah diperbarui
                    }
                });
            },

            // Fungsi untuk menampilkan detail event (termasuk deskripsi) saat diklik
            eventClick: function(info) {
                alert('Kegiatan: ' + info.event.title + '\nDeskripsi: ' + (info.event.extendedProps.description || 'Tidak ada deskripsi'));

                if (confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')) {
                    $.ajax({
                        url: '<?= base_url('calendar/deleteEvent') ?>',
                        method: 'POST',
                        data: {
                            id: info.event.id
                        },
                        success: function() {
                            calendar.refetchEvents(); // Refresh event setelah dihapus
                        }
                    });
                }
            }
        });

        calendar.render();
    });
    </script>

    <div id="calendar"></div>
<?= $this->endSection() ?>
