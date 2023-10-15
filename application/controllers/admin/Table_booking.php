<?php
/* 
 * Call me Zyryc
 */
 
class Table_booking extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
    } 

    /*
     * Listing of table_booking
     */
    function index()
    {
        $params['limit'] = 20; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('table_booking/index?');
        $config['total_rows'] = $this->Table_booking_model->get_all_table_booking_count();
        $this->pagination->initialize($config);

        $data['table_booking'] = $this->Table_booking_model->get_all_table_booking($params);
        
        $data['_view'] = 'admin/table_booking/index';
        $this->load->view('admin/layouts/main',$data);
    }

    /*
     * Adding a new table_booking
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'booked_by' => $this->input->post('booked_by'),
				'email' => $this->input->post('email'),
				'restaurant_booked' => $this->input->post('restaurant_booked'),
				'book_date' => $this->input->post('book_date'),
				'book_time' => $this->input->post('book_time'),
				'dateadded' => $this->input->post('dateadded'),
				'modified_when' => $this->input->post('modified_when'),
            );
            
            $table_booking_id = $this->Table_booking_model->add_table_booking($params);
            redirect('admin/table_booking/index');
        }
        else
        {            
            $data['_view'] = 'admin/table_booking/add';
            $this->load->view('admin/layouts/main',$data);
        }
    }  

    /*
     * Editing a table_booking
     */
    function edit($book_id)
    {   
        // check if the table_booking exists before trying to edit it
        $data['table_booking'] = $this->Table_booking_model->get_table_booking($book_id);
        
        if(isset($data['table_booking']['book_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'booked_by' => $this->input->post('booked_by'),
					'email' => $this->input->post('email'),
					'restaurant_booked' => $this->input->post('restaurant_booked'),
					'book_date' => $this->input->post('book_date'),
					'book_time' => $this->input->post('book_time'),
					'dateadded' => $this->input->post('dateadded'),
					'modified_when' => $this->input->post('modified_when'),
                );

                $this->Table_booking_model->update_table_booking($book_id,$params);            
                redirect('admin/table_booking/index');
            }
            else
            {
                $data['_view'] = 'admin/table_booking/edit';
                $this->load->view('admin/layouts/main',$data);
            }
        }
        else
            show_error('The table_booking you are trying to edit does not exist.');
    } 

    /*
     * Deleting table_booking
     */
    function remove($book_id)
    {
        $table_booking = $this->Table_booking_model->get_table_booking($book_id);

        // check if the table_booking exists before trying to delete it
        if(isset($table_booking['book_id']))
        {
            $this->Table_booking_model->delete_table_booking($book_id);
            redirect('admin/table_booking/index');
        }
        else
            show_error('The table_booking you are trying to delete does not exist.');
    }
    
}
