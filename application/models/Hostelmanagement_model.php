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
		$this->db->select('*')->from('hostel_details');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();
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
		$this->db->where('status',1);
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
	
	public  function hostel_room_status_details_data($r_id,$data){
		$this->db->where('h_r_id',$r_id);
		return $this->db->update('hostel_rooms',$data);
		
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
	
	
 }
	
	
	
	
	
	
	
	