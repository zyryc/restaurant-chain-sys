<?php
/* 
 * Call me Zyryc
 */
 
class Customer extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Customer_model');
    } 

    /*
     * Listing of customers
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('customer/index?');
        $config['total_rows'] = $this->Customer_model->get_all_customers_count();
        $this->pagination->initialize($config);

        $data['customers'] = $this->Customer_model->get_all_customers($params);
        
        $data['_view'] = 'admin/customer/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new customer
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'status' => $this->input->post('status'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'image' => $this->input->post('image'),
            );
            
            $customer_id = $this->Customer_model->add_customer($params);
            redirect('admin/customer/index');
        }
        else
        {            
            $data['_view'] = 'admin/customer/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a customer
     */
    function edit($id)
    {   
        // check if the customer exists before trying to edit it
        $data['customer'] = $this->Customer_model->get_customer($id);
        
        if(isset($data['customer']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'status' => $this->input->post('status'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'image' => $this->input->post('image'),
                );

                $this->Customer_model->update_customer($id,$params);            
                redirect('admin/customer/index');
            }
            else
            {
                $data['_view'] = 'admin/customer/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The customer you are trying to edit does not exist.');
    } 

    /*
     * Deleting customer
     */
    function remove($id)
    {
        $customer = $this->Customer_model->get_customer($id);

        // check if the customer exists before trying to delete it
        if(isset($customer['id']))
        {
            $this->Customer_model->delete_customer($id);
            redirect('admin/customer/index');
        }
        else
            show_error('The customer you are trying to delete does not exist.');
    }
    
}
