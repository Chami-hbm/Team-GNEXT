<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clock extends CI_controller
{
    var $data;
    
    function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'title' => $this->config->item('site_name') . ' - Login',
        );
    }
    
    public function index() {
        $data = $this->data;
        
        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vclock');
        $this->load->view('includes/v_include_footer');
    }
}