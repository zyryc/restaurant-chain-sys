<?php


class Customers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('userId');
        $admin = $this->session->userdata('admin');
		if($user_id == NULL && $admin==false ){redirect('auth/login');} 
        $this->load->model('Table_booking_model');
        $this->load->model('customers_model');
        $this->load->library('session');
    }
    /*
    function for manage Customers.
    return all Customerss.
    created by your name
    created at 15-10-23.
	santosh salve
    */
    public function manageCustomers() { 
        $data['customers'] = $this->customers_model->getAll();
        $this->load->view('admin/customers/manage-customers', $data);
    }
    /*
    function for  add Customers get
    created by your name
    created at 15-10-23.
    */
    public function addCustomers() {
        $this->load->view('admin/customers/add-customers');
    }
    /*
    function for add Customers post
    created by your name
    created at 15-10-23.
    */
    public function addCustomersPost() {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        if ($_FILES['image']['name']) { 
                $data['image'] = $this->doUpload('image');
            } 
        $this->customers_model->insert($data);
        $this->session->set_flashdata('success', 'Customers added Successfully');
        redirect('admin/manage-customers');
    }
    /*
    function for edit Customers get
    returns  Customers by id.
    created by your name
    created at 15-10-23.
    */
    public function editCustomers($customers_id) {
        $data['customers_id'] = $customers_id;
        $data['customers'] = $this->customers_model->getDataById($customers_id);
        $this->load->view('admin/customers/edit-customers', $data);
    }
    /*
    function for edit Customers post
    created by your name
    created at 15-10-23.
    */
    public function editCustomersPost() {
        $customers_id = $this->input->post('customers_id');
        $customers = $this->customers_model->getDataById($customers_id);
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
if ($_FILES['image']['name']) { 
            $data['image'] = $this->doUpload('image');
            unlink('./uploads/customers/'.$customers[0]->image);
        } 
        $edit = $this->customers_model->update($customers_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Customers Updated');
            redirect('admin/manage-customers');
        }
    }
    /*
    function for view Customers get
    created by your name
    created at 15-10-23.
    */
    public function viewCustomers($customers_id) {
        $data['customers_id'] = $customers_id;
        $data['customers'] = $this->customers_model->getDataById($customers_id);
        $this->load->view('admin/customers/view-customers', $data);
    }
    /*
    function for delete Customers    created by your name
    created at 15-10-23.
    */
    public function deleteCustomers($customers_id) {
        $delete = $this->customers_model->delete($customers_id);
        $this->session->set_flashdata('success', 'customers deleted');
        redirect('admin/manage-customers');
    }
    /*
    function for activation and deactivation of Customers.
    created by your name
    created at 15-10-23.
    */
    public function changeStatusCustomers($customers_id) {
        $edit = $this->customers_model->changeStatus($customers_id);
        $this->session->set_flashdata('success', 'customers '.$edit.' Successfully');
        redirect('admin/manage-customers');
    }
        /*
    function for upload files
    return uploaded file name.
    created by your name
    created at 15-10-23.
    */
    function doUpload($file) {
        $config['upload_path'] = './uploads/customers';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload($file))
            {
              $error = array('error' => $this->upload->display_errors());
              $this->load->view('admin/upload_form', $error);
            }
            else
            {
              $data = array('upload_data' => $this->upload->data());
              return $data['upload_data']['file_name'];
            }
        }
    
}