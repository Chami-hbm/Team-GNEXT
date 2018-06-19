<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_controller
{
    var $data;
    
    function __construct() {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('mhome');
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'title' => $this->config->item('site_name'),
        );
    }
    
    public function login() {
        $data = $this->data;
        
        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vlogin');
        $this->load->view('includes/v_include_footer');
    }
    
    public function login_check() {
        
        
        $login['email'] = $this->input->post('email');
        $login['password'] = $this->input->post('password');
        
        $login_status = $this->mlogin->login($login);
        
        if ($login_status) {
            if ($this->session->userdata('user_type') == "players") {
                redirect(base_url() . $this->session->userdata('user_type') . '/play-game');
            } else {
                redirect(base_url() . $this->session->userdata('user_type') . '/view-portfolio');
            }
        } else {
            redirect(base_url() . 'login');
        }
    }
    
    
    /* User registration functions */
    public function register() {
        $data = $this->data;
        $data['title'] = $this->config->item('site_name') . ' - Register';
        $data['companies'] = $this->mhome->get_companies();
        
        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vregister');
        $this->load->view('includes/v_include_footer');
    }
    
    public function register_save() {
        $user_data['user_type'] = $this->input->post('user_type');
        $user_data['name'] = $this->input->post('name');
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