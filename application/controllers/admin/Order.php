<?php
/* 
 * Call me Zyryc
 */
 
class Order extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Order_model');
    } 

    /*
     * Listing of orders
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('order/index?');
        $config['total_rows'] = $this->Order_model->get_all_orders_count();
        $this->pagination->initialize($config);

        $data['orders'] = $this->Order_model->get_all_orders($params);
        
        $data['_view'] = 'admin/order/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new order
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'status' => $this->input->post('status'),
				'customer_id' => $this->input->post('customer_id'),
				'grand_total' => $this->input->post('grand_total'),
            );
            
            $order_id = $this->Order_model->add_order($params);
            redirect('admin/order/index');
        }
        else
        {
			$this->load->model('Customer_model');
			$data['all_customers'] = $this->Customer_model->get_all_customers();
            
            $data['_view'] = 'admin/order/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a order
     */
    function edit($id)
    {   
        // check if the order exists before trying to edit it
        $data['order'] = $this->Order_model->get_order($id);
        
        if(isset($data['order']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'status' => $this->input->post('status'),
					'customer_id' => $this->input->post('customer_id'),
					'grand_total' => $this->input->post('grand_total'),
                );

                $this->Order_model->update_order($id,$params);            
                redirect('admin/order/index');
            }
            else
            {
				$this->load->model('Customer_model');
				$data['all_customers'] = $this->Customer_model->get_all_customers();

                $data['_view'] = 'admin/order/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The order you are trying to edit does not exist.');
    } 

    /*
     * Deleting order
     */
    function remove($id)
    {
        $order = $this->Order_model->get_order($id);

        // check if the order exists before trying to delete it
        if(isset($order['id']))
        {
            $this->Order_model->delete_order($id);
            redirect('admin/order/index');
        }
        else
            show_error('The order you are trying to delete does not exist.');
    }
    
}
