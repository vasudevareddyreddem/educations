<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examination_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_subject_list($s_id){
		$this->db->select('class_subjects.id,class_subjects.subject')->from('class_subjects');
		$this->db->join('schools ', 'schools.s_id = class_subjects.s_id', 'left');
		$this->db->where('class_subjects.s_id',$s_id);
		return $this->db->get()->result_array();
	}
	public  function get_time_list($s_id){
		$this->db->select('class_times.id,class_times.form_time,class_times.to_time')->from('class_times');
		$this->db->where('class_times.s_id',$s_id);
		return $this->db->get()->result_array();
	}
	public  function get_teacher_list_list($s_id){
		$this->db->select('u_id,name')->from('users');
		$this->db->where('users.s_id',$s_id);
		$this->db->where('users.role_id',6);
		$this->db->where('users.status',1);
		return $this->db->get()->result_array();
	}
	
	/* create  exam*/
	public  function save_exam($data){
		$this->db->insert('exam_list',$data);
		return $this->db->insert_id();
	}
	public  function get_exam_time_table_list($s_id){
		$this->db->select('exam_list.*,class_subjects.subject as subname,class_list.name,class_list.section,users.name as teacher_name')->from('exam_list');
		$this->db->join('class_subjects ', 'class_subjects.id = exam_list.subject', 'left');
		$this->db->join('class_list ', 'class_list.id = exam_list.class_id', 'left');
		$this->db->join('users ', 'users.u_id = exam_list.teacher_id', 'left');
		$this->db->where('exam_list.s_id',$s_id);
		//$this->db->where('exam_list.status',1);
		$this->db->order_by('exam_list.id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_exam_time_table_details($id){
		$this->db->select('exam_list.*')->from('exam_list');
		$this->db->where('exam_list.id',$id);
		return $this->db->get()->row_array();
	}
	public  function update_exam_details($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('exam_list',$data);
	}
	public  function check_exam_exits($exam_type,$class_id,$subject,$exam_date,$s_id){
		$this->db->select('exam_list.*')->from('exam_list');
		$this->db->where('exam_type',$exam_type);
		$this->db->where('class_id',$class_id);
		$this->db->where('subject',$subject);
		$this->db->where('exam_date',$exam_date);
		$this->db->where('s_id',$s_id);
		return $this->db->get()->row_array();
	}
	
	public  function delete_exam($id){
		$this->db->where('id',$id);
		return $this->db->delete('exam_list');
	}
	public  function get_exam_subject_list($id){
		$this->db->select('exam_type,id')->from('exam_list');
		$this->db->where('exam_list.s_id',$id);
		return $this->db->get()->result_array();   
	}
	public  function get_student_list($claas_id){
		$this->db->select('u_id,name,roll_number,class_name')->from('users');
		$this->db->where('users.class_name',$claas_id);
		$this->db->where('users.status',1);
		$this->db->where('users.role_id',7);
		return $this->db->get()->result_array(); 
	}
	public  function get_student_name($subject){
		$this->db->select('subject,id')->from('class_subjects');
		$this->db->where('class_subjects.id',$subject);
		$this->db->where('class_subjects.status',1);
		return $this->db->get()->row_array(); 
	}
	public function get_exam_name($type){
		$this->db->select('exam_type,id')->from('exam_list');
		$this->db->where('exam_list.id',$type);
		$this->db->where('exam_list.status',1);
		return $this->db->get()->row_array(); 
	}
		
	public  function save_exam_mark($data){
		$this->db->insert('exam_marks_list',$data);
		return $this->db->insert_id();	
	}
		/*public  function update_exam_mark($data){
			$this->db->insert('exam_marks_list');
			return $this->db->insert_id();
		}*/


	public  function chekck_martks_entered($student_id,$s_id,$exam_id,$subject_id,$class_id){
		$this->db->select('*')->from('exam_marks_list');
		$this->db->where('student_id',$student_id);
		$this->db->where('s_id',$s_id);
		$this->db->where('exam_id',$exam_id);
		$this->db->where('subject_id',$subject_id);
		$this->db->where('class_id',$class_id);
		return $this->db->get()->row_array(); 
	}
	public  function update_exam_mark($id,$data){
		$this->db->where('id',$id);
		return $this->db->update("exam_marks_list",$data);
	}
		
	public  function get_student_withmarks_list($s_id,$class_id,$subject_id,$exam_id,$student_id){
		$this->db->select('users.name,users.roll_number,exam_marks_list.marks_obtained,exam_marks_list.student_id,exam_marks_list.max_marks,exam_marks_list.remarks,class_subjects.subject,exam_list.exam_type')->from('exam_marks_list');
		$this->db->join('users ', 'users.u_id = exam_marks_list.student_id', 'left');
		$this->db->join('class_subjects ', 'class_subjects.id = exam_marks_list.subject_id', 'left');
		$this->db->join('exam_list ', 'exam_list.id = exam_marks_list.exam_id', 'left');
		$this->db->where('exam_marks_list.s_id',$s_id);
		$this->db->where('exam_marks_list.exam_id',$exam_id);
		$this->db->where('exam_marks_list.subject_id',$subject_id);
		$this->db->where('exam_marks_list.class_id',$class_id);
		$this->db->where('exam_marks_list.student_id',$student_id);
		return $this->db->get()->result_array(); 
	}
		
	public  function get_student_withmarks_lists($s_id,$class_id,$exam_id,$student_id){
		$this->db->select('users.name,users.roll_number,exam_marks_list.marks_obtained,exam_marks_list.student_id,exam_marks_list.max_marks,exam_marks_list.remarks,class_subjects.subject,exam_list.exam_type')->from('exam_marks_list');
		$this->db->join('users ', 'users.u_id = exam_marks_list.student_id', 'left');
		$this->db->join('class_subjects ', 'class_subjects.id = exam_marks_list.subject_id', 'left');
		$this->db->join('exam_list ', 'exam_list.id = exam_marks_list.exam_id', 'left');
		$this->db->where('exam_marks_list.s_id',$s_id);
		$this->db->where('exam_marks_list.exam_id',$exam_id);
		//$this->db->where('exam_marks_list.subject_id',$subject_id);
		$this->db->where('exam_marks_list.class_id',$class_id);
		$this->db->where('exam_marks_list.student_id',$student_id);
		return $this->db->get()->result_array(); 
	}
		
		
		
	public  function get_exam_subject_wise_list($id){
		$this->db->select('exam_marks_list.id,exam_marks_list.exam_id,exam_list.exam_type')->from('exam_marks_list');
		$this->db->join('exam_list ', 'exam_list.id = exam_marks_list.exam_id', 'left');
		$this->db->where('exam_marks_list.s_id',$id);
		$this->db->group_by('exam_marks_list.exam_id',$id);
		return $this->db->get()->result_array();   
	}
		
	public function exam_list_table($u_id){
		$this->db->select('u_id,s_id')->from('users');
		$this->db->where('users.u_id',$u_id);
		return $this->db->get()->row_array();
	}
			
	public function exam_pattern_table($s_id){
		$this->db->select('count(exam_list.id) as exam_details')->from('exam_list');
		$this->db->where('exam_list.s_id',$s_id);
		return $this->db->get()->row_array();
	} 
	public function teacher_pattern_table($s_id){
		$this->db->select('count(users.u_id) as teacher_details')->from('users');
		$this->db->where('users.s_id',$s_id);
		$this->db->where('status',1);
		$this->db->where('role_id',6);
		return $this->db->get()->row_array();		
    }
		public function student_pattern_table($s_id){
			$this->db->select('count(users.u_id)as student_details')->from('users');
			$this->db->where('users.s_id',$s_id);
			$this->db->where('status',1);
			$this->db->where('role_id',7);
			return $this->db->get()->row_array();
		}
		public  function total_pattern_table($s_id){
           $this->db->select('SUM(pay_amount) as total_amount')->from('student_fee');
           $this->db->where('student_fee.school_id',$s_id);
           return $this->db->get()->row_array();
		}	
		
		
		
		public function get_all_student_name_list($s_id){
		$this->db->select('users. name,users.u_id')->from('users');
		$this->db->where('users.s_id',$s_id);
		$this->db->where('role_id',7);
		return $this->db->get()->result_array();
		}
		
	public function class_wise_student_list($class_id){
	 $this->db->select('users.class_name,users.name,users.u_id')->from('users');
		 $this->db->where('users.class_name',$class_id);
		 $this->db->where('role_id',7);
		 $this->db->where('status',1);
		 return $this->db->get()->result_array(); 
	 }
		public function get_student_allsubjects_list($student_id){
	    $this->db->select('class_subjects.subject,class_subjects.id')->from('users');
		$this->db->join('class_subjects ', 'class_subjects.id = users.u_id', 'left');
		 $this->db->where('users.name',$student_id);
		 return $this->db->get()->result_array(); 
	 }
		
	/* exam  class syllabus */	
		public function save_exam_syllabus($data){
		$this->db->insert('exam_syllabus',$data);
		return $this->db->insert_id();
	}
	public function get_exam_syllabus_list($s_id){
	$this->db->select('exam_syllabus.*,class_list.name,section')->from('exam_syllabus');
	$this->db->join('class_list ', 'class_list.id = exam_syllabus.class_id', 'left');
	$this->db->where('exam_syllabus.s_id',$s_id);
	$this->db->where('exam_syllabus.status !=',2);
    return $this->db->get()->result_array();
	}
	public function edit_exam_syllabus_list($s_id,$e_s_id){
	$this->db->select('exam_syllabus.*')->from('exam_syllabus');
	$this->db->where('exam_syllabus.s_id',$s_id);
    return $this->db->get()->row_array();
	}		
	public function upadte_exam_syllabus($e_s_id,$data){
	$this->db->where('e_s_id',$e_s_id);
		return $this->db->update("exam_syllabus",$data);
	}		
	public function delete_exam_Syllabus($e_s_id){
	$this->db->where('e_s_id',$e_s_id);
	return $this->db->delete('exam_syllabus');
	}	
		
		
		
		
		
		
		
     }				 