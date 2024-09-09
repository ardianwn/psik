<?php

namespace App\Controllers;

use App\Models\PascaProduksiModel;
use App\Models\Kegiatan;

class PascaProduksi extends BaseController
{
    protected $pascaProduksiModel;
    protected $kegiatanModel;

    public function __construct() {
        $this->pascaProduksiModel = new PascaProduksiModel();
        $this->kegiatanModel = new Kegiatan();
    }

    public function index() {
        $data['pasca_produksi'] = $this->pascaProduksiModel->findAll();
        return view('pasca_produksi/index', $data);
    }

    public function create() {
        $data['kegiatan'] = $this->kegiatanModel->findAll(); // Untuk memilih acara yang ada
        return view('pasca_produksi/create', $data);
    }

    public function store() {
        $this->pascaProduksiModel->save([
            'id_acara' => $this->request->getPost('id_acara'),
            'status_barang' => $this->request->getPost('status_barang'),
            'catatan' => $this->request->getPost('catatan')
        ]);
        return redirect()->to('/pasca_produksi');
    }

    public function edit($id) {
        $data['pasca_produksi'] = $this->pascaProduksiModel->find($id);
        $data['kegiatan'] = $this->kegiatanModel->findAll();
        return view('pasca_produksi/edit', $data);
    }

    public function update($id) {
        $this->pascaProduksiModel->update($id, [
            'id_acara' => $this->request->getPost('id_acara'),
            'status_barang' => $this->request->getPost('status_barang'),
            'catatan' => $this->request->getPost('catatan')
        ]);
        return redirect()->to('/pasca_produksi');
    }

    public function delete($id) {
        $this->pascaProduksiModel->delete($id);
        return redirect()->to('/pasca_produksi');
    }
}
