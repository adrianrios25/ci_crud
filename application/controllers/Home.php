<?php 

class Home extends CI_Controller {

	function index(){
		$data = array();

		if($query = $this->articles_model->get_articles()){
			$data['articles'] = $query;
		}
		
		$this->load->view('home', $data);
	}
	
	function create(){
		
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('title','Title','required|is_unique[articles.title]');
		$this->form_validation->set_rules('content','Content','required');
		
		if($this->form_validation->run() == FALSE){
			$data = array();

			if($query = $this->articles_model->get_articles()){
				$data['articles'] = $query;
			}
			
			$this->load->view('home', $data);
		}
		else{
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['date_added'] = date('Y-m-d');

		$this->articles_model->create_article($data);

		redirect('home');
		}
	}

	function delete(){
		$this->articles_model->delete_article();
		
		redirect('home');
	}
	
	function edit(){
		$data = array();

		if($query = $this->articles_model->get_article()){
			$data['article'] = $query;
		}
		
		$this->load->view('edit', $data);
	}
	
	function update(){
	
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('content','Content','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_userdata('update_message',validation_errors());
			redirect('home/edit/'.$this->input->post('id'));
		}
		else{
		$data = array();
		
		$data['id'] = $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['date_added'] = date('Y-m-d');
		
		//check if title is unique (if it returns 0 title is unique
		$unique_title =  $this->articles_model->unique_title($data);
		if($unique_title>0){
		$this->session->set_userdata('update_message','The Title field must contain a unique value.');
		redirect('home/edit/'.$this->input->post('id'));
		}
		else{
		$this->articles_model->update_article($data);		
		$this->session->set_userdata('update_message','Update Successful!');
		redirect('home/edit/'.$this->input->post('id'));		
		}
		}
	}

}
?>