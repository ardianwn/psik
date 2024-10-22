<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role'); // Ambil role dari session

        // Jika tidak ada role di session, redirect ke halaman login
        if (!$role) {
            return redirect()->to('/login');
        }

        // Periksa hak akses berdasarkan role
        if ($role === 'admin') {
            return; // Admin dapat mengakses semua
        }

        // Jika user biasa, periksa akses
        if ($role === 'user') {
            // Daftar route yang dapat diakses user
            $allowedRoutes = [
                'absensi',
                'calendar',
                'kegiatan',
                'pra_produksi',
                'pasca_produksi',
            ];

            // Cek apakah route saat ini ada dalam daftar yang diizinkan
            $currentRoute = $request->getUri()->getPath();
            foreach ($allowedRoutes as $route) {
                if (strpos($currentRoute, $route) !== false) {
                    return; // Izinkan akses
                }
            }

            // Jika route tidak diizinkan, redirect
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Implementasi logika setelah permintaan diproses
        // Biasanya tidak diperlukan untuk filter role
    }
}
