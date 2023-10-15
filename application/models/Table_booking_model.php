<?php
/* 
 * Call me Zyryc
 */
 
class Table_booking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get table_booking by book_id
     */
    function get_table_booking($book_id)
    {
        return $this->db->get_where('table_booking',array('book_id'=>$book_id))->row_array();
    }
    
    /*
     * Get all table_booking count
     */
    function get_all_table_booking_count()
    {
        $this->db->from('table_booking');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all table_booking
     */
    function get_all_table_booking($params = array())
    {
        $this->db->order_by('book_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('table_booking')->result_array();
    }
        
    /*
     * function to add new table_booking
     */
    function add_table_booking($params)
    {
        $this->db->insert('table_booking',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update table_booking
     */
    function update_table_booking($book_id,$params)
    {
        $this->db->where('book_id',$book_id);
        return $this->db->update('table_booking',$params);
    }
    
    /*
     * function to delete table_booking
     */
    function delete_table_booking($book_id)
    {
        return $this->db->delete('table_booking',array('book_id'=>$book_id));
    }
}
