<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use CodeIgniter\Controller;

class AbsensiController extends Controller
{
    protected $absensiModel;

    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();
    }

    public function create()
    {
        return view('absensi/create');
    }

    public function store()
    {
        // Ambil data dari POST
        $data = $this->request->getPost();
    
        // Debugging: Lihat data yang diterima
        log_message('info', 'Data POST: ' . json_encode($data));
    
        // Ambil id_users dari session
        $id_users = session()->get('id_users');
        if (!$id_users) {
            log_message('error', 'id_users tidak ditemukan di session.');
            return redirect()->back()->with('error', 'ID pengguna tidak ditemukan. Silakan login kembali.');
        }
        $data['id_users'] = $id_users;
    
        // Validasi data
        $validationRules = [
            'id_users' => 'required|integer',
            'kegiatan' => 'required|string',
            'absensi_status' => 'required|string',
        ];
    
        // Cek validasi untuk POST data tanpa dokumentasi terlebih dahulu
        if ($this->validate($validationRules)) {
            // Cek apakah ada file dokumentasi yang diupload
            $file = $this->request->getFile('dokumentasi');
    
            // Check if the file was uploaded successfully
            if ($file->getError() == UPLOAD_ERR_OK) {
                // Debugging: Lihat status file upload
                log_message('info', 'File valid, nama file: ' . $file->getName());
    
                $fileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/', $fileName);
                $data['dokumentasi'] = $fileName; // Simpan nama file ke data
    
                // Debugging: Lihat data yang akan disimpan
                log_message('info', 'Data yang akan disimpan: ' . json_encode($data));
    
                // Jika semua validasi dan upload berhasil, simpan data ke database
                if (!$this->absensiModel->save($data)) {
                    log_message('error', 'Gagal menyimpan data: ' . json_encode($this->absensiModel->errors()));
                    return redirect()->back()->withInput()->with('errors', $this->absensiModel->errors());
                }
    
                return redirect()->to('/absensi/create')->with('success', 'Data absensi berhasil disimpan.');
            } else {
                // Jika file tidak valid, tambahkan error
                $error = $file->getErrorString() . ' (' . $file->getError() . ')';
                log_message('error', 'File tidak valid: ' . $error);
                $this->validator->setError('dokumentasi', 'Dokumentasi wajib diupload. Kesalahan: ' . $error);
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        } else {
            // Jika validasi gagal
            log_message('error', 'Validasi gagal: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}