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
		$this->db->select('route_numbers.route_no,vehicle_details.v_id,vehicle_details.route_number,vehicle_details.registration_no,vehicle_details.driver_name,vehicle_details.driver_no,vehicle_details.status')->from('vehicle_details');
		   $this->db->join('route_numbers', 'route_numbers.r_id = vehicle_details.route_number', 'left');
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
	
	
	
	public  function get_edit_vechical_details_list($v_id){
		$this->db->select('vehicle_details.v_id,vehicle_details.route_number,vehicle_details.registration_no,vehicle_details.driver_name,vehicle_details.driver_no')->from('vehicle_details');
		$this->db->where('vehicle_details.v_id',$v_id);
		$return=$this->db->get()->row_array();
		$stop_list=$this->get_edit_vechical_stop_list($return['v_id']);
		$data=$return;
		$data['stop_list']=$stop_list;
		if(!empty($data)){
			return $data;
		}
	}	
		
	public  function get_edit_vechical_stop_list($v_id){
		$this->db->select('vehicle_stops.v_s_id,vehicle_stops.multiple_stops,vehicle_stops.s_status,vehicle_stops.created_at,route_stops.stop_name')->from('vehicle_stops');
		$this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops', 'left');

		$this->db->where('vehicle_stops.v_id',$v_id);
		$this->db->where('vehicle_stops.s_status!=',2);
		return $this->db->get()->result_array();
	} 
		
		
		public function edit_details($s_id){
		$this->db->select('vehicle_details.s_id,vehicle_details.v_id')->from('vehicle_details');
		$this->db->where('vehicle_details.s_id',$s_id);
		return $this->db->get()->result_array();
	} 
		
	
	public  function get_route_stop_lists($r_id){
		$this->db->select('stop_id,stop_name')->from('route_stops');
		$this->db->where('route_stops.r_id',$r_id);
		return $this->db->get()->result_array();
	}
	public function update_vechil_route_value($v_id,$data){
	$this->db->where('v_id',$v_id);
     return $this->db->update('vehicle_details',$data);	
	}
	public function update_vechil_stops_value($v_s_id,$data){
	$this->db->where('v_s_id',$v_s_id);
     return $this->db->update('vehicle_stops',$data);	
	}
	
    public function status_data($v_id,$data){
	$this->db->where('v_id',$v_id);
     return $this->db->update('vehicle_details',$data);
		
	}
	public function status_data_stops($v_id,$data){
	$this->db->where('v_id',$v_id);
     return $this->db->update('vehicle_stops',$data);
		
	}
	public function delete_vechical_details_data($v_id){
	$this->db->where('v_id',$v_id);
	return $this->db->delete('vehicle_details');
	}
	
	public function delete_vechical_details_stops($v_id){
	$this->db->where('v_id',$v_id);
	return $this->db->delete('vehicle_stops');
	}
	
	public  function stops_list_data($s_id){
		$this->db->select('vehicle_stops.v_id,vehicle_stops.v_s_id,vehicle_stops.multiple_stops')->from('vehicle_stops');
		$this->db->where('vehicle_stops.s_id',$s_id);
		return $this->db->get()->result_array();
	}
	
	public function stops_list_data_update($v_id){
	$this->db->select('vehicle_stops.v_s_id,vehicle_stops.multiple_stops')->from('vehicle_stops');
		$this->db->where('vehicle_stops.v_id',$v_id);
		$this->db->where('vehicle_stops.s_status !=',2);
		return $this->db->get()->result_array();
	}
	public function update_query($v_s_id,$data){
		$this->db->where('v_s_id',$v_s_id);
		return $this->db->update('vehicle_stops',$data);
	}
	public function vehical_update_query($multiple_stops,$v_id,$data){
		$this->db->where('v_id',$v_id);
		$this->db->where('multiple_stops',$multiple_stops);
		return $this->db->update('vehicle_stops',$data);
	}
	
	public function insert_query_stops($data){
	$this->db->insert('vehicle_stops',$data);
		return $this->db->insert_id();
		
	}
	
	public  function get_vehicla_stop_id($v_id,$s_id){
		$this->db->select('v_s_id')->from('vehicle_stops');
		$this->db->where('v_id',$v_id);
		$this->db->where('multiple_stops',$s_id);
		return $this->db->get()->row_array();
	}
	/* transport free*/
	public function save_transport_data($data){
	$this->db->insert('transport_fee',$data);
		return $this->db->insert_id();
	}
	
	public function get_vechical_list_card($s_id){
	$this->db->select('vehicle_details.v_id,vehicle_details.s_id')->from('vehicle_details');
	$this->db->where('vehicle_details.s_id',$s_id);
	return $this->db->get()->result_array();
	}

	public function get_route_details_card($s_id){
	$this->db->select('route_numbers.route_no,vehicle_details.v_id')->from('vehicle_details');
		 $this->db->join('route_numbers', 'route_numbers.r_id = vehicle_details.route_number ', 'left');
		 $this->db->where('vehicle_details.s_id',$s_id);
		 return $this->db->get()->result_array();
	}
	public function routes_stops($v_id){
	$this->db->select('route_stops.stop_name,vehicle_stops.v_s_id,vehicle_stops.multiple_stops')->from('vehicle_stops');
	 $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops ', 'left');
	$this->db->where('v_id',$v_id);
	$this->db->where('vehicle_stops.s_status !=',2);
	 return $this->db->get()->result_array(); 
	 }
	 public function get_transport_free_list_data($s_id){
	$this->db->select('route_numbers.route_no,route_stops.stop_name,transport_fee.frequency,transport_fee.amount')->from('transport_fee');
	$this->db->join('route_numbers', 'route_numbers.r_id = transport_fee.route_id ', 'left');
	$this->db->join('route_stops', 'route_stops.stop_id = transport_fee.stops ', 'left');
	$this->db->where('transport_fee.s_id',$s_id);
    return $this->db->get()->result_array(); 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 /* Student Transport Registration  */
	public function class_wise_student_list($class_id){
	 $this->db->select('users.class_name,users.name,users.u_id')->from('users');
		 $this->db->where('class_name',$class_id);
		 $this->db->where('role_id',7);
		 $this->db->where('status',1);
		 return $this->db->get()->result_array(); 
	 }
	public function get_vechical_number_list($s_id){
	$this->db->select('vehicle_details.v_id,vehicle_details.registration_no')->from('vehicle_details');
		$this->db->where('vehicle_details.s_id',$s_id);
		return $this->db->get()->result_array();
	}	
	 
	 
	 
	
}
	
	
	
	
	
	
	
	