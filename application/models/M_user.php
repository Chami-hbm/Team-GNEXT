<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_balance() {
        $user=  $this->session->userdata['user_id'];
        $this->db->select('current_balance');
        $this->db->where('user_id',$user);
        $result=$this->db->get('users')->result_array()[0]['current_balance'];
        return $result;
    }
    function get_player_stocks() {
        $user=  $this->session->userdata['user_id'];
        $this->db->select('s.*,u.company_name,u.company_sector');
        $this->db->where('s.users_user_id',$user);
        $this->db->join('company_stocks as c','c.company_stock_id=s.company_stocks_company_stock_id');
        $this->db->join('users as u','u.user_id=c.users_user_id');
        return $this->db->get('player_stocks as s')->result_array();
    }
    
    public function get_players_transaction_by_broker($player) {
        $user=  $this->session->userdata['user_id'];
        $this->db->select('*');
        $this->db->from('bank_transactions as bt');
        $this->db->join('users as u','u.user_id=bt.users_user_id');
        $this->db->where('u.user_id',$player);
        $this->db->group_start();
        $this->db->where('bt.sender',$user);
        $this->db->or_where('bt.receiver',$user);
        $this->db->group_end();
        return $this->db->get()->result_array();
    }
    
    public function get_players_stocks_by_broker() {
        $user=  $this->session->userdata['user_id'];
        
        $this->db->select('*,ps.quantity as qty, ps.price as price1');
        $this->db->from('player_stocks as ps');
        $this->db->join('company_stocks as cs','cs.company_stock_id=ps.company_stocks_company_stock_id');
        $this->db->join('users as u','u.user_id=ps.users_user_id');
        $this->db->where('cs.users_user_id',$user);
        
        return $this->db->get()->result_array();
    }
    
    public function get_all_companies() {
        $this->db->where('player_type','company');
        $this->db->where('name !=',NULL);
        return $this->db->get('users')->result_array();
    }
    
    public function get_all_players() {
        $this->db->where('user_type','players');
        return $this->db->get('users')->result_array();
    }
    public function get_companies_by_sector($sector) {
        $this->db->where('company_sector',$sector);
        return $this->db->get('users')->result_array();
    }
}
