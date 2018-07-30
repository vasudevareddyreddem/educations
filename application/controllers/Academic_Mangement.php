<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Academic_mangement extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Academic_model');		
	
	}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			//echo '<pre>';print_r($admindetails);exit;
			if($admindetails['role_id']==8){
				
			$this->load->view('html/teacher_dashboard');	
			}else{
				$this->load->view('html/dashboard');
			}
			$this->load->view('html/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public  function studentlists(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8){
				$data['class_list']=$this->Student_model->get_teacher_wise_student_list($login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('demo/total-students-list');
				$this->load->view('html/footer');
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	public  function attendance(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($post);
				if(isset($post['submit']) && $post['submit']=='check'){
					$date=explode('/',$post['date']);
					$date_format=$date[2].'-'.$date[0].'-'.$date[1];
					$data['student_attandance']=$this->Academic_model->get_student_attendance_report($post['class_id'],$date_format);
					//echo $this->db->last_query();exit;
					//echo '<pre>';print_r($data['student_attandance']);exit;
				}else{
					$data['student_attandance']=array();
				}
				$school_details=$this->Academic_model->get_school_basic_details($login_details['u_id']);
				$data['class_list']=$this->Academic_model->get_class_list_school_wise($school_details['s_id']);
				$data['class_time']=$this->Academic_model->get_school_class_times_list($school_details['s_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('academic/attendence-report',$data);
				$this->load->view('html/footer');
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}public  function marks(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8){
				$data['class_list']=$this->Student_model->get_teacher_wise_student_list($login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('demo/view-marks');
				$this->load->view('html/footer');
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	
	
	
}
