<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Panggil data absensi dari model
$absensiData = $absensiModel->findAll();

// Buat objek Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set header kolom
$sheet->setCellValue('A1', 'ID User');
$sheet->setCellValue('B1', 'Kegiatan');
$sheet->setCellValue('C1', 'Tanggal');
$sheet->setCellValue('D1', 'Status');
$sheet->setCellValue('E1', 'Dokumentasi');

// Isi data ke dalam sheet
$row = 2; // Mulai pengisian data dari baris ke-2
foreach ($absensiData as $absensi) {
    $sheet->setCellValue('A' . $row, $absensi['id_users']);
    $sheet->setCellValue('B' . $row, $absensi['kegiatan']);
    $sheet->setCellValue('C' . $row, $absensi['tanggal']);
    $sheet->setCellValue('D' . $row, $absensi['absensi_status']);
    $sheet->setCellValue('E' . $row, $absensi['dokumentasi']);
    $row++;
}

// Buat file Excel dan kirim untuk diunduh
$writer = new Xlsx($spreadsheet);
$filename = 'laporan_kinerja.xlsx';

// Set header HTTP agar file dapat diunduh
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Simpan file ke output
$writer->save('php://output');

exit;
