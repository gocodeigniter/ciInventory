<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Routes
$route['default_controller'] = 'petugas';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Petugas Routes
$route['petugas/index'] = 'petugas/index';
$route['petugas/create'] = 'petugas/create';
$route['petugas/store'] = 'petugas/store';
$route['petugas/edit/(:any)'] = 'petugas/edit/$1';
$route['petugas/update/(:any)'] = 'petugas/update/$1';
$route['petugas/delete/(:any)'] = 'petugas/delete/$1';

// Pegawai Routes
$route['pegawai/index'] = 'pegawai/index';
$route['pegawai/create'] = 'pegawai/create';
$route['pegawai/store'] = 'pegawai/store';
$route['pegawai/edit/(:any)'] = 'pegawai/edit/$1';
$route['pegawai/update/(:any)'] = 'pegawai/update/$1';
$route['pegawai/delete/(:any)'] = 'pegawai/delete/$1';

// Inventaris Routes
$route['inventaris/index'] = 'inventaris/index';
$route['inventaris/create'] = 'inventaris/create';
$route['inventaris/store'] = 'inventaris/store';
$route['inventaris/edit/(:any)'] = 'inventaris/edit/$1';
$route['inventaris/update/(:any)'] = 'inventaris/update/$1';
$route['inventaris/delete/(:any)'] = 'inventaris/delete/$1';

// Peminjaman Routes
$route['peminjaman/index'] = 'peminjaman/index';
$route['peminjaman/create'] = 'peminjaman/create';
$route['peminjaman/store'] = 'peminjaman/store';
$route['peminjaman/edit/(:any)'] = 'peminjaman/edit/$1';
$route['peminjaman/update/(:any)'] = 'peminjaman/update/$1';
$route['peminjaman/delete/(:any)'] = 'peminjaman/delete/$1';

// Detail Routes
$route['detail/index'] = 'detail/index';
$route['detail/create/(:any)'] = 'detail/create/$1';
$route['detail/store/(:any)'] = 'detail/store/$1';
$route['detail/edit/(:any)'] = 'detail/edit/$1';
$route['detail/update/(:any)'] = 'detail/update/$1';
$route['detail/delete/(:any)'] = 'detail/delete/$1';
$route['detail/delete/single/(:any)'] = 'detail/delete_single/$1';
