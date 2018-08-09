<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transportation_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_route($data){
		$this->db->insert('route_numbers',$data);
		return $this->db->insert_id();
		
	}
	public function save_route_stops($data){
		$this->db->insert('route_stops',$data);
		return $this->db->insert_id();
	}
	public  function get_routes_list($s_id,$u_id){
		
		$this->db->select('r_id,route_no,status,created_at')->from('route_numbers');
		$this->db->where('route_numbers.s_id',$s_id);
		$this->db->where('route_numbers.created_by',$u_id);
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$stop_list=$this->get_route_stop_list($list['r_id']);
			$data[$list['r_id']]=$list;
			$data[$list['r_id']]['stop_list']=$stop_list;
			
		}
		if(!empty($data)){
			return $data;
		}
		
	}
	public  function get_route_stop_list($r_id){
		$this->db->select('stop_id,stop_name,s_status,created_at')->from('route_stops');
		$this->db->where('route_stops.r_id',$r_id);
		$this->db->where('route_stops.s_status!=',2);
		return $this->db->get()->result_array();
	} 
	
	public  function get_routes_details($r_id){
		$this->db->select('r_id,route_no,status,created_at')->from('route_numbers');
		$this->db->where('route_numbers.r_id',$r_id);
		$return=$this->db->get()->row_array();
		$stop_list=$this->get_route_stop_list($return['r_id']);
		$data[$return['r_id']]=$return;
		$data[$return['r_id']]['stop_list']=$stop_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_basic_routes_details($r_id){
		$this->db->select('r_id,route_no,status,created_at')->from('route_numbers');
		$this->db->where('route_numbers.r_id',$r_id);
		return $this->db->get()->row_array();
		
	}
	public function update_route($r_id,$data){
		$this->db->where('r_id',$r_id);
       return $this->db->update('route_numbers',$data);
	}
	public function update_route_stops($stop_id,$data){
		$this->db->where('stop_id',$stop_id);
            return $this->db->update('route_stops',$data);

	}
	public  function get_stop_list($r_id){
		$this->db->select('r_id,stop_id')->from('route_stops');
		$this->db->where('route_stops.r_id',$r_id);
		return $this->db->get()->result_array();
	}
	public function routes_wise_stop_list($r_id){
	$this->db->select('stop_id,stop_name')->from('route_stops');
		 $this->db->where('r_id',$r_id);
		 $this->db->where('s_status',1);
		 return $this->db->get()->result_array();
		 
	 }
	public function get_route_details($s_id){
	 $this->db->select('route_numbers.r_id,route_numbers.route_no')->from('route_numbers');
		$this->db->where('s_id',$s_id);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	
	public function status_details_data($r_id,$data){
	$this->db->where('r_id',$r_id);
     return $this->db->update('route_numbers',$data);
		
	}
	public function status_route_stops($r_id,$data){
	$this->db->where('r_id',$r_id);
     return $this->db->update('route_stops',$data);	
	}
	public function delete_details_data($r_id){
		$this->db->where('r_id',$r_id);
		return $this->db->delete('route_numbers');
	}
	public function delete_route_stops($r_id){
		$this->db->where('r_id',$r_id);
		return $this->db->delete('route_stops');
	}
	
	
	public function save_vechil($data){
		$this->db->insert('vehicle_details',$data);
		return $this->db->insert_id();
		
	}
	public function save_vechil_stops($data){	
	$this->db->insert('vehicle_stops',$data);
		return $this->db->insert_id();
	}
	
	public  function get_vechical_details($s_id,$u_id){
		
		$this->db->select('v_id,route_number,registration_no,driver_name,driver_no,status,created_at')->from('vehicle_details');
		$this->db->where('vehicle_details.s_id',$s_id);
		$this->db->where('vehicle_details.created_by',$u_id);
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$stop_list=$this->get_vechical_stop_list($list['v_id']);
			$data[$list['v_id']]=$list;
			$data[$list['v_id']]['stop_list']=$stop_list;
			
		}
		if(!empty($data)){
			return $data;
		}
		
	}
	public  function get_vechical_stop_list($v_id){
		$this->db->select('route_stops.stop_name,vehicle_stops.v_s_id,vehicle_stops.multiple_stops,vehicle_stops.s_status,vehicle_stops.created_at')->from('vehicle_stops');
		 $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops ', 'left');
		$this->db->where('vehicle_stops.v_id',$v_id);
		$this->db->where('vehicle_stops.s_status!=',2);
		return $this->db->get()->result_array();
	} 
	
	public function vechical_route_list($s_id){
			$this->db->select('route_numbers.route_no,vehicle_details.registration_no,vehicle_details.driver_name,vehicle_details.driver_no,vehicle_details.status,vehicle_details.created_at')->from('vehicle_details');
		 $this->db->join('route_numbers', 'route_numbers.r_id = vehicle_details.route_number ', 'left');
		 $this->db->where('vehicle_details.s_id',$s_id);
		 return $this->db->get()->result_array();
	}
	public function get_vechical_stops($s_id){
	$this->db->select('route_stops.stop_name,vehicle_stops.s_status,vehicle_stops.created_at,')->from('vehicle_stops');
   $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops', 'left');
   $this->db->where('vehicle_stops.s_id',$s_id);
   return $this->db->get()->result_array();
		
	}
	public function edit_details_data($v_id){
		$this->db->select('v_id,route_number,registration_no,driver_name,driver_no,status,created_at')->from('vehicle_details');
		$this->db->where('vehicle_details.v_id',$v_id);
		$return=$this->db->get()->row_array();
		$stop_list=$this->get_vichile_stop_list($return['v_id']);
		$data[$return['v_id']]=$return;
		$data[$return['v_id']]['stop_list']=$stop_list;
		if(!empty($data)){
			return $data;
		}
	}
	public function get_vichile_stop_list($v_id){
		$this->db->select('route_stops.stop_name,v_s_id,multiple_stops,s_status,created_at')->from('vehicle_stops');
		 $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops', 'left');
		$this->db->where('vehicle_stops.v_id',$v_id);
		return $this->db->get()->result_array();
	} 	
		
		public function edit_details($s_id){
		$this->db->select('vehicle_details.s_id,vehicle_details.v_id')->from('vehicle_details');
		$this->db->where('vehicle_details.s_id',$s_id);
		return $this->db->get()->result_array();
	} 	
		
	
	
	
	
	
}
	
	
	
	
	
	
	
	