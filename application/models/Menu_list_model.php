<?php
/* 
 * Call me Zyryc
 */
 
class Menu_list_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get menu_list by menu_id
     */
    function get_menu_list($menu_id)
    {
        return $this->db->get_where('menu_list',array('menu_id'=>$menu_id))->row_array();
    }
    
    /*
     * Get all menu_list count
     */
    function get_all_menu_list_count()
    {
        $this->db->from('menu_list');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all menu_list
     */
    function get_all_menu_list($params = array())
    {
        $this->db->order_by('menu_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('menu_list')->result_array();
    }
        
    /*
     * function to add new menu_list
     */
    function add_menu_list($params)
    {
        $this->db->insert('menu_list',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update menu_list
     */
    function update_menu_list($menu_id,$params)
    {
        $this->db->where('menu_id',$menu_id);
        return $this->db->update('menu_list',$params);
    }
    
    /*
     * function to delete menu_list
     */
    function delete_menu_list($menu_id)
    {
        return $this->db->delete('menu_list',array('menu_id'=>$menu_id));
    }
}
