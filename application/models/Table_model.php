<?php
class Table_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();

        }

	public function create_book()
	{
        $this->load->helper('url');
                //book_time,book_date, restaurant_booked, email, booked_by
                
        $data = array(
            'book_time' => $this->input->post('book_time'),
            'booked_by' => $this->input->post('booked_by'),
            'email' => $this->input->post('email'),
            'book_date' => $this->input->post('book_date'),
            'restaurant_booked' => $this->input->post('restaurant_booked')
        );
    
        return $this->db->insert('table_booking', $data);
    }
    public function get_menus($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('restaurants');
                return $query->result_array();
		}

		$this->db->select('*');    
$this->db->from('restaurants');
$this->db->join('menu_list', 'restaurants.restaurant_id = menu_list.for_who', 'left');
$this->db->where('slug', $slug);

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
