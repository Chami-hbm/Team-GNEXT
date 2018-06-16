<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
//        $this->load->database();
        $this->load->model('player/mplayer','mplayer');        
//        if(!$this->loggedin()){
//            redirect(base_url().'players/dashboard');
//        }
    }
    
    function login(){
        $login['username']= $this->input->post('username');
//        $login['password']= hash('sha512', $this->input->post('password'));
        $login['password']= $this->input->post('password');
        
        $login_stattus=$this->mplayer->login($login);
        //echo $login_stattus;
        if($login_stattus){
            $this->nativesession_new->set('Invalid_login',FALSE);
            redirect(base_url().'player/dashboard');
        }else{
            $this->nativesession_new->set('Invalid_login',TRUE);
            redirect(base_url().'player/login');
        }
    }
    
    function logout(){
        $this->mplayer->logout();
    }
    
    function loggedin(){
        return $this->mplayer->loggedin();
    }
    
}
/* End of file name.php */
/* Location: ./application/controllers/name.php */

