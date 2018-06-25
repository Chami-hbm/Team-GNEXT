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
$route['players/get-analyst-recommendation'] = 'players/players_stock/get_analyst_recommendation';
$route['players/view-bank-balance'] = 'players/players/view_bank_balance';
$route['players/view-stock-portfolio'] = 'players/players_portfolio/index';
$route['players/view-current-historical-price-shares'] = 'players/players_historical_price/index';
$route['players/view-current-historical-price-shares/list/(:any)/(:any)'] = 'players/players_historical_price/load_table/$1/$2';

//Players Stocks
$route['players/stocks/buy/save'] = 'players/players_stock/save_buy';
$route['players/stocks/bid-buy/save'] = 'players/players_stock/save_buy_bid';
$route['players/stocks/sell/save'] = 'players/players_stock/save_sell';

//Brokers
$route['brokers/view-portfolio'] = 'brokers/brokers/view_portfolio';
$route['brokers/players-transactions'] = 'brokers/brokers_transactions/index';
$route['brokers/players-transactions/list/(:any)'] = 'brokers/brokers_transactions/transaction_player_list/$1';
$route['brokers/stock-management'] = 'brokers/brokers_stock/index';
$route['brokers/view-price-of-stock'] = 'brokers/brokers_historical_price/index';
$route['brokers/view-price-of-stock/list/(:any)/(:any)'] = 'brokers/brokers_historical_price/get_comparison_table/$1/$2';

$route['brokers/stock-management/save'] = 'brokers/brokers_stock/save_stock';
$route['brokers/stock-management/delete'] = 'brokers/brokers_stock/company_stock_delete';

//Clock
$route['clock/new-turn'] = "clock/new_turn";
$route['clock/reset-turns'] = "clock/reset_turns";
$route['clock/clock-time-setting/(:any)'] = "clock/clock_time_setting/$1";
$route['clock/clock-time-getting'] = "clock/clock_time_getting";
$route['clock/view-player-leaderboard'] = "clock/view_player_leaderboard";




$route['translate_uri_dashes'] = FALSE;