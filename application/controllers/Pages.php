<?php
class Pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('restaurant_model');
		$this->load->helper('url_helper');
	}
	public function view($page = 'home')
{
	$this->load->helper('form');
	$this->load->library('form_validation');
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $data['restaurants'] = $this->restaurant_model->get_restaurants();

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['_view'] = 'pages/'.$page;
        $this->load->view('templates/header', $data);
}
}
