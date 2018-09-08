<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');


class Announcement extends In_frontend {

	
	public function __construct() 
	{
		parent::__construct();	
		
		}
		public function add()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=1){
				//echo'<pre>';print_r($admindetails);exit;
				$userdetails=$this->Announcement_model->get_school_details($admindetails['u_id']);
				//echo $this->db->last_query();exit;
			  //echo'<pre>';print_r($userdetails);exit;
				$data['school_list']=$this->Announcement_model->get_school_list($admindetails['u_id']);
				//echo'<pre>';print_r($data);exit;
				
		$admindetails=$this->session->userdata('userdetails');		
				//echo'<pre>';print_r($admindetails);exit;
$schools_details=$this->Announcement_model->get_schools_list_details($admindetails['u_id']);
				//echo'<pre>';print_r($schools_details);exit;
$data['notification_sent_list']=$this->Announcement_model->get_all_sent_notification_details($admindetails['u_id']);
	//echo'<pre>';print_r($data['notification_sent_list']);exit;
	
	
				
				
			$data['tab']='';
			$this->load->view('announcement/announcement-add',$data);
			$this->load->view('html/footer');
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
		
	}
	public function getschoolssname()
	{
		if($this->session->userdata('userdetails'))
		{
				$post=$this->input->post();
				foreach($post['id'] as $list){
					$school_name=$this->Announcement_model->getschoolssname($list);
					$names[]=$school_name['scl_bas_name'];
				}
				$tt=implode(",",$names);
				$data['msg']=1;
				$data['names_list']=$tt;
				$data['ids']=$post['id'];
				echo json_encode($data);exit;	
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	
	public function sendcomments()
	{
		if($this->session->userdata('userdetails'))
		{
				$admindetails=$this->session->userdata('userdetails');
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				if(isset($post['schools_ids']) && $post['schools_ids']!=''){
				foreach(explode(",",$post['schools_ids']) as $lists){
					//echo'<pre>';print_r($post['schools_ids']);exit;
					if($lists !=''){
					$addcomments=array(
					's_id'=>$lists,
					'comment'=>isset($post['comments'])?$post['comments']:'',
					'create_at'=>date('Y-m-d H:i:s'),
					'status'=>1,
					'sent_by'=>$admindetails['u_id']
					);
					//echo'<pre>';print_r($addcomments);exit;
					$save_Notification=$this->Announcement_model->announcements_list($addcomments);
					//echo'<pre>';print_r($save_Notification);exit;
					}
				}
				
				if(count($save_Notification)>0){
					$this->session->set_flashdata('success',"Notification successfully Sent.");
					redirect('Announcement/add');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('Announcement/add');
				}
				
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('Announcement/add');
				}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}

}	

   public function schoolannouncement()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$details=$this->School_model->get_school_basic_details_with_u_id($admindetails['u_id']);
				//echo'<pre>';print_r($details);exit;
				$data['admin_details']=$this->Announcement_model->get_announcement_details_num($admindetails['u_id']);
				//echo'<pre>';print_r( $data['admin_details']);exit;
				$data['send_notification_list']=$this->Announcement_model->get_total_notification_details($admindetails['u_id']);		
				//echo'<pre>';print_r($school_admin_details);exit;
				$data['notification_list']=$this->Announcement_model->details_admin_form($details['s_id']);
				//echo'<pre>';print_r($data['notification_list']);exit;
				$data['tab']='';
				$this->load->view('announcement/announcement_school',$data);
				$this->load->view('html/footer');
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
		
	}

	public function getresourcename()
	{
		if($this->session->userdata('userdetails'))
		{
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				if(isset($post['id']) && count($post['id'])>0){
					
				
				foreach($post['id'] as $list){
					$school_name=$this->Announcement_model->getresourcename($list);
					$names[]=$school_name['name'];
				}
				$tt=implode(",",$names);
				$data['msg']=1;
				$data['names_list']=$tt;
				$data['ids']=$post['id'];
				echo json_encode($data);exit;
				}else{
				$data['msg']=1;
				$data['names_list']='';
				$data['ids']='';
				echo json_encode($data);exit;
				}				
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
	
	public function resourcecomments()
	{
		if($this->session->userdata('userdetails'))
		{
				$admindetails=$this->session->userdata('userdetails');
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				if(isset($post['schools_ids']) && $post['schools_ids']!=''){
				foreach(explode(",",$post['schools_ids']) as $lists){
					//echo'<pre>';print_r($post['schools_ids']);exit;
					if($lists !=''){
					$addcomments=array(
					'res_id'=>$lists,
					'comment'=>isset($post['comments'])?$post['comments']:'',
					'create_at'=>date('Y-m-d H:i:s'),
					'status'=>1,
					'sent_by'=>$admindetails['u_id']
					);
					//echo'<pre>';print_r($addcomments);exit;
					$save_Notification=$this->Announcement_model->announcements_notification_list($addcomments);
					//echo'<pre>';print_r($save_Notification);exit;
					}
				}
				
				if(count($save_Notification)>0){
					$this->session->set_flashdata('success',"Notification successfully Sent.");
					redirect('Announcement/schoolannouncement');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('Announcement/schoolannouncement');
				}
				
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('Announcement/schoolannouncement');
				}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}

}	

	public  function viewall(){
		if($this->session->userdata('userdetails'))
				{
					$details=$this->session->userdata('userdetails');
					
					$data['userdetails']=$this->Home_model->get_all_admin_details($details['u_id']);
					
					if(isset($data['userdetails']['role_id']) && $data['userdetails']['role_id']!=1 && $data['userdetails']['role_id']==2){
					$data['notification_list']	=$this->Home_model->get_notification_list($data['userdetails']['s_id']);
					
					//echo $this->db->last_query();
					}else if($data['userdetails']['role_id']!=1 && $data['userdetails']['role_id']!=2){
						$data['notification_list']	=$this->Home_model->get_resources_notification_list($details['u_id']);
					}
					//echo '<pre>';print_r($data);exit;
					$this->load->view('announcement/announcement_viewall',$data);
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('home');
				}
	}
	public function get_notification_msg()
	{
		if($this->session->userdata('userdetails'))
		{
				$admindetails=$this->session->userdata('userdetails');
				$post=$this->input->post();
				$details=$this->Announcement_model->get_announcements_comment($post['notification_id']);
				$read=array('readcount'=>1);
				$this->Announcement_model->get_announcement_comment_read($post['notification_id'],$read);
				$school_details=$this->Home_model->get_all_admin_details($admindetails['u_id']);
				$Unread_count=$this->Announcement_model->get_notification_unread_count($school_details['s_id']);
				$data['names_list']=$details['comment'];
				$data['time']=$details['create_at'];
				if(count($Unread_count)>0){
				$data['Unread_count']=count($Unread_count);
				}else{
				$data['Unread_count']='';	
				}
				echo json_encode($data);exit;	
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
    public function get_resource_notification_msg()
	{
		if($this->session->userdata('userdetails'))
		{
				$admindetails=$this->session->userdata('userdetails');
				$post=$this->input->post();
				$details=$this->Announcement_model->get_resource_announcements_comment($post['notification_id']);
				$read=array('readcount'=>1);
				$this->Announcement_model->get_resource_announcement_comment_read($post['notification_id'],$read);
				$Unread_count=$this->Announcement_model->get_resources_notification_unread_count($admindetails['u_id']);
				$data['names_list']=$details['comment'];
				$data['time']=$details['create_at'];
				if($Unread_count['count']!=0){
				$data['Unread_count']=$Unread_count['count'];
				}else{
				$data['Unread_count']='';	
				}
				//echo '<pre>';print_r($data);exit;
				echo json_encode($data);exit;	
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}
    
    public  function smstextemail(){
		if($this->session->userdata('userdetails'))
				{
					$details=$this->session->userdata('userdetails');
					
					$data['userdetails']=$this->Home_model->get_all_admin_details($details['u_id']);
					
					if(isset($data['userdetails']['role_id']) && $data['userdetails']['role_id']!=1 && $data['userdetails']['role_id']==2){
					$data['notification_list']	=$this->Home_model->get_notification_list($data['userdetails']['s_id']);
					
					//echo $this->db->last_query();
					}else if($data['userdetails']['role_id']!=1 && $data['userdetails']['role_id']!=2){
						$data['notification_list']	=$this->Home_model->get_resources_notification_list($details['u_id']);
					}
					//echo '<pre>';print_r($data);exit;
					$this->load->view('announcement/sms_text_email',$data);
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('home');
				}
	}

}	
	
	
	




