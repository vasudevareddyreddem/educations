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
		$this->db->where('hostel_details.status',1);
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
	public function hostel_type_details_list_show($s_id){
	$this->db->select('hostel_types.h_t_id,hostel_types.hostel_type')->from('hostel_types');
	$this->db->where('s_id',$s_id);
	return $this->db->get()->result_array();
	}
	
	
	
 }
	
	
	
	
	
	
	
	