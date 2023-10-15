<?php
/* 
 * Call me Zyryc
 */
 
class Food extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Food_model');
    } 

    /*
     * Listing of food
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('food/index?');
        $config['total_rows'] = $this->Food_model->get_all_food_count();
        $this->pagination->initialize($config);

        $data['food'] = $this->Food_model->get_all_food($params);
        
        $data['_view'] = 'admin/food/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new food
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'available' => $this->input->post('available'),
				'menuId' => $this->input->post('menuId'),
				'food_name' => $this->input->post('food_name'),
				'price' => $this->input->post('price'),
				'food_image' => $this->input->post('food_image'),
				'was_price' => $this->input->post('was_price'),
            );
            
            $food_id = $this->Food_model->add_food($params);
            redirect('admin/food/index');
        }
        else
        {
			$this->load->model('Menu_list_model');
			$data['all_menu_list'] = $this->Menu_list_model->get_all_menu_list();
            
            $data['_view'] = 'admin/food/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a food
     */
    function edit($food_id)
    {   
        // check if the food exists before trying to edit it
        $data['food'] = $this->Food_model->get_food($food_id);
        
        if(isset($data['food']['food_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'available' => $this->input->post('available'),
					'menuId' => $this->input->post('menuId'),
					'food_name' => $this->input->post('food_name'),
					'price' => $this->input->post('price'),
					'food_image' => $this->input->post('food_image'),
					'was_price' => $this->input->post('was_price'),
                );

                $this->Food_model->update_food($food_id,$params);            
                redirect('admin/food/index');
            }
            else
            {
				$this->load->model('Menu_list_model');
				$data['all_menu_list'] = $this->Menu_list_model->get_all_menu_list();

                $data['_view'] = 'admin/food/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The food you are trying to edit does not exist.');
    } 

    /*
     * Deleting food
     */
    function remove($food_id)
    {
        $food = $this->Food_model->get_food($food_id);

        // check if the food exists before trying to delete it
        if(isset($food['food_id']))
        {
            $this->Food_model->delete_food($food_id);
            redirect('admin/food/index');
        }
        else
            show_error('The food you are trying to delete does not exist.');
    }
    
}
