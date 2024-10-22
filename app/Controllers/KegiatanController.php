<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KegiatanController extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data['kegiatan'] = $this->kegiatanModel->findAll();
        return view('kegiatan/index', $data);
    }

    public function create()
    {
        return view('kegiatan/create');
    }

    public function store()
    {
        $rules = [
            'nama_acara' => 'required|min_length[3]',
            'pic' => 'required',
            'tim_tugas' => 'required',
            'lokasi' => 'required',
            'waktu_acara' => 'required',
            'status_kegiatan' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = $this->request->getPost();
            if ($this->kegiatanModel->insert($data)) {
                return redirect()->to('/kegiatan')->with('success', 'Data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function view($id)
    {
        $data['kegiatan'] = $this->kegiatanModel->find($id);
        $data['pra_produksi'] = model('PraProduksiModel')->where('id_acara', $id)->first();
        $data['pasca_produksi'] = model('PascaProduksiModel')->where('id_acara', $id)->first();
        
        if (!$data['kegiatan']) {
            throw new PageNotFoundException("Data dengan id $id tidak ditemukan");
        }
        
        return view('kegiatan/view', $data);
    }

    public function edit($id)
    {
        $data['kegiatan'] = $this->kegiatanModel->find($id);
        if (!$data['kegiatan']) {
            throw new PageNotFoundException("Data dengan id $id tidak ditemukan");
        }
        return view('kegiatan/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_acara' => 'required|min_length[3]',
            'pic' => 'required',
            'tim_tugas' => 'required',
            'lokasi' => 'required',
            'waktu_acara' => 'required',
            'status_kegiatan' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = $this->request->getPost();
            if ($this->kegiatanModel->update($id, $data)) {
                return redirect()->to('/kegiatan')->with('success', 'Data berhasil diperbarui');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        if ($this->kegiatanModel->delete($id)) {
            return redirect()->to('/kegiatan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/kegiatan')->with('error', 'Gagal menghapus data');
        }
    }
}
