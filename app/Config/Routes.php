<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authGuard']);
$routes->post('/loginProcess', 'AuthController::loginProcess');
$routes->post('/doLogout', 'AuthController::doLogout');
$routes->get('/akun-pegawai', 'AkunPegawaiController::index', ['filter' => 'authGuard']);
$routes->get('/tambah-akun-pegawai', 'AkunPegawaiController::tambahPegawai', ['filter' => 'authGuard']);
$routes->post('/post-akun-pegawai', 'AkunPegawaiController::postTambahPegawai');
$routes->get('/edit-akun-pegawai/(:num)', 'AkunPegawaiController::editPegawai/$1', ['filter' => 'authGuard']);
$routes->get('/register-proyek', 'RegisterProyekController::index', ['filter' => 'authGuard']);
$routes->get('/kelola-data-proyek', 'KelolaDataProyekController::index', ['filter' => 'authGuard']);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
