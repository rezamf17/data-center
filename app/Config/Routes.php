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
$routes->post('/edit-akun-pegawai/(:num)', 'AkunPegawaiController::postEditPegawai/$1', ['filter' => 'authGuard']);
$routes->post('/hapus-akun-pegawai/(:num)', 'AkunPegawaiController::postDeletePegawai/$1', ['filter' => 'authGuard']);
$routes->get('/register-proyek', 'RegisterProyekController::index', ['filter' => 'authGuard']);
$routes->get('/kelola-data-proyek', 'KelolaDataProyekController::index', ['filter' => 'authGuard']);
$routes->get('/tambah-register-proyek', 'RegisterProyekController::tambahRegisterProyek', ['filter' => 'authGuard']);
$routes->post('/post-register-proyek', 'RegisterProyekController::postRegisterProyek', ['filter' => 'authGuard']);
$routes->get('/lihat-dokumen/(:num)', 'RegisterProyekController::lihatDocument/$1', ['filter' => 'authGuard']);
$routes->post('/kelola-data-proyek/(:num)', 'KelolaDataProyekController::deleteProyek/$1', ['filter' => 'authGuard']);
$routes->get('/edit-kelola-data-proyek/(:num)', 'KelolaDataProyekController::editView/$1', ['filter' => 'authGuard']);
$routes->post('/edit-kelola-data-proyek/(:num)', 'KelolaDataProyekController::editProyek/$1', ['filter' => 'authGuard']);
$routes->post('/edit-dokumen1/(:num)', 'KelolaDataProyekController::gantiDokumen1/$1', ['filter' => 'authGuard']);
$routes->post('/edit-dokumen2/(:num)', 'KelolaDataProyekController::gantiDokumen2/$1', ['filter' => 'authGuard']);
$routes->post('/edit-dokumen3/(:num)', 'KelolaDataProyekController::gantiDokumen3/$1', ['filter' => 'authGuard']);
$routes->post('/edit-keterangan1/(:num)', 'KelolaDataProyekController::gantiKeterangan1/$1', ['filter' => 'authGuard']);
$routes->post('/edit-keterangan2/(:num)', 'KelolaDataProyekController::gantiKeterangan2/$1', ['filter' => 'authGuard']);
$routes->post('/edit-keterangan3/(:num)', 'KelolaDataProyekController::gantiKeterangan3/$1', ['filter' => 'authGuard']);
$routes->get('/edit-dokumen/(:num)', 'KelolaDataProyekController::editViewDocument/$1', ['filter' => 'authGuard']);
$routes->get('/tambah-data-proyek', 'KelolaDataProyekController::tambahProyek', ['filter' => 'authGuard']);
$routes->post('/tambah-data-proyek', 'KelolaDataProyekController::tambahDataProyek', ['filter' => 'authGuard']);
$routes->post('/kelola-data-proyek/search', 'KelolaDataProyekController::searchProyek', ['filter' => 'authGuard']);
$routes->post('/kelola-data-proyek/export', 'KelolaDataProyekController::exportExcel', ['filter' => 'authGuard']);
$routes->post('/kelola-data-proyek/export/search', 'KelolaDataProyekController::exportExcelSearch', ['filter' => 'authGuard']);
$routes->post('/register-proyek/search', 'RegisterProyekController::searchProyek', ['filter' => 'authGuard']);
$routes->get('/kelola-data-proyek/export/pdf', 'KelolaDataProyekController::exportPDF', ['filter' => 'authGuard']);
$routes->post('/kelola-data-proyek/export/pdf/search', 'KelolaDataProyekController::searchExportPDF', ['filter' => 'authGuard']);
$routes->post('/akun-pegawai/search', 'AkunPegawaiController::searchAkun', ['filter' => 'authGuard']);
$routes->get('/daftar-member', 'MemberController::index', ['filter' => 'authGuard']);
$routes->get('/tambah-daftar-member', 'MemberController::addMember', ['filter' => 'authGuard']);
$routes->post('/tambah-daftar-member', 'MemberController::postMember', ['filter' => 'authGuard']);
$routes->post('/delete-daftar-member/(:num)', 'MemberController::deleteMember/$1', ['filter' => 'authGuard']);
$routes->get('/view-document/(:num)', 'KelolaDataProyekController::viewDocument/$1', ['filter' => 'authGuard']);
$routes->get('/tambah-dokumen', 'KelolaDataProyekController::tambahDokumen', ['filter' => 'authGuard']);
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
