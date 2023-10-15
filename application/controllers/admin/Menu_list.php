<?php
/* 
 * Call me Zyryc
 */
 
class Menu_list extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('Menu_list_model');
    } 

    /*
     * Listing of menu_list
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('menu_list/index?');
        $config['total_rows'] = $this->Menu_list_model->get_all_menu_list_count();
        $this->pagination->initialize($config);

        $data['menu_list'] = $this->Menu_list_model->get_all_menu_list($params);
        
        $data['_view'] = 'admin/menu_list/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new menu_list
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'for_who' => $this->input->post('for_who'),
				'menu_name' => $this->input->post('menu_name'),
            );
            
            $menu_list_id = $this->Menu_list_model->add_menu_list($params);
            redirect('admin/menu_list/index');
        }
        else
        {
			$this->load->model('Restaurants_model');
			$data['all_restaurants'] = $this->Restaurants_model->get_all_restaurants();
            
            $data['_view'] = 'admin/menu_list/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a menu_list
     */
    function edit($menu_id)
    {   
        // check if the menu_list exists before trying to edit it
        $data['menu_list'] = $this->Menu_list_model->get_menu_list($menu_id);
        
        if(isset($data['menu_list']['menu_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'for_who' => $this->input->post('for_who'),
					'menu_name' => $this->input->post('menu_name'),
                );

                $this->Menu_list_model->update_menu_list($menu_id,$params);            
                redirect('admin/menu_list/index');
            }
            else
            {
				$this->load->model('Restaurants_model');
				$data['all_restaurants'] = $this->Restaurants_model->get_all_restaurants();

                $data['_view'] = 'admin/menu_list/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The menu_list you are trying to edit does not exist.');
    } 

    /*
     * Deleting menu_list
     */
    function remove($menu_id)
    {
        $menu_list = $this->Menu_list_model->get_menu_list($menu_id);

        // check if the menu_list exists before trying to delete it
        if(isset($menu_list['menu_id']))
        {
            $this->Menu_list_model->delete_menu_list($menu_id);
            redirect('admin/menu_list/index');
        }
        else
            show_error('The menu_list you are trying to delete does not exist.');
    }
    
}
