<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_clock extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_current_turn() {
        return $this->db->get('clock')->result_array()[0]['current_turn'];
    }
    
    public function clock_time_setting($time) {
        $data = array(
                'current_clock_value' => $time,
        );
        $this->db->where('clock_id', 1);
        $this->db->update('clock', $data);
    }
    
    function clock_time_getting() {
        return $this->db->get('clock')->result_array()[0];
    }
    
    public function increase_turn() {
        $this->db->set('current_turn', 'current_turn+1', FALSE);
        $this->db->where('clock_id', 1);
        $this->db->update('clock', $data);
    }
    
    public function reset_turns() {
        $this->db->set('current_turn', 1, FALSE);
        $this->db->where('clock_id', 1);
        $this->db->update('clock', $data);
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
                if(($row2['price']+($value))<0){
                    $new_value=0;                    
                }else{
                    $new_value=$row2['price']+($value);
                }
                $data = array(
                        'previous_price' => $row2['price'],
                        'price' => $new_value,
                );                
                $this->db->where('company_stock_id', $row2['company_stock_id']);
                $this->db->update('company_stocks', $data);
                
                $data2 = array(
                        'price' => $new_value,
                );                
                $this->db->where('company_stocks_company_stock_id', $row2['company_stock_id']);
                $this->db->update('player_stocks', $data2);
            }
        }
    }

    public function random_trend() {
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
            if(($row['price']+($value))<0){
                $new_value=0;                    
            }else{
                $new_value=$row['price']+($value);
            }
            $data = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
            
            $data2 = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stocks_company_stock_id', $row['company_stock_id']);
            $this->db->update('player_stocks', $data2);
        }
    }

    public function general_trend($value) {
        $this->db->select('*');
        $this->db->where('type', 'sell');
        $query  = $this->db->get('company_stocks');
        $stock_set = $query->result_array();

        foreach ($stock_set as $row) {
            if(($row['price']+($value))<0){
                $new_value=0;                    
            }else{
                $new_value=$row['price']+($value);
            }
            $data = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
            
            $data2 = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stocks_company_stock_id', $row['company_stock_id']);
            $this->db->update('player_stocks', $data2);
        }
    }
    
    public function event_trend($value) {
        $this->db->select('*');
        $this->db->where('type', 'sell');
        $query  = $this->db->get('company_stocks');
        $stock_set = $query->result_array();

        foreach ($stock_set as $row) {
            if(($row['price']+($value))<0){
                $new_value=0;                    
            }else{
                $new_value=$row['price']+($value);
            }
            $data = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stock_id', $row['company_stock_id']);
            $this->db->update('company_stocks', $data);
            
            $data2 = array(
                    'price' => $new_value,
            );                
            $this->db->where('company_stocks_company_stock_id', $row['company_stock_id']);
            $this->db->update('player_stocks', $data2);
        }
    }
}
