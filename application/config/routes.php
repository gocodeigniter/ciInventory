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
