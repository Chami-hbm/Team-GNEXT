<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Players extends Player_controller{
    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Suppliers - ' . $this->config->item('site_name'),
            'description' => 'Customers Details of' . $this->config->item('description'),
            'usertype' => "Player",
        );
    }
    
    public function dashboard(){
        $data=$this->data;
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
        
        

        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);
        
//        $data['retrieve'] = $this->m_suppliers->get_suppliers();

        $this->load->view('includes/a_v_include_header', $data);
        $this->load->view('player/v_player_dashboard');
        $this->load->view('includes/a_v_include_footer');
    }
    
    public function play_game(){
        $this->load->view('player/v_player_dashboard');
    }

    
}
