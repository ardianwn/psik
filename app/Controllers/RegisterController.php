<?php
namespace App\Controllers;

use App\Models\UsersModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $userModel = new UsersModel();

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getPost('nama'),
            'divisi' => $this->request->getPost('divisi'),
            'tanggal_bergabung' => date('Y-m-d H:i:s'),
            'role' => 'user'  // Default role untuk user baru
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('success', 'Pendaftaran berhasil.');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('error', 'Pendaftaran gagal.');
            return redirect()->back();
        }
    }
}
