<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()	{
		$data['hiwis'] = $this->hiwi->get_all();	
		$data['main_content'] = 'main';
		$this->load->view('template', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */