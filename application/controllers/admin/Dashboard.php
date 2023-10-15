<?php
/* 
 * by Zyrc
 */
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        
    }

    function index()
    {
        $admin = $this->session->userdata('admin');
        
        $data['_view'] = 'admin/dashboard';
        $this->load->view('admin/layouts/main',$data);
    }
}
