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

}
