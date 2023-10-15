<?php
class Restaurants extends CI_Controller {

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
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		// $data['title']= 'Restaurant list';
		// $data['restaurants'] = $this->restaurant_model->get_restaurants();

		// $this->load->view('templates/header', $data);
		// $this->load->view('pages/restaurant_list', $data);
		// $this->load->view('templates/footer');
		$this->load->view('admin/restaurant/restaurants');
	}

	public function list()
	{


		$myJSON = json_encode( $this->restaurant_model->get_restaurants());

		// print_r($myJSON);
		echo $myJSON;
	}

    // this function receive ajax request and return closest providers

}
