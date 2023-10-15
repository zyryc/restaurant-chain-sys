<?php
class Food extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // Load cart library
        $this->load->library('cart');
		$this->load->model('restaurant_model');
		$this->load->model('Foods_model');
		$this->load->model('menu_model');
		$this->load->helper('url_helper');
		$user_id = $this->session->userdata('userId');
		if($user_id == NULL){redirect('auth/login');} 
		
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title']= 'Restaurant list';
		$data['restaurants'] = $this->restaurant_model->get_restaurants();
		$data['_view'] = 'pages/restaurant_list';
		$this->load->view('templates/header', $data);
	}

	public function view($slug = NULL)
	{
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		 $data['item'] = $this->restaurant_model->get_restaurants($slug);
		 $data['menus'] = $this->menu_model->get_menus($slug);
		$data['title']= 'Restaurant view';

		$data['_view'] = 'pages/restaurant_view';
		$this->load->view('templates/header', $data);
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$data['menus'] = $this->menu_model->drop_menus();
		$data['title'] = 'Add food';
	
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show">', '</div>');
            
		$this->form_validation->set_rules('food_name', 'food_name', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');
		$this->form_validation->set_rules('menuId', 'Menu ID', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['_view'] = 'pages/food_add';
			$this->load->view('templates/header', $data);

		}
		else
		{
			
   $config['upload_path'] = './assets/images/';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '2048000'; // max size in KB
   $config['max_width'] = '20000'; //max resolution width
   $config['max_height'] = '20000';  //max resolution height
   // load CI libarary called upload
  
   $this->upload->initialize($config);
   
   // body of if clause will be executed when image uploading is failed
   if(!$this->upload->do_upload('food_image')){
	$errors = array('errors' => $this->upload->display_errors());
	
	$this->load->view('pages/error', $errors);
   }
   // body of else clause will be executed when image uploading is succeeded
   else{
	$upload_data = $this->upload->data();
	//get the uploaded file name
	$data['food_image'] = $upload_data['file_name'];

	
	 //store pic data to the db
	 $this->Foods_model->addfood($data);
	 $this->session->set_flashdata('success', 'Successfully added');

	 redirect('food/create');
    
   }
			//redirect('');
			

		
		}
	}
    // this function receive ajax request and return closest providers

}
