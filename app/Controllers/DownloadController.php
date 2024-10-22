<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\PraProduksiModel;
use App\Models\PascaProduksiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class DownloadController extends BaseController
{
    // Fungsi untuk export ke Excel
    public function exportExcel()
    {
        // Inisialisasi model
        $kegiatanModel = new KegiatanModel();
        $praProduksiModel = new PraProduksiModel();
        $pascaProduksiModel = new PascaProduksiModel();

        // Ambil data dari database
        $kegiatan = $kegiatanModel->findAll();
        $praProduksi = $praProduksiModel->findAll();
        $pascaProduksi = $pascaProduksiModel->findAll();

        // Membuat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan data kegiatan
        $sheet->setCellValue('A1', 'Kegiatan');
        $sheet->setCellValue('A2', 'ID Acara');
        $sheet->setCellValue('B2', 'Nama Acara');
        $sheet->setCellValue('C2', 'PIC');
        $sheet->setCellValue('D2', 'Tim Tugas');
        $sheet->setCellValue('E2', 'Lokasi');
        $sheet->setCellValue('F2', 'Waktu Acara');
        $sheet->setCellValue('G2', 'Status Kegiatan');

        $row = 3;
        foreach ($kegiatan as $k) {
            $sheet->setCellValue('A' . $row, $k['id_acara']);
            $sheet->setCellValue('B' . $row, $k['nama_acara']);
            $sheet->setCellValue('C' . $row, $k['pic']);
            $sheet->setCellValue('D' . $row, $k['tim_tugas']);
            $sheet->setCellValue('E' . $row, $k['lokasi']);
            $sheet->setCellValue('F' . $row, $k['waktu_acara']);
            $sheet->setCellValue('G' . $row, $k['status_kegiatan']);
            $row++;
        }

        // Menambahkan data pra-produksi
        $sheet->setCellValue('A' . ($row + 1), 'Pra Produksi');
        $sheet->setCellValue('A' . ($row + 2), 'ID');
        $sheet->setCellValue('B' . ($row + 2), 'ID Acara');
        $sheet->setCellValue('C' . ($row + 2), 'Status Internet');
        $sheet->setCellValue('D' . ($row + 2), 'Status Listrik');
        $sheet->setCellValue('E' . ($row + 2), 'Status Lokasi');
        $sheet->setCellValue('F' . ($row + 2), 'Status Barang');

        $row += 3;
        foreach ($praProduksi as $pra) {
            $sheet->setCellValue('A' . $row, $pra['id']);
            $sheet->setCellValue('B' . $row, $pra['id_acara']);
            $sheet->setCellValue('C' . $row, $pra['status_internet']);
            $sheet->setCellValue('D' . $row, $pra['status_listrik']);
            $sheet->setCellValue('E' . $row, $pra['status_lokasi']);
            $sheet->setCellValue('F' . $row, $pra['status_barang']);
            $row++;
        }

        // Menambahkan data pasca-produksi
        $sheet->setCellValue('A' . ($row + 1), 'Pasca Produksi');
        $sheet->setCellValue('A' . ($row + 2), 'ID');
        $sheet->setCellValue('B' . ($row + 2), 'ID Acara');
        $sheet->setCellValue('C' . ($row + 2), 'Status Barang');
        $sheet->setCellValue('D' . ($row + 2), 'Catatan');

        $row += 3;
        foreach ($pascaProduksi as $pasca) {
            $sheet->setCellValue('A' . $row, $pasca['id']);
            $sheet->setCellValue('B' . $row, $pasca['id_acara']);
            $sheet->setCellValue('C' . $row, $pasca['status_barang']);
            $sheet->setCellValue('D' . $row, $pasca['catatan']);
            $row++;
        }

        // Download file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_Produksi.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    // Fungsi untuk export ke PDF
    public function exportPdf()
    {
        // Inisialisasi model
        $kegiatanModel = new KegiatanModel();
        $praProduksiModel = new PraProduksiModel();
        $pascaProduksiModel = new PascaProduksiModel();

        // Ambil data dari database
        $kegiatan = $kegiatanModel->findAll();
        $praProduksi = $praProduksiModel->findAll();
        $pascaProduksi = $pascaProduksiModel->findAll();

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Buat tampilan HTML untuk PDF
        $html = '<h1>Data Kegiatan</h1>';
        $html .= '<table border="1" width="100%">';
        $html .= '<tr><th>ID Acara</th><th>Nama Acara</th><th>PIC</th><th>Tim Tugas</th><th>Lokasi</th><th>Waktu Acara</th><th>Status Kegiatan</th></tr>';
        foreach ($kegiatan as $k) {
            $html .= '<tr>';
            $html .= '<td>' . $k['id_acara'] . '</td>';
            $html .= '<td>' . $k['nama_acara'] . '</td>';
            $html .= '<td>' . $k['pic'] . '</td>';
            $html .= '<td>' . $k['tim_tugas'] . '</td>';
            $html .= '<td>' . $k['lokasi'] . '</td>';
            $html .= '<td>' . $k['waktu_acara'] . '</td>';
            $html .= '<td>' . $k['status_kegiatan'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        // Tambahkan data pra-produksi
        $html .= '<h1>Data Pra Produksi</h1>';
        $html .= '<table border="1" width="100%">';
        $html .= '<tr><th>ID</th><th>ID Acara</th><th>Status Internet</th><th>Status Listrik</th><th>Status Lokasi</th><th>Status Barang</th></tr>';
        foreach ($praProduksi as $pra) {
            $html .= '<tr>';
            $html .= '<td>' . $pra['id'] . '</td>';
            $html .= '<td>' . $pra['id_acara'] . '</td>';
            $html .= '<td>' . $pra['status_internet'] . '</td>';
            $html .= '<td>' . $pra['status_listrik'] . '</td>';
            $html .= '<td>' . $pra['status_lokasi'] . '</td>';
            $html .= '<td>' . $pra['status_barang'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        // Tambahkan data pasca-produksi
        $html .= '<h1>Data Pasca Produksi</h1>';
        $html .= '<table border="1" width="100%">';
        $html .= '<tr><th>ID</th><th>ID Acara</th><th>Status Barang</th><th>Catatan</th></tr>';
        foreach ($pascaProduksi as $pasca) {
            $html .= '<tr>';
            $html .= '<td>' . $pasca['id'] . '</td>';
            $html .= '<td>' . $pasca['id_acara'] . '</td>';
            $html .= '<td>' . $pasca['status_barang'] . '</td>';
            $html .= '<td>' . $pasca['catatan'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Tampilkan hasil PDF
        $dompdf->stream('Data_Produksi.pdf', array("Attachment" => 0));
        exit;
    }
}
