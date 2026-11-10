<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;
$route["logout"] = "auth/logout"; 
 
//url
$route['s/(:any)'] = 'shortlink/index/$1';
//Home
$route["login"] = "auth/login"; 

$route['form/(:any)/(:any)'] = 'formPortal/index/$1/$2';