<?php
class Menu_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();

        }

	public function set_menu()
	{
        $this->load->helper('url');

        $menu_slug = url_title($this->input->post('menu_name'), 'dash', TRUE);
    
        $data = array(
            'menu_name' => $this->input->post('menu_name'),
            'for_who' => $this->input->post('for_who'),
            'menu_slug' => $menu_slug
        );
    
        return $this->db->insert('menu_list', $data);
    }
    public function get_menus($slug = FALSE)
{
        $this->db->select('*');  
        $this->db->from('restaurants');
        $query = $this->db->join('menu_list', 'restaurants.restaurant_id = menu_list.for_who', 'left');

        if ($slug != FALSE)
        {
                $this->db->where('slug', $slug);
        }
        $query = $this->db->get();


      //  $query = $this->db->get_where('restaurants', array('slug' => $slug));
		return $query->result_array();
		// return $this->db->get()->result_array();
}

public function drop_menus($menu_slug = FALSE)
{
        if ($menu_slug === FALSE)
        {
                $query = $this->db->get('menu_list');
                return $query->result_array();
		}

		$this->db->select('*');    
$this->db->from('menu_list');
$this->db->join('restaurants', 'menu_list.for_who = restaurants.restaurant_id', 'left');
$this->db->where('menu_slug', $menu_slug);

$query = $this->db->get();


      //  $query = $this->db->get_where('restaurants', array('slug' => $slug));
		return $query->result_array();
		// return $this->db->get()->result_array();
}


	
}
