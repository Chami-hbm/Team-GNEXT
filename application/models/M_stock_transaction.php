<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_stock_transaction extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_transaction($data) {
        $this->db->insert('stock_transactions',$data);
    }

}
