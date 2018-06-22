<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_company_stock extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_stocks() {
        $this->db->select('*');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as cp', 'cs.users_user_id = cp.user_id', 'left');
        $this->db->where('type', 'sell');
        $this->db->where('cp.company_name !=',NULL);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function decrease_stock_qty($stock_id, $qty) {
        $this->db->where('company_stock_id', $stock_id);
        $this->db->set('quantity', 'quantity-' . $qty, FALSE);
        $this->db->update('company_stocks');
    }
    
    function increase_stock_qty($stock_id, $qty) {
        $this->db->where('company_stock_id', $stock_id);
        $this->db->set('quantity', 'quantity+' . $qty, FALSE);
        $this->db->update('company_stocks');
    }
    
    function get_broker_by_stock_id($stock_id){
        $this->db->where('company_stock_id',$stock_id);
        return $this->db->get('company_stocks')->result_array()[0]['users_user_id'];
    }

}
