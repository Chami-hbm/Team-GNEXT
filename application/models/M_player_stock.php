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
}