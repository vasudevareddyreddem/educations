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
	$this->db->select('route_numbers.route_no,route_numbers.r_id')->from('vehicle_details');
		 $this->db->join('route_numbers', 'route_numbers.r_id = vehicle_details.route_number ', 'left');
		 $this->db->where('vehicle_details.s_id',$s_id);
		 return $this->db->get()->result_array();
	}
	public function routes_stops($route_number){
		$this->db->select('route_stops.stop_name,vehicle_stops.multiple_stops')->from('vehicle_details');
		 $this->db->join('vehicle_stops', 'vehicle_stops.v_id = vehicle_details.v_id ', 'left');
		 $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops ', 'left');
		 
		$this->db->where('vehicle_details.route_number',$route_number);
		$this->db->where('vehicle_details.status',1);
		return $this->db->get()->result_array();
	} 
	 
	 public function get_transport_free_list_data($s_id){
	$this->db->select('transport_fee.f_id,route_numbers.route_no,route_stops.stop_name,transport_fee.frequency,transport_fee.amount,transport_fee.status,transport_fee.created_at')->from('transport_fee');
	$this->db->join('route_numbers', 'route_numbers.r_id = transport_fee.route_id ', 'left');
	$this->db->join('route_stops', 'route_stops.stop_id = transport_fee.stops ', 'left');
	$this->db->where('transport_fee.s_id',$s_id);
	$this->db->where('transport_fee.status!=',2);
    return $this->db->get()->result_array(); 
	 }
	 
	 public  function update_transactional_fee__details($f_id,$data){
		 $this->db->where('f_id',$f_id);
		 return $this->db->update('transport_fee',$data);
		 
	 }
	 
	 public  function get_transportaion_details($f_id){
		 $this->db->select('*')->from('transport_fee');
		 $this->db->where('transport_fee.f_id',$f_id);
		 return $this->db->get()->row_array();
		 
	 }
	 
	 
	 public  function check_transfprtaion_exits($route_id,$stops,$frequency,$amount){
		 $this->db->select('*')->from('transport_fee');
		 $this->db->where('transport_fee.route_id',$route_id);
		 $this->db->where('transport_fee.stops',$stops);
		 $this->db->where('transport_fee.frequency',$frequency);
		 $this->db->where('transport_fee.amount',$amount);
		 return $this->db->get()->row_array();
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

	
	/* transportaion registration */
	public  function get_routes_number($s_id){
		 $this->db->select('r_id,route_no')->from('route_numbers');
		 $this->db->where('s_id',$s_id);
		 $this->db->where('status',1);
		 return $this->db->get()->result_array(); 
	}
	/* transportaion registration */
    public function vehical_wise_stops_list($r_id){
     $this->db->select('route_stops.stop_id,route_stops.stop_name')->from('route_stops');
		$this->db->where('route_stops.r_id',$r_id);
		return $this->db->get()->result_array();
	}	
	public function vehical_stops_list_pickup_point($v_id){
	$this->db->select('route_stops.stop_name,vehicle_stops.v_s_id,vehicle_stops.multiple_stops')->from('vehicle_stops');
	 $this->db->join('route_stops', 'route_stops.stop_id = vehicle_stops.multiple_stops ', 'left');
	$this->db->where('vehicle_stops.v_id',$v_id);
	$this->db->where('vehicle_stops.s_status !=',2);
	 return $this->db->get()->result_array(); 
	 }
	
	public function vechical_number_list($s_id){
	  $this->db->select('vehicle_stops.v_s_id,vehicle_stops.multiple_stops')->from('vehicle_details');
		$this->db->where('vehicle_details.s_id',$s_id);
		return $this->db->get()->result_array();
	}
	
	
 public function save_student_transport_data($data){
	$this->db->insert('student_transport',$data);
		return $this->db->insert_id();	
	}
	 
   public function student_transport_registration($s_id){
	 $this->db->select('route_numbers.route_no,route_stops.stop_name,class_list.name,section,users.name as username,vehicle_details.registration_no,alias_route_stops.stop_name as l_stop,student_transport.s_t_id,student_transport.distance,student_transport.amount,student_transport.status,student_transport.created_at')->from('student_transport');
	 $this->db->join('route_numbers', 'route_numbers.r_id = student_transport.route ', 'left');
	$this->db->join('route_stops', 'route_stops.stop_id = student_transport.stop', 'left');
	 $this->db->join('class_list', 'class_list.id = student_transport.class_id', 'left');
	 $this->db->join('users', 'users.u_id = student_transport.student_id', 'left');
	 $this->db->join('vehicle_details', 'vehicle_details.v_id = student_transport.vechical_number', 'left');
	 $this->db->join('vehicle_stops', 'vehicle_stops.v_s_id = student_transport.pickup_point', 'left');
	 $this->db->join('route_stops as alias_route_stops ', 'alias_route_stops.stop_id = vehicle_stops.multiple_stops', 'left');
	$this->db->where('student_transport.s_id',$s_id);
	return $this->db->get()->result_array(); 
	}
	public function edit_student_transport_registration($s_id,$s_t_id){
		$this->db->select('*')->from('student_transport');
		$this->db->where('s_id',$s_id);
		$this->db->where('s_t_id',$s_t_id);
		return $this->db->get()->row_array();	
	}
	public function update_student_transport_data($s_t_id,$data){
		 $this->db->where('s_t_id',$s_t_id);
		 return $this->db->update('student_transport',$data); 
	 }
	public function status_student_transport_registration_details($s_t_id,$data){
		 $this->db->where('s_t_id',$s_t_id);
		 return $this->db->update('student_transport',$data); 
	 }
	public function deleted_student_transport_registration_details($s_t_id){
		$this->db->where('s_t_id',$s_t_id);
		return $this->db->delete('student_transport');
	}
	public  function get_active_vehical_list($stop_id,$s_id){
		$this->db->select('vehicle_details.v_id,vehicle_details.registration_no')->from('vehicle_stops');
		$this->db->join('vehicle_details', 'vehicle_details.v_id = vehicle_stops.v_id', 'left');
		$this->db->where('vehicle_stops.s_id',$s_id);
		$this->db->where('vehicle_stops.multiple_stops',$stop_id);
		$this->db->group_by('vehicle_stops.v_id');
		return $this->db->get()->result_array();
	}
	public  function get_vechical_number_details_list($stop_id){
		$this->db->select('vehicle_details.v_id,vehicle_details.registration_no')->from('vehicle_stops');
		$this->db->join('vehicle_details', 'vehicle_details.v_id = vehicle_stops.v_id', 'left');
		$this->db->where('vehicle_stops.multiple_stops',$stop_id);
		$this->db->group_by('vehicle_stops.v_id');
		return $this->db->get()->result_array();
	}
	
	public function route_count_data($s_id){
		$this->db->select('count(route_numbers.r_id) as route')->from('route_numbers');
		$this->db->where('route_numbers.s_id',$s_id);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	} 
	public function stop_count_data($s_id){
		$this->db->select('count(route_stops.stop_id) as stop')->from('route_stops');
		$this->db->where('route_stops.s_id',$s_id);
		$this->db->where('s_status',1);
		return $this->db->get()->row_array();
	} 	 
    public function student_count_data($s_id){
		$this->db->select('*')->from('student_transport');
		$this->db->where('student_transport.s_id',$s_id);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}
	 
	 
}
	
	
	
	
	
	
	
	