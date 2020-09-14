<?php
class Restaurant_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();

        }
	public function get_restaurants($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('restaurants');
                return $query->result_array();
		}

		$this->db->select('*');    
$this->db->from('restaurants');
$this->db->where('slug', $slug);

$query = $this->db->get();


      //  $query = $this->db->get_where('restaurants', array('slug' => $slug));
		// return $query->result_array();
		return $query->row_array();
}

	public function new_restaurant($data)
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		$data = array(
			'name' => $this->input->post('name'),
			'location' => $this->input->post('location'),
			'logo' => $data['logo'],
			'slug' => $slug
		);

		return $this->db->insert('restaurants', $data);
	}
	
}
