<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
    }

    public function login(){
        
        $data = array(
            'site_name' => $this->config->item('site_name'),            
            'company_name' => $this->config->item('company_name'),
            'title' => $this->config->item('site_name').' - Login',
        );

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('admin/vlogin');
        $this->load->view('includes/v_include_footer');
    }
    
    public function login_check(){
        
        
        $login['email']= $this->input->post('email');
        $login['password']= $this->input->post('password');
        
        $login_status=$this->madmin->login($login);
        
        if($login_status){
            $this->nativesession->set('Invalid_login',FALSE);
            redirect(base_url().'');
//             echo $this->session->userdata('usertype');
        }else{
            $this->nativesession->set('Invalid_login',TRUE);
            redirect(base_url().'login');
        }
    }

}