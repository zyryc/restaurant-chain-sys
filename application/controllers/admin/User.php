<?php
/* 
 * Call me Zyryc
 */
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('User_model');
    } 

    /*
     * Listing of users
     */
    function index()
    {
        $RECORDS_PER_PAGE = 10;
        $params['limit'] = $RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('user/index?');
        $config['total_rows'] = $this->User_model->get_all_users_count();
        $this->pagination->initialize($config);

        $data['users'] = $this->User_model->get_all_users($params);
        
        $data['_view'] = 'admin/user/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'status' => $this->input->post('status'),
				'gender' => $this->input->post('gender'),
				'role' => $this->input->post('role'),
				'password' => $this->input->post('password'),
				'user_name' => $this->input->post('user_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('admin/user/index');
        }
        else
        {            
            $data['_view'] = 'admin/user/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($id)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'status' => $this->input->post('status'),
					'gender' => $this->input->post('gender'),
					'role' => $this->input->post('role'),
					'password' => $this->input->post('password'),
					'user_name' => $this->input->post('user_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
                );

                $this->User_model->update_user($id,$params);            
                redirect('admin/user/index');
            }
            else
            {
                $data['_view'] = 'admin/user/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($id)
    {
        $user = $this->User_model->get_user($id);

        // check if the user exists before trying to delete it
        if(isset($user['id']))
        {
            $this->User_model->delete_user($id);
            redirect('admin/user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}
