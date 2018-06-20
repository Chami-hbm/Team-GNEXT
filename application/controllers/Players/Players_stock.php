<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Players_stock extends User_controller{
    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Players | Stock - ' . $this->config->item('site_name'),
            'usertype' => "players",
        );
        $this->load->model('mstocks');
    }
    
    public function index(){
        $data=$this->data;
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
        
        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('players/v_play_game');
        $this->load->view('includes/v_include_footer');
    }
    
    public function save_buy() {
        $user_data['company_stocks_company_stock_id'] = $this->input->post('company_stocks_company_stock_id');
        $user_data['users_user_id'] = ;
        $user_data['email'] = $this->input->post('email');
        $user_data['password'] = hash('sha512', $this->input->post('password'));
        $user_data['password_not_hashed'] = $this->input->post('password');
        
        if ($user_data['user_type'] === 'players') {
            $user_data['player_type'] = $this->input->post('player_type');
            $user_data['current_balance'] = $this->input->post('initial_balance');
        } elseif ($user_data['user_type'] === 'brokers') {
            $user_data['user_id'] = $this->input->post('company');
        }
    
        $this->mlogin->register($user_data);
    
        redirect(base_url('login'));
    }
}
