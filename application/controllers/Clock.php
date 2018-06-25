<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clock extends CI_controller
{
    var $data;
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_clock');
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'title' => $this->config->item('site_name') . ' - Login',
        );
    }
    
    public function index() {
        $data = $this->data;
        
        $this->load->view('includes/v_include_header', $data);
        $this->load->view('vclock');
        $this->load->view('includes/v_include_footer');
    }
    
    public function clock_time_setting($time) {
        $this->m_clock->clock_time_setting($time);
    }

    public function clock_time_getting() {
        
        $data=$this->m_clock->clock_time_getting();
        echo json_encode($data);
    }
    
    public function new_turn() {
        $this->m_clock->increase_turn();
        
        $turn = $this->m_clock->get_current_turn();
        
        $this->sector_trend("IT");
        $this->random_trend();        
        $this->general_trend(); 
        if($turn==5){
            $this->event_trend();        
        }
    }
    public function reset_turns() {
        $this->m_clock->reset_turns();
    }
    
    public function sector_trend($sector) {
        //Sector Trend
        $rand_negative_positive = mt_rand(0,1);
        $positive_value = mt_rand(0,3);
        if($rand_negative_positive==0){
            $value=$positive_value*(-1);
        }else{
            $value=$positive_value;            
        }
        $this->m_clock->sector_trend($sector,$value);
    }
    
    public function random_trend() {
        //Random Trend
        $this->m_clock->random_trend();
    }
    
    public function general_trend() {
        //General Trend
        $rand_negative_positive = mt_rand(0,1);
        $positive_value = mt_rand(0,3);
        if($rand_negative_positive==0){
            $value=$positive_value*(-1);
        }else{
            $value=$positive_value;            
        }
        $this->m_clock->general_trend($value);
    }
    
    public function event_trend() {
        //General Trend
        $rand_negative_positive = mt_rand(0,1);
        $positive_value = mt_rand(0,5);
        if($rand_negative_positive==0){
            $value=$positive_value*(-1);
        }else{
            $value=$positive_value;            
        }
        $this->m_clock->general_trend($value);
    }
    
    public function view_player_leaderboard() {
        $data = $this->data;
        $data['players'] = $this->m_clock->get_all_players();
        
        $this->load->view('players/loading_pages/v_player_leaderboard',$data);
    }
    
    
    
}