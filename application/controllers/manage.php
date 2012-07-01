<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function index() {	
		$data['hiwis'] = $this->hiwi->get_all();
		$data['main_content'] = 'manage';
		$this->load->view('template', $data);		
	}
	
	public function add_hiwi() {	
		$this->hiwi->create();
		redirect('manage');
	}
	
	public function add_contract() {
		$this->hiwi->add_contract();
		redirect('manage');
	}
	
	public function hiwi($id) {
		$data['hiwi'] = $this->hiwi->get($id);
		
		if( $this->input->post('from') && $this->input->post('to') ) {
			$data['work'] = $this->hiwi->get_work($id, $this->input->post('from'), $this->input->post('to'));
		} else {
			$data['work'] = $this->hiwi->get_work($id);
		}
		
		$data['main_content'] = 'manage_single';
		$this->load->view('template', $data);			
	}
}

/* End of file manage.php */
/* Location: ./application/controllers/manage.php */