<?php

class Customers_model extends CI_Model {

    /*
    return all Customerss.
    created by your name
    created at 15-10-23.
    */
    public function getAll() {
        return $this->db->get('customers')->result();
    }
    /*
    function for create Customers.
    return Customers inserted id.
    created by your name
    created at 15-10-23.
    */
    public function insert($data) {
        $this->db->insert('customers', $data);
        return $this->db->insert_id();
    }
    /*
    return Customers by id.
    created by your name
    created at 15-10-23.
    */
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('customers')->result();
    }
    /*
    function for update Customers.
    return true.
    created by your name
    created at 15-10-23.
    */
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('customers', $data);
        return true;
    }
    /*
    function for delete Customers.
    return true.
    created by your name
    created at 15-10-23.
    */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('customers');
        return true;
    }
    /*
    function for change status of Customers.
    return activated of deactivated.
    created by your name
    created at 15-10-23.
    */
    public function changeStatus($id) {
        $table=$this->getDataById($id);
             if($table[0]->status==0)
             {
                $this->update($id,array('status' => '1'));
                return "Activated";
             }else{
                $this->update($id,array('status' => '0'));
                return "Deactivated";
             }
    }

}