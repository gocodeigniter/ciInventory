<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// User Routes
$route['user/index'] = 'user/index';
$route['user/create'] = 'user/create';
$route['user/store'] = 'user/store';
$route['user/edit/(:any)'] = 'user/edit/$1';
$route['user/update/(:any)'] = 'user/update/$1';
$route['user/delete/(:any)'] = 'user/delete/$1';
