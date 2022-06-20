<?php
class Table extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('restaurant_model');
		$this->load->model('menu_model');
		$this->load->model('table_model');
		$this->load->model('auth_model');
        $user_id = $this->session->userdata('userId');
        if($user_id == NULL){redirect('auth/login');} 
      
	}

        public function book()
        {
            $data['restaurant'] = $this->restaurant_model->get_restaurants();
           $data['title']= 'Book A table';
           $con = array( 
            'id' => $this->session->userdata('userId') 
        );
           $data['user'] = $this->auth_model->getRows($con); 

           $data['_view'] = 'table/book_table';      
           $this->load->view('templates/header', $data);
       
               
        }
        public function book_table()
        {
            $data['restaurant'] = $this->restaurant_model->get_restaurants();
          
            $data['title']= 'Book A table';
            $con = array( 
                'id' => $this->session->userdata('userId') 
            );
               $data['user'] = $this->auth_model->getRows($con); 
               $users['user'] = $this->auth_model->getRows($con); 
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show">', '</div>');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('book_date', 'Date','required' );
                $this->form_validation->set_rules('book_time', 'Time', 'required');
                
                //book_time,book_date, restaurant_booked, email, booked_by
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', 'Failed, Try again');
 
                    $data['_view'] = 'table/book_table';
           $this->load->view('templates/header', $data);
                }
                else
                {
                    $this->session->set_flashdata('success', 'Booked succefully');

                    $this->table_model->create_book();
                    $data['_view'] = 'table/book_table';
                    $this->load->view('templates/header', $data);
                }
        }
}