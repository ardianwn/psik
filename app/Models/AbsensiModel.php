<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = [
        'id_users', 'kegiatan', 'tanggal', 'absensi_status', 'dokumentasi'
    ];

    // Aturan validasi di model
    protected $validationRules = [
        'id_users' => 'required|integer', // Pastikan ini ditambahkan
        'kegiatan' => 'required',
        'absensi_status' => 'required',
    ];
    

    protected $validationMessages = [
        'kegiatan' => [
            'required' => 'Kegiatan wajib diisi.'
        ],
        'absensi_status' => [
            'required' => 'Status absensi wajib dipilih.'
        ]
    ];
}
