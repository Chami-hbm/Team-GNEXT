<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "home/login";
$route['404_override'] = 'home/error404';

//------------------------ player -------------------------------
//--------------------------------------------------------------------

$route['login'] = "player/player_home/login";
$route['login-check'] = "player/player_home/login_check";

$route['player/logout'] = "player/player_home/logout";
$route['players/dashboard'] = 'player/players/dashboard';




$route['translate_uri_dashes'] = FALSE;