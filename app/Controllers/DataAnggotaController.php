<?php

namespace App\Controllers;

use App\Models\UsersModel;

class DataAnggotaController extends BaseController
{
    public function index()
    {
        $userModel = new UsersModel();
        $users = $userModel->where('role', 'user')->findAll();
        return view('data_anggota/index', ['users' => $users]);
    }

    public function create()
    {
        return view('data_anggota/create');
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
            'role' => 'user'
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('success', 'Anggota berhasil ditambahkan.');
            return redirect()->to('/data_anggota/index');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan anggota.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $userModel = new UsersModel();
        $user = $userModel->find($id);

        return view('data_anggota/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $userModel = new UsersModel();

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'divisi' => $this->request->getPost('divisi')
        ];

        if ($userModel->update($id, $data)) {
            session()->setFlashdata('success', 'Anggota berhasil diperbarui.');
            return redirect()->to('/data_anggota/index');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui anggota.');
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $userModel = new UsersModel();
        $user = $userModel->find($id);

        if ($user) {
            return view('data_anggota/view', ['user' => $user]);
        } else {
            session()->setFlashdata('error', 'User not found.');
            return redirect()->to('/data_anggota/index');
        }
    }

    public function delete($id)
    {
        $userModel = new UsersModel();

        if ($userModel->delete($id)) {
            session()->setFlashdata('success', 'Anggota berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus anggota.');
        }

        return redirect()->to('/data_anggota/index');
    }
}
