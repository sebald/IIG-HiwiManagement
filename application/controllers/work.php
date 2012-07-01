<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends CI_Controller {

	public function index() {
		$data['hiwis'] = $this->hiwi->get_all();						
		$data['main_content'] = 'work';
		$this->load->view('template', $data);		
	}
	
	public function add() {
		$data['hiwis'] = $this->hiwi->add_work();
		redirect('main');		
	}
	
}

/* End of file work.php */
/* Location: ./application/controllers/work.php */