<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class LaporanKinerjaController extends Controller
{
    protected $absensiModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
    }

    public function main()
    {
        $userModel = new UsersModel();
        $users = $userModel->where('role', 'user')->findAll();
        return view('laporan_kinerja/main', ['users' => $users]);
    }


    public function indexUser($id) {
        // Load model
        $absensiModel = new AbsensiModel();
    
        // Ambil data absensi untuk pengguna tertentu
        $data['absensi'] = $absensiModel->select('absensi.*, users.nama as nama_user, users.divisi')
                                        ->join('users', 'users.id_users = absensi.id_users')
                                        ->where('absensi.id_users', $id)
                                        ->findAll();
    
        return view('laporan_kinerja/index', $data); // Pastikan kamu sudah membuat tampilan ini
    }
    
    public function index() {
        // Ambil semua data absensi
        $data['absensi'] = $this->absensiModel->select('absensi.*, users.nama as nama_user, users.divisi')
                                              ->join('users', 'users.id_users = absensi.id_users')
                                              ->findAll();
        return view('laporan_kinerja/index', $data); // Pastikan kamu sudah membuat tampilan ini
    }
    

    // Download as Excel
    public function downloadExcel() {
        $absensiData = $this->absensiModel->findAll();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID User');
        $sheet->setCellValue('B1', 'Kegiatan');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Dokumentasi');

        // Fill in data
        $row = 2;
        foreach ($absensiData as $absensi) {
            $sheet->setCellValue('A' . $row, $absensi['id_users']);
            $sheet->setCellValue('B' . $row, $absensi['kegiatan']);
            $sheet->setCellValue('C' . $row, $absensi['tanggal']);
            $sheet->setCellValue('D' . $row, $absensi['absensi_status']);
            $sheet->setCellValue('E' . $row, $absensi['dokumentasi']);
            $row++;
        }
        

        // Create Excel file and download
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_kinerja.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // Download as PDF
    public function downloadPdf() {
        $absensiData = $this->absensiModel->findAll();

        $dompdf = new Dompdf();
        $html = view('laporan_kinerja/pdf', ['absensi' => $absensiData]);

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream('laporan_kinerja.pdf');
    }
}
