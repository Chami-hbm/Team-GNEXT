<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlogin extends CI_Model
{
    function __construct (){
            parent::__construct();
    }

    function login($login) {
        $this->db->where('email', $login['username']);
        $this->db->where('password',hash('sha512', $login['password']));
        $query = $this->db->get('users');
        
        if(count($query->result_array())==1){
            $row=  $query->row();
            $data = array(
                            'user_id' => $row->user_id,
//                            'password' => $row->password_not_hashed,
                            'name' => $row->name,
                            'email' => $row->email,
                            'usertype' => $row->user_type,
                            'loggedin' => TRUE,
                    );
            
            $this->session->set_userdata($data);
            return TRUE;
        }else{
            $data = array(
                            'loggedin' => FALSE,
                    );
            $this->session->set_userdata($data);
            return FALSE;            
        }
        
    }
    
    
    
    public function loggedin (){        
        if($this->session->userdata('loggedin')){
            return $this->session->userdata('loggedin');
        }
        else{
            return FALSE;            
        }
    }

    

    public function logout ()    {
        $this->session->sess_destroy();
    }
    
    public function player_password_change_update ($detais)    {
        $dataset = array(
            'password' => $detais['password'],
            'password_not_hashed' => $detais['password_not_hashed'],
        );
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $dataset);
        echo $this->db->last_query();
        return TRUE;
    }   
    
    public function player_password_get()    {
        return $this->session->userdata('password');
    }
}

