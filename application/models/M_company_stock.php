<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_company_stock extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('m_player_stock');
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

    function get_stocks_by_broker() {
        $this->db->select('*');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as cp', 'cs.users_user_id = cp.user_id', 'left');
        $this->db->where('type', 'sell');
        $this->db->where('users_user_id', $this->session->userdata['user_id']);
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
    public function get_table_for_player_stock($value,$type) {
        $this->db->select('*');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as u','u.user_id=cs.users_user_id');
        if($type=='sector1'){
            $this->db->where('u.company_sector',$value);
        }else if($type=='company'){
            $this->db->where('u.user_id',$value);
        }else{
            
        }
        return $this->db->get()->result_array();
        
    }
        
    function get_stocks_for_buy_recommendation() {
//        $this->db->select('*,CASE WHEN status = "Approved" THEN "approved statement" 
//                         WHEN status = "Disapproved" THEN "disapproved statement"
//                                                     ELSE "pending statement"
//                                                     END AS status');
        $this->db->select('*');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as cp', 'cs.users_user_id = cp.user_id', 'left');
        $this->db->where('(((price - previous_price)/previous_price)*100)>=', '10');
        $this->db->where('type', 'sell');
        $this->db->where('cp.company_name !=',NULL);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    function get_stocks_for_sell_recommendation() {
        $this->db->select('*,cs.previous_price as cs_previous_price,cs.price as cs_price,br.company_name as br_company_name,br.company_sector as br_company_sector,ps.quantity as ps_quantity');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as br', 'cs.users_user_id = br.user_id');
        $this->db->join('player_stocks as ps', 'ps.company_stocks_company_stock_id = cs.company_stock_id');
        $this->db->join('users as p', 'ps.users_user_id = p.user_id');
        $this->db->where('(((cs.previous_price - cs.price)/cs.previous_price)*100)>=', '10');
        $this->db->where('cs.type', 'sell');
        $this->db->where('br.company_name !=',NULL);
        $query = $this->db->get();
        $result = $query->result_array();
        
//        $sell_set=array();
//        $i=0;
//        $this->m_player_stock->get_stock_for_sell()
//        foreach ($result as $value) {
//            
//            
//        }
        
        return $result;
    }
    
    public function save_stock($data) {
        if (isset($data['company_stock_id'])) {
            $this->db->where('company_stock_id', $data['company_stock_id']);
            $this->db->update('company_stocks', $data);
        } else {
            $this->db->insert('company_stocks', $data);
        }
    }
    
    public function company_stock_delete($company_stock_id) {
        $this->db->where('company_stock_id', $company_stock_id);
        $this->db->delete('company_stocks');
    }


}
