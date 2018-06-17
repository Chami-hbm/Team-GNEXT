<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "home/login";
$route['404_override'] = 'home/error404';

//------------------------ player -------------------------------
//--------------------------------------------------------------------

$route['login'] = "home/login";
$route['login-check'] = "home/login_check";
$route['register'] = "home/register";
$route['logout'] = "home/logout";

$route['players/dashboard'] = 'player/players/dashboard';




$route['translate_uri_dashes'] = FALSE;