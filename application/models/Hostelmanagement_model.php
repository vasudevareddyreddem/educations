<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hostelmanagement_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_hostel_details($data){
		$this->db->insert('hostel_details',$data);
		return $this->db->insert_id();
	}
	public function hostel_details_list($s_id){
		$this->db->select('hostel_types.hostel_type as username,hostel_details.id,hostel_details.hostel_name,hostel_details.warden_name,hostel_details.contact_number,hostel_details.address,hostel_details.facilities,hostel_details.status,hostel_details.create_at,hostel_details.updated_at,hostel_details.create_by')->from('hostel_details');
		 $this->db->join('hostel_types', 'hostel_types.h_t_id = hostel_details.hostel_type', 'left');
		$this->db->where('hostel_details.s_id',$s_id);
		$this->db->where('hostel_details.status!=',2);
		return $this->db->get()->result_array();
	}
	public function hostel_type_details_list_data($s_id){
	$this->db->select('hostel_types.h_t_id,hostel_types.hostel_type')->from('hostel_types');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();	
	}
	
	
	public function hostel_type_list_view_data($s_id){
	    $this->db->select('hostel_types.h_t_id,hostel_types.hostel_type')->from('hostel_types');
		$this->db->where('hostel_types.s_id',$s_id);
		return $this->db->get()->row_array();			
	}
	
	public function edit_hostel_details_list($s_id,$id){
	    $this->db->select('*')->from('hostel_details');
		$this->db->where('s_id',$s_id);
		$this->db->where('id',$id);
		return $this->db->get()->row_array();	
	}
	public function update_hostel_details($id,$data){
	$this->db->where('id',$id);
    return $this->db->update('hostel_details',$data);	
	}
	public  function update_hostel_details_satus($id,$data){
		$this->db->where('id',$id);
		$this->db->where('hostel_details.status',1);
		return $this->db->update('hostel_details',$data);
		}
	public function delete_hostel_details_data($id){
	$this->db->where('id',$id);
    return $this->db->delete('hostel_details');
	}
	public function hostel_type_list($s_id){
	    $this->db->select('hostel_details.id,hostel_details.hostel_type,hostel_details.hostel_name')->from('hostel_details');
		$this->db->where('s_id',$s_id);
		$this->db->where('status',1);
		return $this->db->get()->result_array();			
	}
	public function save_room_details($data){
	$this->db->insert('hostel_rooms',$data);
	return $this->db->insert_id();	
	}
	public function get_hostel_floors_list($s_id){
	    $this->db->select('hostel_floors.f_id,hostel_floors.floor_name')->from('hostel_floors');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();			
	}
	public function save_hostel_type_details($data){
	$this->db->insert('hostel_types',$data);
	return $this->db->insert_id();
	}
	public function get_hostel_type_list_details($s_id){
	$this->db->select('*')->from('hostel_types');
    $this->db->where('s_id',$s_id);
	return $this->db->get()->result_array();
	}
	public function edit_hostel_type_details_list($s_id,$h_t_id){
	 $this->db->select('*')->from('hostel_types');
		$this->db->where('s_id',$s_id);
		$this->db->where('h_t_id',$h_t_id);
		return $this->db->get()->row_array();		
	}
	public function update_hostel_type_details($h_t_id,$data){
	$this->db->where('h_t_id',$h_t_id);
    return $this->db->update('hostel_types',$data);	
	}
	public function delete_hostel_type_details_data($h_t_id){
	$this->db->where('h_t_id',$h_t_id);
    return $this->db->delete('hostel_types');
	}
	public function save_hostel_floor_details($data){
	$this->db->insert('hostel_floors',$data);
	return $this->db->insert_id();
	}
	public function get_hostel_floors_list_details($s_id){
	$this->db->select('*')->from('hostel_floors');
	$this->db->where('s_id',$s_id);
	return $this->db->get()->result_array();
	}
	public function edit_hostel_floors_details_list($s_id,$f_id){
	$this->db->select('*')->from('hostel_floors');
		$this->db->where('s_id',$s_id);
		$this->db->where('f_id',$f_id);
		return $this->db->get()->row_array();	
	}
	public function update_hostel_floors_details($f_id,$data){
	$this->db->where('f_id',$f_id);
    return $this->db->update('hostel_floors',$data);	
	}
	public function delete_hostel_floors_details_data($f_id){
	$this->db->where('f_id',$f_id);
    return $this->db->delete('hostel_floors');
	}
		
	public  function hostel_room_update_details_data($h_r_id,$data){
		$this->db->where('h_r_id',$h_r_id);
		return $this->db->update('hostel_rooms',$data);
		
	}
	public function status_room_details_data($h_r_id,$data){
	$this->db->where('h_r_id',$h_r_id);
	return $this->db->update('hostel_rooms',$data);
	}
	public function hostel_room_deleted_details_data($h_r_id){
	$this->db->where('h_r_id',$h_r_id);
    return $this->db->delete('hostel_rooms');
	}
	
	public function get_room_details($h_r_id){
		$this->db->select('*')->from('hostel_rooms');
		$this->db->where('h_r_id',$h_r_id);
		return $this->db->get()->row_array();
	}
	public  function check_room_Details_exsists($room_name,$total_beds,$floor_number){
		$this->db->select('h_r_id')->from('hostel_rooms');
		$this->db->where('room_name',$room_name);
		$this->db->where('total_beds',$total_beds);
		$this->db->where('floor_id',$floor_number);
		return $this->db->get()->row_array();
	}
	public function hostel_type_details_list_show($s_id){
	$this->db->select('hostel_types.h_t_id,hostel_types.hostel_type')->from('hostel_types');
	$this->db->where('hostel_types.s_id',$s_id);
	return $this->db->get()->result_array();
	}
		public  function get_hostel_rooms_list($s_id){
		$this->db->select('hostel_rooms.h_r_id,hostel_rooms.room_name,hostel_rooms.created_at,hostel_rooms.status,hostel_rooms.total_beds,hostel_floors.floor_name,hostel_details.hostel_name')->from('hostel_rooms');
		$this->db->join('hostel_floors', 'hostel_floors.f_id = hostel_rooms.floor_id', 'left');
		$this->db->join('hostel_details', 'hostel_details.id = hostel_rooms.hotel_type', 'left');
		$this->db->where('hostel_rooms.s_id',$s_id);
		$this->db->where('hostel_rooms.status !=',2);
		return $this->db->get()->result_array();
		}
		
		public  function get_room_number_list($s_id){
			$this->db->select('hostel_rooms.h_r_id,hostel_rooms.room_name')->from('hostel_rooms');
			$this->db->join('hostel_floors', 'hostel_floors.f_id = hostel_rooms.floor_id', 'left');
			$this->db->join('hostel_details', 'hostel_details.id = hostel_rooms.hotel_type', 'left');
			$this->db->where('hostel_rooms.s_id',$s_id);
			$this->db->where('hostel_rooms.status ',1);
			return $this->db->get()->result_array();
		}
		public function get_hostel_floor_list($s_id){
			$this->db->select('hostel_floors.f_id,hostel_floors.floor_name')->from('hostel_rooms');
			$this->db->join('hostel_floors', 'hostel_floors.f_id = hostel_rooms.floor_id', 'left');
			$this->db->where('hostel_rooms.s_id',$s_id);
			$this->db->where('hostel_rooms.status ',1);
			return $this->db->get()->result_array();
		}
		public  function get_floor_wise_room_number_list($floor_number){
			$this->db->select('hostel_rooms.h_r_id,hostel_rooms.room_name')->from('hostel_rooms');
			$this->db->where('hostel_rooms.floor_id',$floor_number);
			$this->db->where('hostel_rooms.status ',1);
			return $this->db->get()->result_array();
		}
		
		public  function save_allocateroom_data_details($data){
			$this->db->insert('allocateroom',$data);
			return $this->db->insert_id();
		}
		
		public  function check_allocateroom_data_exsists($student_name,$email,$g_contact_number,$allot_bed,$floor_name,$room_numebr){
			$this->db->select('allocateroom.a_r_id')->from('allocateroom');
			$this->db->where('allocateroom.student_name',$student_name);
			$this->db->where('allocateroom.email',$email);
			$this->db->where('allocateroom.g_contact_number',$g_contact_number);
			$this->db->where('allocateroom.allot_bed',$allot_bed);
			$this->db->where('allocateroom.floor_name',$floor_name);
			$this->db->where('allocateroom.room_numebr',$room_numebr);
			$this->db->where('allocateroom.status ',1);
			return $this->db->get()->result_array();
		}
		public  function get_allocaterrom_list($s_id){
			$this->db->select('allocateroom.a_r_id,allocateroom.student_name,allocateroom.allot_bed,allocateroom.gender,allocateroom.charge_per_month,allocateroom.contact_number,allocateroom.guardian_name,allocateroom.g_contact_number,allocateroom.relation,allocateroom.email,allocateroom.status,hostel_rooms.room_name,hostel_floors.floor_name,hostel_details.hostel_name')->from('allocateroom');
			$this->db->join('hostel_rooms', 'hostel_rooms.h_r_id = allocateroom.room_numebr', 'left');
			$this->db->join('hostel_floors', 'hostel_floors.f_id = allocateroom.floor_name', 'left');
			$this->db->join('hostel_details', 'hostel_details.id = allocateroom.hostel_type', 'left');
			$this->db->where('allocateroom.status !=',2);
			$this->db->where('allocateroom.s_id',$s_id);
			return $this->db->get()->result_array();
		}
		
		public  function update_allocateroom_details($a_r_id,$data){
		$this->db->where('a_r_id',$a_r_id);
		return $this->db->update('allocateroom',$data);
		}
		
		public  function get_allocaterrom_details_list($a_r_id){
			$this->db->select('*')->from('allocateroom');
			$this->db->where('allocateroom.a_r_id',$a_r_id);
			return $this->db->get()->row_array();
		}
	
	public function delete_allocateroom_details($a_r_id){
	$this->db->where('a_r_id',$a_r_id);
    return $this->db->delete('allocateroom');
	}
	
	
	
	
	
 }
	
	
	
	
	
	
	
	