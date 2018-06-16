<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin1_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
//        $this->load->database();
        $this->load->model('admin1/madmin1','madmin1');        
        if(!$this->loggedin()){
            redirect(base_url().'admin1/login');
        }
    }
    
    function login(){
        $login['username']= $this->input->post('username');
//        $login['password']= hash('sha512', $this->input->post('password'));
        $login['password']= $this->input->post('password');
        
        $login_stattus=$this->madmin1->login($login);
        //echo $login_stattus;
        if($login_stattus){
            $this->nativesession_new->set('Invalid_login',FALSE);
            redirect(base_url().'admin1/dashboard');
        }else{
            $this->nativesession_new->set('Invalid_login',TRUE);
            redirect(base_url().'admin1/login');
        }
    }
    
    function logout(){
        $this->madmin1->logout();
    }
    
    function loggedin(){
        return $this->madmin1->loggedin();
    }
    
}
/* End of file name.php */
/* Location: ./application/controllers/name.php */

