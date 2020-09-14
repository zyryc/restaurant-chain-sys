<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  
	public function __construct()
	{
    parent::__construct();
    
    $this->load->model('menu_model', 'menu');
    
		//Load Dependencies

  }
  
  public function index()
  {
    $data['title'] = "Menus";
    $data['menus'] = $this->menu->get_menus();


    $page="menu";
    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }
	public function create(){
    $this->load->helper('form');
    $this->load->library('form_validation');
	  $this->load->helper('URL');

    $this->form_validation->set_rules('menu_name', 'Menu Name', 'required');
    
    if ($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata('error', 'Menu add Failed');
    
      redirect('restaurant/');

    }else{
      $this->session->set_flashdata('success', 'Menu add succefully');
      $this->Menu_model->set_menu();
      redirect('restaurant/');
    }
  }
  
}
