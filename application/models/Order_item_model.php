<?php
/* 
 * Call me Zyryc
 */
 
class Order_item_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get order_item by id
     */
    function get_order_item($id)
    {
        return $this->db->get_where('order_items',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all order_items count
     */
    function get_all_order_items_count()
    {
        $this->db->from('order_items');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all order_items
     */
    function get_all_order_items($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('order_items')->result_array();
    }
        
    /*
     * function to add new order_item
     */
    function add_order_item($params)
    {
        $this->db->insert('order_items',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update order_item
     */
    function update_order_item($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('order_items',$params);
    }
    
    /*
     * function to delete order_item
     */
    function delete_order_item($id)
    {
        return $this->db->delete('order_items',array('id'=>$id));
    }
}
