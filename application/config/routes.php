<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "home/login";
$route['404_override'] = 'home/error404';

//------------------------ players -------------------------------
//--------------------------------------------------------------------

$route['login'] = "home/login";
$route['login-check'] = "home/login_check";
$route['register'] = "home/register";
$route['register/save'] = "home/register_save";
$route['logout'] = "home/logout";

//Players
$route['players/play-game'] = 'players/players_play_game/index';
$route['players/get-analyst'] = 'players/players/get_analyst';
$route['players/view-bank-balance'] = 'players/players/view_bank_balance';
$route['players/view-stock-portfolio'] = 'players/players_portfolio/index';
$route['players/view-current-historical-price-shares'] = 'players/players_historical_price/index';

//Players Stocks
$route['players/stocks/buy/save'] = 'players/players_stock/save_buy';
$route['players/stocks/bid-buy/save'] = 'players/players_stock/save_buy_bid';

//Brokers
$route['brokers/view-portfolio'] = 'brokers/brokers/view_portfolio';
$route['brokers/players-transactions'] = 'brokers/brokers_transactions/index';
$route['brokers/stock-management'] = 'brokers/brokers_stock/index';
$route['brokers/view-price-of-stock'] = 'brokers/brokers_historical_price/index';


//Clock
$route['clock/new-turn'] = "clock/new_turn";
$route['clock/reset-turns'] = "clock/reset_turns";




$route['translate_uri_dashes'] = FALSE;