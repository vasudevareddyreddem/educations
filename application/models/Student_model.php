<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_student($data){
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}
	public function update_admission_number($id,$data){
	$this->db->where('u_id', $id);
		return $this->db->update('users', $data);
	}
	public  function get_student_list($u_id){
		$this->db->select('users.u_id,users.name,users.email,users.gender,users.doj,users.mobile,users.address,users.current_city,users.current_state,users.current_country,users.current_pincode,users.roll_number,users.parent_name,users.status,users.create_at,users.fee_amount,users.fee_terms,users.pay_amount,CONCAT(class_list.name,"-", class_list.section) as class_name')->from('users');
		$this->db->join('class_list ', 'class_list.id = users.class_name', 'left');
		$this->db->where('users.s_id',$u_id);
		$this->db->where('role_id',7);
		$this->db->order_by('users.u_id',"DESC");
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$pay_amt=$this->get_student_data($list['u_id']);
			$data[$list['u_id']]= $list;
			$data[$list['u_id']]['pay_amt']=isset($pay_amt['0']['total_pay'])?$pay_amt['0']['total_pay']:'';
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public  function get_student_data($id){
		$this->db->select('SUM(student_fee.pay_amount) as total_pay')->from('student_fee');
		$this->db->where('s_id',$id);
		return $this->db->get()->result_array();
	}
	
	
	
	public  function get_student_wise_list($u_id){
		$this->db->select('users.u_id,users.s_id,users.name,users.email,users.gender,users.doj,users.mobile,users.address,users.current_city,users.current_state,users.current_country,users.current_pincode,users.roll_number,users.parent_name,users.status,users.create_at,users.fee_amount,users.fee_terms,users.pay_amount,CONCAT(class_list.name,"-", class_list.section) as class_name')->from('users');
		$this->db->join('class_list ', 'class_list.id = users.class_name', 'left');
		$this->db->where('users.u_id',$u_id);
		$this->db->where('role_id',7);
		$this->db->order_by('users.u_id',"DESC");
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$pay_amt=$this->get_student_wise_data($list['u_id']);
			$data[$list['u_id']]= $list;
			$data[$list['u_id']]['pay_amt']=isset($pay_amt['0']['total_pay'])?$pay_amt['0']['total_pay']:'';
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public  function get_student_wise_data($id){
		$this->db->select('SUM(student_fee.pay_amount) as total_pay')->from('student_fee');
		$this->db->where('s_id',$id);
		return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	public  function delete_student($u_id){
		
		$this->db->where('u_id',$u_id);
		return $this->db->delete('users');
	}
	
	function get_student_details($u_id){
		$this->db->select('schools.scl_bas_name,schools.scl_bas_add1,schools.scl_bas_logo,users.*,class_list.name as classname,class_list.section')->from('users');
		$this->db->join('class_list ', 'class_list.id = users.class_name', 'left');
		$this->db->join('schools ', 'schools.s_id = users.s_id', 'left');
		$this->db->where('users.u_id',$u_id);
		return $this->db->get()->row_array();
	}
	
	function get_resources_details($u_id){
		$this->db->select('u_id,role_id,s_id,name')->from('users');
		$this->db->where('users.u_id',$u_id);
		return $this->db->get()->row_array();
	}
	function get_school_class_list($s_id){
		$this->db->select('class_list.id,class_list.name,class_list.section')->from('class_list');
		$this->db->where('s_id',$s_id);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	
	
	
	/* student  fe  payment purpose*/
	public function save_student_fee_payment($data){
		$this->db->insert('student_fee',$data);
		return $this->db->insert_id();
	}
	public function get_invoice_details($id){
		$this->db->select('p_id,invoice')->from('student_fee');
		$this->db->where('p_id',$id);
		return $this->db->get()->row_array();
	}
	
	public  function get_student_last_payment_details($s_id){
		$this->db->select('*')->from('student_fee');
		$this->db->where('s_id',$s_id);
		return $this->db->get()->result_array();
	}
	
	public  function get_school_details($u_id){
		$this->db->select('users.u_id,users.role_id,users.s_id,name,schools.scl_bas_email,schools.scl_bas_add1,schools.scl_bas_add2,schools.scl_bas_zipcode,schools.scl_bas_city,schools.scl_bas_state,schools.scl_bas_country,schools.scl_bas_logo,schools.scl_bas_name,schools.scl_bas_contact')->from('users');
		$this->db->join('schools ', 'schools.s_id = users.s_id', 'left');
		$this->db->where('users.u_id',$u_id);
		return $this->db->get()->row_array();
	}
	/* student  fe  payment purpose*/
	
	/* tracher login*/
	public  function get_teacher_wise_student_list($u_id){
		$this->db->select('time_slot.*,class_list.name,class_list.section')->from('time_slot');
		$this->db->join('class_list ', 'class_list.id = time_slot.class_id', 'left');
		$this->db->where('time_slot.teacher',$u_id);
		$this->db->where('time_slot.status',1);
		$this->db->group_by('time_slot.class_id');
		return $this->db->get()->result_array();
	}
	
	public  function get_teacher_wise_class_list($u_id){
		$this->db->select('class_list.id as class_id,class_list.name,class_list.section')->from('time_slot');
		$this->db->join('class_list ', 'class_list.id = time_slot.class_id', 'left');
		$this->db->where('time_slot.teacher',$u_id);
		$this->db->where('time_slot.status',1);
		$this->db->group_by('time_slot.class_id');
		return $this->db->get()->result_array();
	}
	
	public  function get_class_wise_student_list($class_id,$teacher_id){
		$this->db->select('time_slot.*,users.address,users.current_city,users.current_state,users.current_country,users.current_pincode,users.u_id,users.name,users.roll_number,users.parent_name,users.mobile,users.email')->from('time_slot');
		$this->db->join('users ', 'users.class_name = time_slot.class_id', 'left');
		$this->db->where('time_slot.teacher',$teacher_id);
		$this->db->where('users.class_name',$class_id);
		$this->db->where('users.role_id',7);
		return $this->db->get()->result_array();
	}
	
	
	/*
	public  function get_class_wise_student_list($class_id,$teacher_id){
		$this->db->select('*')->from('time_slot');
		$this->db->join('users ', 'users.class_name = time_slot.class_id', 'left');
		$this->db->where('time_slot.teacher',$teacher_id);
		$this->db->where('users.class_name',$class_id);
		$this->db->where('users.role_id',7);
		return $this->db->get()->result_array();
	}
	*/
	
	public  function get_teacher_class_subjects($class_id,$teacher_id){
		$this->db->select('class_subjects.id,class_subjects.subject,time_slot.id,time_slot.subject')->from('time_slot');
		$this->db->join('class_subjects ', 'class_subjects.id = time_slot.subject', 'left');
		$this->db->where('time_slot.teacher',$teacher_id);
		$this->db->where('time_slot.class_id',$class_id);
		$this->db->group_by('time_slot.subject');
		return $this->db->get()->result_array();
	}
	public function get_subject_wise_timings($subjects,$teacher_id){
	$this->db->select('time_slot.time,time_slot.id,concat(class_times.form_time,"-	",class_times.to_time) as timings')->from('time_slot');
		$this->db->join('class_times ', 'class_times.id = time_slot.time', 'left');
		$this->db->where('time_slot.teacher',$teacher_id);
		$this->db->where('time_slot.subject',$subjects);
		$this->db->group_by('time_slot.time');
		return $this->db->get()->result_array();
	}
	public function get_classes(){
	$this->db->select('time_slot.class_id,time_slot.id')->from('time_slot');
	$this->db->where('time_slot.status',1);
	$this->db->group_by('time_slot.class_id');
	return $this->db->get()->result_array();
	}
	
	
	public  function get_class_wise_subjectwise_student_list($class_id){
		$this->db->select('users.u_id,users.name,users.roll_number,users.class_name')->from('users');
		$this->db->where('users.class_name',$class_id);
		$this->db->where('users.role_id',7);
	return $this->db->get()->result_array();
	}
	  
	 public function get_student_attendeance_update($class_id,$time){
	   $this->db->select('*')->from('student_attendenc_reports');
		$this->db->where('student_attendenc_reports.class_id',$class_id);
		//$this->db->where('student_attendenc_reports.subject_id',$subjects);
		$this->db->where('student_attendenc_reports.time',$time);
		//$this->db->where('student_attendenc_reports.teacher_id',$teacher);
		return $this->db->get()->result_array();
	}
	  
	  /*
	  
	  foreach($return as $list){
	   $lists=$this->get_student_attendeance_update($list['class_name']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['class_name']]=$list;
	   $data[$list['class_name']]['attendence_list']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	
	public function get_student_attendeance_update($class_name){
	$this->db->select('student_attendenc_reports.*')->from('student_attendenc_reports');
		$this->db->where('student_attendenc_reports.class_id',$class_name);
		return $this->db->get()->result_array();
	}
	*/
	
	public   function get_subject_name($subject_id){
		$this->db->select('class_subjects.id,class_subjects.subject')->from('class_subjects');
		$this->db->where('class_subjects.subject',$subject_id);
		return $this->db->get()->row_array();
	}
	public function get_class_timings($time){
	$this->db->select('class_times.*')->from('class_times');
		$this->db->where('class_times.id',$time);
		return $this->db->get()->row_array();
	}
	public  function save_student_attendance($data){
		$this->db->insert("student_attendenc_reports",$data);
		return $this->db->insert_id();
	}
	
	public  function get_basic_student_details($u_id){
		$this->db->select('users.u_id,users.mobile,users.name,schools.scl_bas_add1,schools.scl_bas_add2,schools.scl_bas_zipcode,schools.scl_bas_city,schools.scl_bas_state,schools.scl_bas_country,schools.scl_bas_name')->from('users');
		$this->db->join('schools ', 'schools.s_id = users.s_id', 'left');
		$this->db->where('users.u_id',$u_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_previous_attendance_reports($student_id,$class_id,$subject_id,$time,$teacher){
		$this->db->select('*')->from('student_attendenc_reports');
		$this->db->where('student_attendenc_reports.student_id',$student_id);
		$this->db->where('student_attendenc_reports.class_id',$class_id);
		$this->db->where('student_attendenc_reports.subject_id',$subject_id);
		$this->db->where('student_attendenc_reports.time',$time);
		$this->db->where('student_attendenc_reports.teacher_id',$teacher);
		return $this->db->get()->row_array();
	}
	public  function update_attendance($id,$data){
		$this->db->where('id',$id);
		return $this->db->update("student_attendenc_reports",$data);
		
	}
	
	public  function get_teacher_wise_time_list($id){
		$this->db->select('class_times.form_time,class_times.to_time')->from('time_slot');
		$this->db->join('class_times ', 'class_times.id = time_slot.time', 'left');
		$this->db->where('time_slot.teacher',$id);
		$this->db->group_by('time_slot.time');
		return $this->db->get()->result_array();
	}
	/* fee list*/
	
         public function class_wise_all_details($class_id){
	 $this->db->select('class_list.name,class_list.section,users.class_name,users.name as username,users.u_id,users.fee_amount,users.pay_amount,users.parent_name,users.mobile')->from('users');
		 $this->db->join('class_list ', 'class_list.id = users.class_name', 'left');
		 $this->db->where('users.class_name',$class_id);
		 $this->db->where('users.role_id',7);
		 $this->db->where('users.status',1);
		 return $this->db->get()->result_array(); 
	 }
	public function class_wise_time_slot_details($class_id){
	$this->db->select('class_times.form_time,class_times.to_time,users.name as teachers,class_list.name,class_list.section,time_slot.*')->from('time_slot');
		 $this->db->join('class_list ', 'class_list.id = time_slot.class_id', 'left');
		 $this->db->join('users ', 'users.u_id = time_slot.teacher', 'left');
		 $this->db->join('class_times ', 'class_times.id = time_slot.time', 'left');
		 $this->db->where('users.role_id',6);
		 $this->db->where('time_slot.class_id',$class_id);
		 $this->db->where('time_slot.status',1);
		 return $this->db->get()->result_array(); 
	 }
	
	/* home work */
	public function save_home_work_details($data){
	$this->db->insert('home_work',$data);
     return $this->db->insert_id();
	}	
	public function get_home_work_list($u_id,$s_id){
	$this->db->select('class_list.name,class_list.section,home_work.*')->from('home_work');
		 $this->db->join('class_list ', 'class_list.id = home_work.class_id', 'left');
		 $this->db->where('home_work.create_by',$u_id);
		 $this->db->where('home_work.s_id',$s_id);
		 $this->db->where('home_work.status!=',2);
		 return $this->db->get()->result_array(); 
	 }	
	public function get_edit_home_work($s_id,$h_w_id){
	$this->db->select('home_work.*')->from('home_work');
		 $this->db->join('class_list ', 'class_list.id = home_work.class_id', 'left');
		 $this->db->where('home_work.h_w_id',$h_w_id);
		 $this->db->where('home_work.s_id',$s_id);
		 return $this->db->get()->row_array(); 
	 }	
	public function upadte_home_work_details($h_w_id,$data){
	$this->db->where('h_w_id',$h_w_id);
	return $this->db->update("home_work",$data);
	}
	public function delete_home_work_details($h_w_id){
	$this->db->where('h_w_id',$h_w_id);
	return $this->db->delete('home_work');
	}
	
	
	
	
	
	

}