<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;
$route["logout"] = "auth/logout"; 
 

//Home
$route["login"] = "auth/login"; 

$route['form/(:any)/(:any)'] = 'formPortal/index/$1/$2';