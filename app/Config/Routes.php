<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'PageController::about');

$routes->get('kegiatan', 'KegiatanController::index');
$routes->get('kegiatan/create', 'KegiatanController::create');
$routes->post('kegiatan/store', 'KegiatanController::store');
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
