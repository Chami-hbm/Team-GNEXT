<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brokers_stock extends User_controller{
    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->data = array(
            'site_name' => $this->config->item('site_name'),
            'company_name' => $this->config->item('company_name'),
            'title' => 'Broker | Stock Management - ' . $this->config->item('site_name'),
            'description' => 'Customers Details of' . $this->config->item('description'),
            'usertype' => "brokers",
        );
        $this->load->model('m_company_stock');
        $this->load->model('mhome');
    }
    
    public function index(){
        $data=$this->data;
        $data['scripts'][0]['src'] = base_url() . "assets/plugins/form-validation/jquery.validate.min.js";
        $data['companies'] = $this->mhome->get_companies();
        $data['company_stocks'] = $this->m_company_stock->get_stocks_by_broker();
        
        $data['navigation_buttons'] = $this->load->view('brokers/loading_pages/navigation_buttons',$data, true);
        $data['header'] = $this->load->view('template/a_vheader', $data, TRUE);
        $data['footer'] = $this->load->view('template/a_vfooter', NULL, TRUE);

        $this->load->view('includes/v_include_header', $data);
        $this->load->view('brokers/v_broker_stock_manage');
        $this->load->view('includes/v_include_footer');
    }   
    
    public function save_stock(){
        $stock['company_stock_name'] = $this->input->post('company_stock_name');
        $stock['users_user_id'] = $this->session->userdata['user_id'];
        $stock['type'] = "sell";
        
        if($this->input->post('company_stock_id')!=NULL && $this->input->post('company_stock_id')!=""){
            $stock['company_stock_id'] = $this->input->post('company_stock_id');
            $stock['quantity'] = $this->input->post('quantity');
            $stock['price'] = $this->input->post('price');
        }else{
            $stock['original_quantity'] = $this->input->post('quantity');
            $stock['quantity'] = $this->input->post('quantity');
            $stock['previous_price'] = $this->input->post('price');
            $stock['price'] = $this->input->post('price');
            
        }
        
        
        $this->m_company_stock->save_stock($stock);
        
        redirect(base_url('brokers/stock-management'));
    }   
    
    public function company_stock_delete(){
        $company_stock_id = $this->input->post('delete_company_stock_id');
        $this->m_company_stock->company_stock_delete($company_stock_id);
        redirect(base_url('brokers/stock-management'));
    }
}
