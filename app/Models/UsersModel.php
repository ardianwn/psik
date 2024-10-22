<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_users';

    protected $allowedFields = ['email', 'username', 'password', 'nama', 'divisi', 'tanggal_bergabung', 'role'];

    public function getProfile($id)
    {
        return $this->where('id_users', $id)->first(); // Mengambil data user berdasarkan id
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first(); // Mengambil data user berdasarkan username
    }
}
