<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "home/login";
$route['404_override'] = 'home/error404';

//------------------------ players -------------------------------
//--------------------------------------------------------------------

$route['login'] = "home/login";
$route['login-check'] = "home/login_check";
$route['register'] = "home/register";
$route['logout'] = "home/logout";

//Players
$route['players/play-game'] = 'players/play_game';
$route['players/get-analyst'] = 'players/get_analyst';
$route['players/view-bank-balance'] = 'players/view-bank-balance';
$route['players/view-stock-portfolio'] = 'players/view-stock-portfolio';
$route['players/view-current-historical-price-shares'] = 'players/view-current-historical-price-shares';


//Brokers
$route['brokers/view-portfolio'] = 'brokers/view_portfolio';




$route['translate_uri_dashes'] = FALSE;