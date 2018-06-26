<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlogin extends CI_Model
{
    function __construct (){
            parent::__construct();
    }

    function login($login) {
        $this->db->where('email', $login['email']);
        $this->db->where('password',hash('sha512', $login['password']));
        $query = $this->db->get('users');
        if(count($query->result_array())==1){
            $row=  $query->row();
            $data = array(
                            'user_id' => $row->user_id,
//                            'password' => $row->password_not_hashed,
                            'name' => $row->name,
                            'email' => $row->email,
                            'user_type' => $row->user_type,
                            'loggedin' => TRUE,
                    );
            
            $this->session->set_userdata($data);
            
            $this->login_logout_db_arrange($row->user_id,"login");
            $this->login_logout_db_arrange("0000001","login");
            $this->login_logout_db_arrange("0000002","login");
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
        $this->login_logout_db_arrange($this->session->userdata('user_id'),"logout");
        $this->login_logout_db_arrange("0000001","logout");
        $this->login_logout_db_arrange("0000002","logout");
        $this->session->sess_destroy();
        
    }
    
    public function player_password_change_update ($detais)    {
        $dataset = array(
            'password' => $detais['password'],
            'password_not_hashed' => $detais['password_not_hashed'],
        );
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $dataset);
        return TRUE;
    }   
    
    public function player_password_get()    {
        return $this->session->userdata('password');
    }
    
    
    /**
     * @param $data
     * Registration
     */
    public function register($data) {
        if($data['user_type'] == 'brokers') {
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('users', $data);
        }else{
            $this->db->insert('users', $data);
        }
        
    }
    
    public function login_logout_db_arrange($user_id,$type) {
        if($type == 'login') {
            $dataset = array(
                'loggedin' => 'Yes',
            );
        }else{
            $dataset = array(
                'loggedin' => 'No',
            );
        }
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $dataset);
        
    }
    
    
}

