<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        // $this->load->model('Dashboard_model');
    }
    public function index()
    {
        echo "Dashboard";
        
    }

}
