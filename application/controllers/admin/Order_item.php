<?php
/* 
 * Call me Zyryc
 */
 
class Order_item extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Order_item_model');
    } 

    /*
     * Listing of order_items
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('order_item/index?');
        $config['total_rows'] = $this->Order_item_model->get_all_order_items_count();
        $this->pagination->initialize($config);

        $data['order_items'] = $this->Order_item_model->get_all_order_items($params);
        
        $data['_view'] = 'admin/order_item/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new order_item
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'order_id' => $this->input->post('order_id'),
				'food_id' => $this->input->post('food_id'),
				'quantity' => $this->input->post('quantity'),
				'sub_total' => $this->input->post('sub_total'),
            );
            
            $order_item_id = $this->Order_item_model->add_order_item($params);
            redirect('admin/order_item/index');
        }
        else
        {
			$this->load->model('Order_model');
			$data['all_orders'] = $this->Order_model->get_all_orders();

			$this->load->model('Food_model');
			$data['all_food'] = $this->Food_model->get_all_food();
            
            $data['_view'] = 'admin/order_item/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a order_item
     */
    function edit($id)
    {   
        // check if the order_item exists before trying to edit it
        $data['order_item'] = $this->Order_item_model->get_order_item($id);
        
        if(isset($data['order_item']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'order_id' => $this->input->post('order_id'),
					'food_id' => $this->input->post('food_id'),
					'quantity' => $this->input->post('quantity'),
					'sub_total' => $this->input->post('sub_total'),
                );

                $this->Order_item_model->update_order_item($id,$params);            
                redirect('admin/order_item/index');
            }
            else
            {
				$this->load->model('Order_model');
				$data['all_orders'] = $this->Order_model->get_all_orders();

				$this->load->model('Food_model');
				$data['all_food'] = $this->Food_model->get_all_food();

                $data['_view'] = 'admin/order_item/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The order_item you are trying to edit does not exist.');
    } 

    /*
     * Deleting order_item
     */
    function remove($id)
    {
        $order_item = $this->Order_item_model->get_order_item($id);

        // check if the order_item exists before trying to delete it
        if(isset($order_item['id']))
        {
            $this->Order_item_model->delete_order_item($id);
            redirect('admin/order_item/index');
        }
        else
            show_error('The order_item you are trying to delete does not exist.');
    }
    
}
