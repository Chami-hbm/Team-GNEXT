<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_controller {
    var $data;
    
    function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'title' => $this->config->item('site_name').' - Login',
        );
    }

    public function login(){
        $data = $this->data;

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vlogin');
        $this->load->view('includes/v_include_footer');
    }
    
    public function login_check(){
        
        
        $login['email']= $this->input->post('email');
        $login['password']= $this->input->post('password');
        
        $login_status=$this->mlogin->login($login);
        
        if($login_status){
            if($this->session->userdata('user_type')=="players"){
                redirect(base_url().$this->session->userdata('user_type').'/play-game');
            }else{
                redirect(base_url().$this->session->userdata('user_type').'/view-portfolio');
            }
//             echo $this->session->userdata('usertype');
        }else{
            redirect(base_url().'login');
        }
    }
    
    public function register(){
        $data = $this->data;

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vregister');
        $this->load->view('includes/v_include_footer');
    }

}