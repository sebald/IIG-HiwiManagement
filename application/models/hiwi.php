<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Hiwi extends CI_Model {

	public function create() {
		if ( $this->input->post('confirm') != $this->config->item('admin_pwd') )
			return false;	
			
		$data = array(
          'first_name' 			=> $this->input->post('first_name'),
          'last_name' 			=> $this->input->post('last_name'),
          'responsibilities' 	=> $this->input->post('responsibilities'),
          'pwd' 				=> $this->input->post('pwd')
        );		
		$insert = $this->db->insert('hiwi', $data);
        return $insert;		
	}
	
	public function get_all(){
		$this->db->order_by("last_name", "asc"); 
		return $this->db->get('hiwi')->result();
	}
	
	public function get($id) {
		if( $id == '' )
			return false;
		
		$this->db->where('id', $id);
		$query = $this->db->get('hiwi')->result();
		return $query[0];
	}
	
	public function add_contract() {
		if ( $this->input->post('confirm') != $this->config->item('admin_pwd') )
			return false;	
				
		$data = array(
          'hiwi_id' 	=> $this->input->post('id'),
          'start' 		=> $this->input->post('start_date'),
          'end' 		=> $this->input->post('end_date'),
          'hours' 		=> $this->input->post('hours'),
          'is_latest'	=> true
        );
		$insert = $this->db->insert('contract', $data);
		return $insert;	
	}
	
	public function add_work() {
		$query = $this->db->get_where('hiwi', array('id' => $this->input->post('id')),1,0)->result();
		if ( $this->input->post('confirm') != $query[0]->pwd )
			return false;		
		
		$data = array(
          'hiwi_id' 		=> $this->input->post('id'),
          'date' 			=> $this->input->post('date'),
          'duration' 		=> $this->input->post('duration'),
          'description' 	=> $this->input->post('description')
        );
		$insert = $this->db->insert('work', $data);
		return $insert;			
	}

	public function get_work($id, $from = false, $to = false) {
		if( $id == '' )
			return false;
		
		if( !$from )
			$from = date('Y').'-'.date('m').'-01';
		if( !$to )
			$to = date('Y').'-'.date('m').'-31';		
		$this->db->where('hiwi_id', $id);
		$this->db->where('date >=', $from);
		$this->db->where('date <=', $to);
		$query = $this->db->get('work')->result();
		return $query;		
	}

	public function get_current_contract($id) {
		if( $id == '' )
			return false;
		
		$this->db->where('hiwi_id', $id);
		$this->db->where('is_latest', true);
		$contract = $this->db->get('contract')->result();
		return $contract[0];
	}

	public function get_hours($id, $duration = 'overall') {
		if( $duration == 'current' ) {			
			$this->db->where('hiwi_id', $id);
			$this->db->like('date', '-'.date('m').'-'); 	// cheating...
			$this->db->select_sum('duration'); 
			$query = $this->db->get('work')->result();
			$data['minutes_this_month'] = (float) $query[0]->duration;
			
			$this->db->where('hiwi_id', $id);
			$this->db->where('start <', date('Y-m-d'));
			$this->db->where('end >', date('Y-m-d'));
			$query = $this->db->get('contract')->result();
			$data['monthly_minutes'] = 0;
			if ( $query )
				$data['monthly_minutes'] = (float)($query[0]->hours * 60);
			return $data;
		}
		if ( $duration == 'overall' ) {
			$this->db->where('hiwi_id', $id);
			$contracts = $this->db->get('contract')->result();
			$data['sum_hours'] = 0;			
			foreach ($contracts as $contract) {
				$d1 = new DateTime($contract->start);
				$d2 = new DateTime($contract->end);
				$data['sum_hours'] += ($contract->hours * $d1->diff($d2)->y)*12*60;
				$data['sum_hours'] += ($contract->hours * $d1->diff($d2)->m)*60;
			}
			
			$this->db->where('hiwi_id', $id);
			$this->db->select_sum('duration'); 
			$query = $this->db->get('work')->result();
			$data['worked_overall'] = (float) $query[0]->duration;
			return $data;			
		}
		return false;
	}

}

/* End of file hiwi.php */
/* Location: ./application/models/hiwi.php */
	