<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/users/(:num)'] = 'admin/users/index/$1';
$route['admin/tesis/(:num)'] = 'admin/tesis/index/$1';
$route['users/search/(:num)'] = 'users/search/$1';

