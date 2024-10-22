<?php

namespace App\Controllers;

use App\Models\UsersModel;

class ProfileController extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        // Instansiasi model UsersModel
        $this->usersModel = new UsersModel();
    }

    // Method untuk menampilkan halaman profil
    public function index()
    {
        // Ambil ID pengguna dari session (misalnya saat pengguna login)
        $userId = session()->get('id_users'); 

        // Dapatkan data profil pengguna
        $profile = $this->usersModel->getProfile($userId);

        // Kirim data ke view
        return view('profile/index', ['profile' => $profile]);
    }

    public function edit()
{
    // Ambil ID pengguna dari session
    $userId = session()->get('id_users'); 

    // Dapatkan data profil pengguna
    $profile = $this->usersModel->getProfile($userId);

    // Kirim data ke view untuk ditampilkan dalam form
    return view('profile/edit', ['profile' => $profile]);
}


    // Method untuk update data profil
    public function update()
    {
        // Ambil ID pengguna dari session
        $userId = session()->get('id_users'); 

        // Data yang dikirimkan dari form
        $data = [
            'nama'    => $this->request->getPost('nama'),
            'email'   => $this->request->getPost('email'),
            'divisi'  => $this->request->getPost('divisi') // jika ada field 'divisi'
        ];

        // Update data pengguna
        $this->usersModel->update($userId, $data);

        // Redirect kembali ke halaman profil
        return redirect()->to('/profile');
    }
}
