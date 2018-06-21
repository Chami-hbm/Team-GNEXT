 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_bank_transaction extends CI_Model
{
    function __construct (){
            parent::__construct();
    }
    function save_bank_transaction($data){
        $this->db->insert('bank_transactions',$data);
    }
}