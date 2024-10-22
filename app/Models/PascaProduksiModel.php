<?php

namespace App\Models;

use CodeIgniter\Model;

class PascaProduksiModel extends Model {
    protected $table = 'pasca_produksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_acara', 'status_barang', 'catatan'];
}
