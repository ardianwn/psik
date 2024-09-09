<?php namespace App\Controllers;

use App\Models\PraProduksiModel;

class PraProduksi extends BaseController
{
    public function index()
    {
        $model = new PraProduksiModel();
        $data['pra_produksi'] = $model->findAll();
        return view('pra_produksi/index', $data);
    }

    public function create()
    {
        $model = new PraProduksiModel();
        $data['acaraList'] = $model->getAcaraList();

        return view('pra_produksi/create', $data);
    }

    public function store()
    {
        $model = new PraProduksiModel();
        $data = [
            'id_acara' => $this->request->getPost('id_acara'),
            'status_internet' => $this->request->getPost('status_internet'),
            'status_listrik' => $this->request->getPost('status_listrik'),
            'status_lokasi' => $this->request->getPost('status_lokasi'),
            'status_barang' => $this->request->getPost('status_barang')
        ];
        $model->save($data);
        return redirect()->to('/pra_produksi');
    }

    public function edit($id)
    {
        $model = new PraProduksiModel();
        $data['pra_produksi'] = $model->find($id);
        $data['acaraList'] = $model->getAcaraList();

        return view('pra_produksi/edit', $data);
    }

    public function update($id)
    {
        $model = new PraProduksiModel();
        $data = [
            'id_acara' => $this->request->getPost('id_acara'),
            'status_internet' => $this->request->getPost('status_internet'),
            'status_listrik' => $this->request->getPost('status_listrik'),
            'status_lokasi' => $this->request->getPost('status_lokasi'),
            'status_barang' => $this->request->getPost('status_barang')
        ];
        $model->update($id, $data);
        return redirect()->to('/pra_produksi');
    }

    public function delete($id)
    {
        $model = new PraProduksiModel();
        $model->delete($id);
        return redirect()->to('/pra_produksi');
    }
}
