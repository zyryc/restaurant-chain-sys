<?php
class Food_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();

        }

	public function addfood($data)
	{
        $this->load->helper('url');

        $this->load->helper('url');

        // $slug = url_title($this->input->post('name'), 'dash', TRUE);

        $data = array(
                'food_name' => $this->input->post('food_name'),
                'price' => $this->input->post('price'),
                'food_image' => $data['food_image'],
                'menuId' => $this->input->post('menuId')
        );

        return $this->db->insert('food', $data);
    }
    public function get_food($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('food');
                return $query->result_array();
		}

		$this->db->select('*');    
$this->db->from('food');
$this->db->join('menu_list', 'food.menuId = menu_list.menu_id', 'left');
$this->db->join('restaurants', 'restaurants.restaurant_id = menu_list.for_who', 'left');
$this->db->where('slug', $slug);


$query = $this->db->get();


      //  $query = $this->db->get_where('restaurants', array('slug' => $slug));
		return $query->result_array();
		// return $this->db->get()->result_array();
}

	
}
