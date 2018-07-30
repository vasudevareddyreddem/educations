<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* admin_announcent  */
	public function get_school_details($u_id){
		$this->db->select('schools.scl_bas_name,schools.s_id')->from('schools');		
		$this->db->where('u_id', $u_id);
        return $this->db->get()->row_array();	
	}
		public function get_school_list($u_id){
			$this->db->select('schools.scl_bas_name,schools.s_id')->from('schools');
			$this->db->where('create_by',$u_id);
			$this->db->where('status',1);
			return $this->db->get()->result_array();
		}
		
		public function getschoolssname($id){
			$this->db->select('schools.scl_bas_name,schools.s_id')->from('schools');		
			$this->db->where('s_id', $id);
			return $this->db->get()->row_array();
		}
		public function announcements_list($data){
			$this->db->insert('announcements', $data);
		return $insert_id = $this->db->insert_id();
	}
	  
	public function get_schools_list_details($u_id){
		$this->db->select('schools.scl_bas_name,schools.s_id')->from('schools');		
		$this->db->where('u_id', $u_id);
        return $this->db->get()->row_array();	
	}
	 
   
	public function get_all_sent_notification_details($u_id){
		$this->db->select('announcements.*')->from('announcements');		
		$this->db->where('sent_by', $u_id);
		$this->db->group_by('announcements.comment');
        $return=$this->db->get()->result_array();
		foreach( $return as $Lis){
			
			$msg=$this->get_sent_announcements_resouces_list($Lis['comment']);
			$data[$Lis['int_id']]=$Lis;
			$data[$Lis['int_id']]['r_list']=$msg;
		}
		if(!empty($data))
		{
		return $data;
		}
	}
	
	public function get_sent_announcements_resouces_list($msg){
		$this->db->select('announcements.s_id,schools.scl_bas_name')->from('announcements');	
		$this->db->join('schools', 'schools.s_id = announcements.s_id', 'left');
		$this->db->where('comment', $msg);
        return $this->db->get()->result_array();
	}
	
	
	/* school_announcent  */
	public function get_announcement_details_num($u_id){
		$this->db->select('users.u_id,users.name')->from('users');
		$this->db->where('create_by',$u_id);
			$this->db->where('status',1);
			return $this->db->get()->result_array();
		
	}
	
	public function getresourcename($id){
		$this->db->select('users.name,users.u_id')->from('users');		
			$this->db->where('u_id', $id);
			return $this->db->get()->row_array();
		}
		
		public function announcements_notification_list($data){
			$this->db->insert('schools_announcements', $data);
		return $insert_id = $this->db->insert_id();	
		}
		
	public function get_total_notification_details($u_id){
		$this->db->select('schools_announcements.*')->from('schools_announcements');		
		$this->db->where('sent_by', $u_id);
		$this->db->group_by('schools_announcements.comment');
        $return=$this->db->get()->result_array();
		foreach( $return as $Lis){
			
			$msg=$this->get_total_sent_announcements_resouces_list($Lis['comment']);
			$data[$Lis['int_id']]=$Lis;
			$data[$Lis['int_id']]['r_list']=$msg;
		}
		if(!empty($data))
		{
		return $data;
		}
	}
		
		public function get_total_sent_announcements_resouces_list($msg){
		$this->db->select('schools_announcements.res_id,users.name')->from('schools_announcements');	
		$this->db->join('users', 'users.u_id = schools_announcements.res_id', 'left');
		$this->db->where('comment', $msg);
        return $this->db->get()->result_array();
	}
	   
	  
	   
	   public function details_admin_form($s_id){
			$this->db->select('announcements.*')->from('announcements');
			$this->db->where('s_id',$s_id);
			return $this->db->get()->result_array();
		}
		
		public  function get_announcements_comment($int_id){
			$this->db->select('announcements.*')->from('announcements');
			$this->db->where('int_id',$int_id);
			return $this->db->get()->row_array();
		}
		public  function get_announcement_comment_read($int_id,$data){
			$this->db->where('int_id',$int_id);
			return $this->db->update('announcements',$data);
		}
		public  function get_notification_unread_count($u_id){
		$this->db->select('int_id,s_id,comment,create_at')->from('announcements');
		$this->db->where('s_id',$u_id);
		$this->db->where('status',1);
		$this->db->where('readcount',0);
		return $this->db->get()->result_array();
		}
		public  function get_resource_announcements_comment($int_id){
			$this->db->select('schools_announcements.*')->from('schools_announcements');
			$this->db->where('int_id',$int_id);
			return $this->db->get()->row_array();
		}
		public  function get_resource_announcement_comment_read($int_id,$data){
			$this->db->where('int_id',$int_id);
			return $this->db->update('schools_announcements',$data);
		}
		public  function get_resources_notification_unread_count($u_id){
		$this->db->select('count(schools_announcements.int_id) as count')->from('schools_announcements');
		$this->db->where('res_id',$u_id);
		$this->db->where('status',1);
		$this->db->where('readcount',0);
		return $this->db->get()->row_array();
	}
	
	
	
	
	
	  
}
	
	
	
