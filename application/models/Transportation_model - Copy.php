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
	/*  vechical_details  */
	public function insert_vehicle_details_list($data){
	$this->db->insert('vehicle_details',$data);
		return $this->db->insert_id();	
	}
	
	public function get_route_details($s_id){
	 $this->db->select('route_numbers.r_id,route_numbers.route_no')->from('route_numbers');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();
	}
	public function routes_wise_list($r_id){
	$this->db->select('route_numbers.route_no,route_numbers.r_id')->from('route_numbers');
		 $this->db->where('r_id',$r_id);
		 $this->db->where('status',1);
		 return $this->db->get()->result_array();
		 
	 }
	public function get_stop_details($r_id){
	$this->db->select('route_stops.stop_name,route_stops.r_id')->from('route_stops');
		 $this->db->where('r_id',$r_id);
		 $this->db->where('s_status',1);
		 return $this->db->get()->result_array(); 
	 }
	public function get_vechical_details($s_id){
	$this->db->select('route_numbers.route_no,route_stops.stop_name,vehicle_details.registration_no,vehicle_details.driver_name,vehicle_details.driver_no')->from('vehicle_details');
		 $this->db->join('route_numbers', 'route_numbers.r_id = vehicle_details.route_number ', 'left');
		 $this->db->join('route_stops', 'route_stops.stop_name = vehicle_details.multiple_stops', 'left');
		 $this->db->where('vehicle_details.s_id',$s_id);
		 return $this->db->get()->result_array();
	}
	 public function get_sources_details($s_id){
	  $this->db->select('s_id,r_id')->from('route_numbers');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();
	}
	
 }
	
	
	
	
	
	
