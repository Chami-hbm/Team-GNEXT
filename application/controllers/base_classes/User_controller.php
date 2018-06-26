<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
//        $this->load->database();
        $this->load->model('mlogin');        
        if(!$this->loggedin()){
            redirect(base_url().'login');
        }
    }
    
    function logout(){
        $this->mlogin->logout();
    }
    
    function loggedin(){
        return $this->mlogin->loggedin();
    }
    
}
/* End of file name.php */
/* Location: ./application/controllers/name.php */

