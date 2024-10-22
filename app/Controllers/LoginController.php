<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $userModel->where('username', $username)->first();

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Set session dengan id_users, user, dan role
            session()->set([
                'id_users' => $user['id_users'],
                'user' => $user,
                'nama' => $user['nama'],
                'role' => $user['role'] // Pastikan role juga disimpan di session
            ]);
            return redirect()->to('/absensi/create');
        } else {
            // Set flashdata untuk error jika login gagal
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
