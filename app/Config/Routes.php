<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk halaman umum
$routes->get('/about', 'PageController::about');
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register/store', 'RegisterController::store');
$routes->get('/profile', 'ProfileController::index'); // Menampilkan halaman profil
$routes->get('/profile/edit', 'ProfileController::edit');
$routes->post('/profile/update', 'ProfileController::update'); // Update profil


// Grup rute untuk User
$routes->group('', ['filter' => 'role:user'], function($routes) {
    $routes->get('/absensi/create', 'AbsensiController::create');
    $routes->post('/absensi/store', 'AbsensiController::store');
    $routes->get('/calendar', 'CalendarController::index');
    $routes->get('/calendar/fetchEvents', 'CalendarController::fetchEvents');
    $routes->post('/calendar/addEvent', 'CalendarController::addEvent');
    $routes->post('/calendar/updateEvent', 'CalendarController::updateEvent');
    $routes->post('/calendar/deleteEvent', 'CalendarController::deleteEvent');
});

$routes->group('', ['filter' => 'role:admin'], function($routes) {
    $routes->get('laporan_kinerja', 'LaporanKinerjaController::main');
    $routes->get('laporan_kinerja/index', 'LaporanKinerjaController::index');
    $routes->get('laporan_kinerja/index/(:num)', 'LaporanKinerjaController::indexUser/$1');
    $routes->get('laporan_kinerja/excel', 'LaporanKinerjaController::downloadExcel');
    $routes->get('laporan_kinerja/pdf', 'LaporanKinerjaController::downloadPdf');
});
    
// Grup rute untuk Admin
$routes->group('administrator', ['filter' => 'role:admin'], function($routes) {
    $routes->get('index', 'AdministratorController::index'); // Show all administrators
    $routes->get('create', 'AdministratorController::create'); // Show create form
    $routes->post('store', 'AdministratorController::store'); // Store new administrator
    $routes->get('edit/(:num)', 'AdministratorController::edit/$1'); // Edit administrator
    $routes->post('update/(:num)', 'AdministratorController::update/$1'); // Update administrator
    $routes->get('view/(:num)', 'AdministratorController::view/$1'); // View administrator details
    $routes->post('delete/(:num)', 'AdministratorController::delete/$1'); // Delete administrator
});

$routes->group('data_anggota', ['filter' => 'role:admin'], function($routes) {
    $routes->get('index', 'DataAnggotaController::index'); // Show all members
    $routes->get('create', 'DataAnggotaController::create'); // Show create form
    $routes->post('store', 'DataAnggotaController::store'); // Store new member
    $routes->get('edit/(:num)', 'DataAnggotaController::edit/$1'); // Edit member
    $routes->post('update/(:num)', 'DataAnggotaController::update/$1'); // Update member
    $routes->get('view/(:num)', 'DataAnggotaController::view/$1'); // View member details
    $routes->post('delete/(:num)', 'DataAnggotaController::delete/$1'); // Delete member
});


// Grup rute untuk kegiatan dan pra produksi (akses untuk semua)
$routes->group('', function($routes) {
    $routes->get('kegiatan', 'KegiatanController::index');
    $routes->get('kegiatan/create', 'KegiatanController::create');
    $routes->post('kegiatan/store', 'KegiatanController::store');
    $routes->get('kegiatan/view/(:num)', 'KegiatanController::view/$1');
    $routes->get('kegiatan/edit/(:num)', 'KegiatanController::edit/$1');
    $routes->put('kegiatan/update/(:num)', 'KegiatanController::update/$1');
    $routes->get('kegiatan/delete/(:num)', 'KegiatanController::delete/$1');

    $routes->get('pra_produksi', 'PraProduksi::index');
    $routes->get('pra_produksi/create', 'PraProduksi::create');
    $routes->post('pra_produksi/store', 'PraProduksi::store');
    $routes->get('pra_produksi/edit/(:num)', 'PraProduksi::edit/$1');
    $routes->post('pra_produksi/update/(:num)', 'PraProduksi::update/$1');
    $routes->get('pra_produksi/delete/(:num)', 'PraProduksi::delete/$1');

    $routes->get('pasca_produksi', 'PascaProduksi::index');
    $routes->get('pasca_produksi/create', 'PascaProduksi::create');
    $routes->post('pasca_produksi/store', 'PascaProduksi::store');
    $routes->get('pasca_produksi/edit/(:num)', 'PascaProduksi::edit/$1');
    $routes->post('pasca_produksi/update/(:num)', 'PascaProduksi::update/$1');
    $routes->get('pasca_produksi/delete/(:num)', 'PascaProduksi::delete/$1');

    $routes->get('/download/excel', 'DownloadController::exportExcel');
    $routes->get('/download/pdf', 'DownloadController::exportPDF');
});
