<?php
/* 
 * Call me Zyryc
 */
 
class Food_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get food by food_id
     */
    function get_food($food_id)
    {
        return $this->db->get_where('food',array('food_id'=>$food_id))->row_array();
    }
    
    /*
     * Get all food count
     */
    function get_all_food_count()
    {
        $this->db->from('food');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all food
     */
    function get_all_food($params = array())
    {
        $this->db->order_by('food_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('food')->result_array();
    }
        
    /*
     * function to add new food
     */
    function add_food($params)
    {
        $this->db->insert('food',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update food
     */
    function update_food($food_id,$params)
    {
        $this->db->where('food_id',$food_id);
        return $this->db->update('food',$params);
    }
    
    /*
     * function to delete food
     */
    function delete_food($food_id)
    {
        return $this->db->delete('food',array('food_id'=>$food_id));
    }
}
