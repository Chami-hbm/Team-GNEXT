<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mstocks extends CI_Model
{
    function __construct (){
            parent::__construct();
    }

    function get_stocks() {
        $this->db->select('*');
        $this->db->from('company_stocks as cs');
        $this->db->join('users as cp', 'cs.users_user_id = cp.user_id', 'left');
        $this->db->where('type', 'sell');
        $query  = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
}

