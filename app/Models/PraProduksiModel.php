<?php namespace App\Models;

use CodeIgniter\Model;

class PraProduksiModel extends Model
{
    protected $table = 'pra_produksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_acara', 'status_internet', 'status_listrik', 'status_lokasi', 'status_barang'];

    public function getAcaraList()
    {
        return $this->db->table('kegiatan')->select('id_acara, nama_acara')->get()->getResultArray();
    }
}
