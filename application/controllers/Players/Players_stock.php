<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Players_stock extends User_controller {

    var $data;

    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Players | Stock - ' . $this->config->item('site_name'),
            'usertype' => "players",
        );
        $this->load->model('m_company_stock');
        $this->load->model('m_player_stock');
        $this->load->model('m_stock_transaction');
        $this->load->model('m_clock');
        $this->load->model('m_bank_transaction');
    }

    public function index() {
        $data = $this->data;
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";

        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('players/v_play_game');
        $this->load->view('includes/v_include_footer');
    }

    public function save_buy() {
        $player_stock['company_stocks_company_stock_id'] = $this->input->post('company_stocks_company_stock_id');
        $player_stock['users_user_id'] = $this->session->userdata['user_id'];
        $player_stock['quantity'] = $this->input->post('quantity');
        $player_stock['price'] = $this->input->post('price');

        $player_stock_id = $this->m_player_stock->save_buy($player_stock);
        $this->m_company_stock->decrease_stock_qty($player_stock['company_stocks_company_stock_id'], $player_stock['quantity']);

        $player['decrement'] = $this->input->post('total');
        $this->m_player_stock->decrease_player_balance($player_stock['users_user_id'], $player['decrement']);
        $turn = $this->m_clock->get_current_turn();

        $stock_transaction['turn'] = $turn;
        $stock_transaction['type'] = 'Buy';
        $stock_transaction['price'] = $player_stock['price'];
        $stock_transaction['player_stocks_player_stock_id'] = $player_stock_id;
        $stock_transaction['company_stocks_company_stock_id'] = $player_stock['company_stocks_company_stock_id'];
        $stock_transaction['quantity'] = $player_stock['quantity'];
        $this->m_stock_transaction->save_transaction($stock_transaction);

        $receiver = $this->m_company_stock->get_broker_by_stock_id($player_stock['company_stocks_company_stock_id']);
        $bank_transaction['turn'] = $turn;
        $bank_transaction['type'] = 'Withdraw';
        $bank_transaction['amount'] = $this->input->post('total');
        $bank_transaction['users_user_id'] = $player_stock['users_user_id'];
        $bank_transaction['receiver'] = $receiver;
        $this->m_bank_transaction->save_bank_transaction($bank_transaction);

        redirect(base_url('players/play-game'));
    }

    public function save_buy_bid() {
        $get_winner = mt_rand(0, 2);
        $status = '';
        if ($get_winner == 0) {
            $player_stock['company_stocks_company_stock_id'] = $this->input->post('stock_id_bid');
            $player_stock['users_user_id'] = $this->session->userdata['user_id'];
            $player_stock['quantity'] = $this->input->post('quantity_bid');
            $player_stock['price'] = $this->input->post('bid');

            $player_stock_id = $this->m_player_stock->save_buy($player_stock);
            $this->m_company_stock->decrease_stock_qty($player_stock['company_stocks_company_stock_id'], $player_stock['quantity']);
            $player['decrement'] = $this->input->post('total_bid');
            $this->m_player_stock->decrease_player_balance($player_stock['users_user_id'], $player['decrement']);
            $turn = $this->m_clock->get_current_turn();

            $stock_transaction['turn'] = $turn;
            $stock_transaction['type'] = 'Buy';
            $stock_transaction['price'] = $player_stock['price'];
            $stock_transaction['player_stocks_player_stock_id'] = $player_stock_id;
            $stock_transaction['company_stocks_company_stock_id'] = $player_stock['company_stocks_company_stock_id'];
            $stock_transaction['quantity'] = $player_stock['quantity'];
            $this->m_stock_transaction->save_transaction($stock_transaction);
            $receiver = $this->m_company_stock->get_broker_by_stock_id($player_stock['company_stocks_company_stock_id']);

            $bank_transaction['turn'] = $turn;
            $bank_transaction['type'] = 'Withdraw';
            $bank_transaction['amount'] = $this->input->post('total_bid');
            $bank_transaction['users_user_id'] = $player_stock['users_user_id'];
            $bank_transaction['receiver'] = $receiver;
            $this->m_bank_transaction->save_bank_transaction($bank_transaction);
            $status = 'player';
        } else {
            $player_stock['company_stocks_company_stock_id'] = $this->input->post('stock_id_bid');
            $player_stock['users_user_id'] = $get_winner;
            $player_stock['quantity'] = $this->input->post('quantity_bid');
            $player_stock['price'] = $this->input->post('bid');

            $player_stock_id = $this->m_player_stock->save_buy($player_stock);
            $this->m_company_stock->decrease_stock_qty($player_stock['company_stocks_company_stock_id'], $player_stock['quantity']);
            $player['decrement'] = ($player_stock['price'] + 5) * $player_stock['quantity'];
            $this->m_player_stock->decrease_player_balance($player_stock['users_user_id'], $player['decrement']);
            $turn = $this->m_clock->get_current_turn();

            $stock_transaction['turn'] = $turn;
            $stock_transaction['type'] = 'Buy';
            $stock_transaction['price'] = $player_stock['price'] + 5;
            $stock_transaction['player_stocks_player_stock_id'] = $player_stock_id;
            $stock_transaction['company_stocks_company_stock_id'] = $player_stock['company_stocks_company_stock_id'];
            $stock_transaction['quantity'] = $player_stock['quantity'];
            $this->m_stock_transaction->save_transaction($stock_transaction);
            $receiver = $this->m_company_stock->get_broker_by_stock_id($player_stock['company_stocks_company_stock_id']);

            $bank_transaction['turn'] = $turn;
            $bank_transaction['type'] = 'Withdraw';
            $bank_transaction['amount'] = $this->input->post('total_bid');
            $bank_transaction['users_user_id'] = $player_stock['users_user_id'];
            $bank_transaction['receiver'] = $receiver;
            $this->m_bank_transaction->save_bank_transaction($bank_transaction);
            $status = 'ai';
        }
        echo $get_winner;
//        echo 'winner:'.$winner.' | status:'.$status;
    }

    public function save_sell() {
        $player_stock['users_user_id'] = $this->session->userdata['user_id'];
        $player_stock['price']=  $this->input->post('sell-cost');
        $company_stock['company_stocks_company_stock_id'] = $this->input->post('company_stock_id');
        $company_stock['quantity'] = $this->input->post('sell-qty');
        $this->m_company_stock->increase_stock_qty($company_stock['company_stocks_company_stock_id'], $company_stock['quantity']);
        
        $player['increment'] = $this->input->post('sell_total');
        $this->m_player_stock->increase_player_balance($player_stock['users_user_id'], $player['increment']);
        
        $turn = $this->m_clock->get_current_turn();
        $stock_transaction['turn'] = $turn;
        $stock_transaction['type'] = 'Sell';
        $stock_transaction['price'] = $player_stock['price'];
        $stock_transaction['player_stocks_player_stock_id'] = $this->input->post('player_stock_id');
        $stock_transaction['company_stocks_company_stock_id'] = $company_stock['company_stocks_company_stock_id'];
        $stock_transaction['quantity'] = $company_stock['quantity'];
        $this->m_stock_transaction->save_transaction($stock_transaction);

        $sender = $this->m_company_stock->get_broker_by_stock_id($company_stock['company_stocks_company_stock_id']);
        $bank_transaction['turn'] = $turn;
        $bank_transaction['type'] = 'Deposit';
        $bank_transaction['amount'] = $this->input->post('sell_total');
        $bank_transaction['users_user_id'] = $player_stock['users_user_id'];
        $bank_transaction['sender'] = $sender;
        $this->m_bank_transaction->save_bank_transaction($bank_transaction);

        redirect(base_url('players/play-game'));
    }
    
    public function get_analyst_recommendation() {
        $data=$this->data;
        $player_stock['users_user_id'] = $this->session->userdata['user_id'];
        
        $data['title'] = 'Players | Get Analyst Recommendation - ' . $this->config->item('site_name');
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
        
        $data['buy_set']=  $this->m_company_stock->get_stocks_for_buy_recommendation();
        $data['sell_set']=  $this->m_company_stock->get_stocks_for_sell_recommendation();
        
        $data['navigation_buttons'] = $this->load->view('players/loading_pages/navigation_buttons',$data, true);
        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('players/v_player_analyst_recommendation');
        $this->load->view('includes/v_include_footer');
    }

}
