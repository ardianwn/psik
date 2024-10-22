<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_acara';
    protected $allowedFields = ['id_acara', 'nama_acara', 'pic', 'tim_tugas', 'lokasi', 'waktu_acara', 'status_kegiatan'];
}

class PraProduksiModel extends Model
{
    protected $table = 'pra_produksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_acara', 'status_internet', 'status_listrik', 'status_lokasi', 'status_barang'];
}

class PascaProduksiModel extends Model
{
    protected $table = 'pasca_produksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_acara', 'status_barang', 'catatan'];
}
