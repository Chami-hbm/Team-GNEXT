 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_player_stock extends CI_Model
{
    function __construct (){
            parent::__construct();
    }
    public function save_buy($data) {
        $this->db->insert('player_stocks',$data);
        return $this->db->insert_id();
    }
    
    public function decrease_player_balance($user_id,$decrement) {
        $this->db->set('current_balance', 'current_balance - '.$decrement, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->update('users');
    }
    
    public function increase_player_balance($user_id,$increment) {
        $this->db->set('current_balance', 'current_balance + '.$increment, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->update('users');
    }
    
    public function get_stock_for_sell() {
        $user=  $this->session->userdata['user_id'];
        
        $this->db->select('p.player_stock_id,p.quantity,p.price,c.company_stock_name,u.company_name,p.company_stocks_company_stock_id');
        $this->db->from('player_stocks as p');
        $this->db->join('company_stocks as c','c.company_stock_id=p.company_stocks_company_stock_id');
        $this->db->join('users as u','u.user_id=c.users_user_id');
        $this->db->where('p.users_user_id',$user);
        $result=$this->db->get()->result_array();
        return $result;
    }
}