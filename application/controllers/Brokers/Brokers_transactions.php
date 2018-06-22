<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brokers_transactions extends User_controller{
    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Broker | Transactions - ' . $this->config->item('site_name'),
            'description' => 'Customers Details of' . $this->config->item('description'),
            'usertype' => "brokers",
        );
        $this->load->model('m_user');
    }
    
    public function index(){
        $data=$this->data;
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
    
        $data['navigation_buttons'] = $this->load->view('brokers/loading_pages/navigation_buttons',$data, true);
        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

//        
        $data['players']=  $this->m_user->get_all_players();
        
        $this->load->view('includes/v_include_header', $data);
        $this->load->view('brokers/v_transactions');
        $this->load->view('includes/v_include_footer');
    }   
    public function transaction_player_list($player) {
        $data['details']=  $this->m_user->get_players_transaction_by_broker($player);
        $this->load->view('brokers/loading_pages/v_player_transaction_list',$data);
    }
}
