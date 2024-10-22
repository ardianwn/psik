<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AdministratorController extends BaseController
{
    public function index()
    {
        $userModel = new UsersModel();
        $admins = $userModel->where('role', 'admin')->findAll();
        return view('administrator/index', ['admins' => $admins]);
    }

    public function create()
    {
        return view('administrator/create');
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
            'role' => 'admin'
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('success', 'Admin berhasil ditambahkan.');
            return redirect()->to('/administrasi/index');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan admin.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $userModel = new UsersModel();
        $admin = $userModel->find($id);

        return view('administrator/edit', ['admin' => $admin]);
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
            session()->setFlashdata('success', 'Admin berhasil diperbarui.');
            return redirect()->to('/administrasi/index');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui admin.');
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $userModel = new UsersModel();
        $admin = $userModel->find($id);

        if ($admin) {
            return view('administrator/view', ['admin' => $admin]);
        } else {
            session()->setFlashdata('error', 'Admin not found.');
            return redirect()->to('/administrasi/index');
        }
    }

    public function delete($id)
    {
        $userModel = new UsersModel();

        if ($userModel->delete($id)) {
            session()->setFlashdata('success', 'Admin berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus admin.');
        }

        return redirect()->to('/administrasi/index');
    }
}
