<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mhome extends CI_Model
{
    function __construct (){
            parent::__construct();
    }

    function get_companies() {
        $this->db->where('user_type', 'brokers');
        $this->db->where('player_type', 'company');
        $this->db->where('name', NULL);
        $query  = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }
    
}

