<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pegawai';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// User Routes
$route['pegawai/index'] = 'pegawai/index';
$route['pegawai/create'] = 'pegawai/create';
$route['pegawai/store'] = 'pegawai/store';
$route['pegawai/edit/(:any)'] = 'pegawai/edit/$1';
$route['pegawai/update/(:any)'] = 'pegawai/update/$1';
$route['pegawai/delete/(:any)'] = 'pegawai/delete/$1';
