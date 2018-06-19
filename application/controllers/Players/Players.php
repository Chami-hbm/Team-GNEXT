<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Players extends User_controller{
    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Players - ' . $this->config->item('site_name'),
            'usertype' => "players",
        );
    }
    
    public function view_bank_balance(){
        $data=$this->data;
        $data['title'] = 'Players | View Bank Balance - ' . $this->config->item('site_name');
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
    
        $data['navigation_buttons'] = $this->load->view('players/loading_pages/navigation_buttons',$data, true);
        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('players/v_current_bank_balance');
        $this->load->view('includes/v_include_footer');
    }   
}
