<?php
/* 
 * Call me Zyryc
 */
 
class Restaurant extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Restaurants_model');
    } 

    /*
     * Listing of restaurants
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('restaurant/index?');
        $config['total_rows'] = $this->Restaurants_model->get_all_restaurants_count();
        $this->pagination->initialize($config);

        $data['restaurants'] = $this->Restaurants_model->get_all_restaurants($params);
        
        $data['_view'] = 'admin/restaurant/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new restaurant
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'location' => $this->input->post('location'),
				'logo' => $this->input->post('logo'),
            );
            
            $restaurant_id = $this->Restaurants_model->add_restaurant($params);
            redirect('admin/restaurant/index');
        }
        else
        {            
            $data['_view'] = 'admin/restaurant/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a restaurant
     */
    function edit($restaurant_id)
    {   
        // check if the restaurant exists before trying to edit it
        $data['restaurant'] = $this->Restaurants_model->get_restaurant($restaurant_id);
        
        if(isset($data['restaurant']['restaurant_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'name' => $this->input->post('name'),
					'location' => $this->input->post('location'),
					'logo' => $this->input->post('logo'),
                );

                $this->Restaurants_model->update_restaurant($restaurant_id,$params);            
                redirect('admin/restaurant/index');
            }
            else
            {
                $data['_view'] = 'admin/restaurant/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The restaurant you are trying to edit does not exist.');
    } 

    /*
     * Deleting restaurant
     */
    function remove($restaurant_id)
    {
        $restaurant = $this->Restaurants_model->get_restaurant($restaurant_id);

        // check if the restaurant exists before trying to delete it
        if(isset($restaurant['restaurant_id']))
        {
            $this->Restaurants_model->delete_restaurant($restaurant_id);
            redirect('admin/restaurant/index');
        }
        else
            show_error('The restaurant you are trying to delete does not exist.');
    }
    
}
