<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route["logout"] = "auth/logout"; 
 

//Home
$route["login"] = "auth/login"; 