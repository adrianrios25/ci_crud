<?php 

class articles_model extends CI_Model{

	function create_article($data){
		$this->db->insert('articles', $data);
	}

	function get_articles(){
		$this->db->from('articles');
		$this->db->order_by('date_added', 'asc');
		$query = $this->db->get();
		
		return $query->result();
	}

	function delete_article(){
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('articles');
	}

	function get_article(){
		$this->db->from('articles');
		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function update_article($data){
		$this->db->where('id', $data['id']);
		$this->db->update('articles', $data);
	}
	
	function unique_title($data){
		$this->db->from('articles');
		$this->db->where('id !=', $data['id']);
		$this->db->where('title', $data['title']);
		$query = $this->db->get();
		
		return $query->num_rows();
	}	

}

?>