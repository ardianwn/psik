<?php

namespace App\Models;

use CodeIgniter\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan'; // Nama tabel di database
    protected $primaryKey = 'id_acara';
    protected $allowedFields = ['nama_acara', 'pic', 'tim_tugas', 'lokasi', 'waktu_acara', 'status_kegiatan'];

}
