<?php
/* 
 * Call me Zyryc
 */
 
class Restaurant_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get restaurant by restaurant_id
     */
    function get_restaurant($restaurant_id)
    {
        return $this->db->get_where('restaurants',array('restaurant_id'=>$restaurant_id))->row_array();
    }
    
    /*
     * Get all restaurants count
     */
    function get_all_restaurants_count()
    {
        $this->db->from('restaurants');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all restaurants
     */
    function get_all_restaurants($params = array())
    {
        $this->db->order_by('restaurant_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('restaurants')->result_array();
    }
        
    /*
     * function to add new restaurant
     */
    function add_restaurant($params)
    {
        $this->db->insert('restaurants',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update restaurant
     */
    function update_restaurant($restaurant_id,$params)
    {
        $this->db->where('restaurant_id',$restaurant_id);
        return $this->db->update('restaurants',$params);
    }
    
    /*
     * function to delete restaurant
     */
    function delete_restaurant($restaurant_id)
    {
        return $this->db->delete('restaurants',array('restaurant_id'=>$restaurant_id));
    }
}
