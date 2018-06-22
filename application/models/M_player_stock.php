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
}