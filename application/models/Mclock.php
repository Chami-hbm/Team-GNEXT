<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mclock extends CI_Model {
    function __construct (){
            parent::__construct();
    }

//    function get_stocks() {
//        $this->db->select('*');
//        $this->db->from('company_stocks as cs');
//        $this->db->join('users as cp', 'cs.users_user_id = cp.user_id', 'left');
//        $this->db->where('type', 'sell');
//        $query  = $this->db->get();
//        $result = $query->result_array();
//        return $result;
//    }
    
    function get_current_turn() {
        $this->db->select('*');
        $this->db->where('clock_id', 1);
        $query  = $this->db->get('clock');
        $result = $query->result_array();
        return $result['0']['current_turn'];
    }
    
    public function sector_trend($sector,$value) {
        $this->db->select('*');
        $this->db->where('company_sector', $sector);
        $query  = $this->db->get('users');
        $companies_of_the_sector = $query->result_array();
        
        foreach ($companies_of_the_sector as $row) {
            $this->db->select('*');
            $this->db->where('users_user_id', $row['user_id']);
            $this->db->where('type', 'sell');
            $query  = $this->db->get('company_stocks');
            $stock_set = $query->result_array();
            
            foreach ($stock_set as $row2) {
                $data = array(
                        'previous_price' => $row2['price'],
                        'price' => $row2['price']+($value),
                );                
                $this->db->where('company_stock_id', $row2['company_stock_id']);
                $this->db->update('company_stocks', $data);
            }
        }
    }

    public function random_trend($value) {
        $this->db->select('*');
        $this->db->where('type', 'sell');
        $query  = $this->db->get('company_stocks');
        $stock_set = $query->result_array();

        foreach ($stock_set as $row) {
            $rand_negative_positive = mt_rand(0,1);
            $positive_value = mt_rand(0,2);
            if($rand_negative_positive==0){
                $value=$positive_value*(-1);
            }else{
                $value=$positive_value;            
            }
            
            $data = array(
                    'previous_price' => $row['price'],
                    'price' => $row['price']+($value),
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
        }
    }

    public function general_trend($value) {
        $this->db->select('*');
        $this->db->where('type', 'sell');
        $query  = $this->db->get('company_stocks');
        $stock_set = $query->result_array();

        foreach ($stock_set as $row) {
            $data = array(
                    'previous_price' => $row['price'],
                    'price' => $row['price']+($value),
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
        }
    }
    
    public function event_trend($value) {
        $this->db->select('*');
        $this->db->where('type', 'sell');
        $query  = $this->db->get('company_stocks');
        $stock_set = $query->result_array();

        foreach ($stock_set as $row) {
            $data = array(
                    'previous_price' => $row['price'],
                    'price' => $row['price']+($value),
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
        }
    }
    
}

