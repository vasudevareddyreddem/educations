<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Reports extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Student_model');
			$this->load->model('Reports_model');
	}
	
	
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){
			   $this->load->view('reports/reports');
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
	public function add()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){
			  
			  if(isset($post['signup'])&& $post['signup']=='submit'){
			$data['reports']=$this->Reports_model->get_student_list($post['reports_id']);
  
			  }
			  
				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function masterlist()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){
               $filename = 'FEE AMOUNT'.date('Ymd').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
			    $detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$usersdata=$this->Reports_model->get_student_masterlist($detail['s_id']);
			          // echo'<pre>';print_r($usersdata);exit;				

			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("STUDENT NAME","ADDRESS","PARIENT NAME","PHONE NO","FEE AMOUNT"); 
			   fputcsv($file, $header);
			   foreach ($usersdata as $key=>$line){ 
				 fputcsv($file,$line); 
			   }
			   fclose($file); 
			   exit; 

				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function due()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){	
				
				
               $filename = 'DUE AMOUNT'.date('Ymd').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
			    $detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$usersdata=$this->Reports_model->get_student_due_reports($detail['s_id']);
			     //echo'<pre>';print_r($usersdata);exit;
			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("STUDENT NAME","ADDRESS","PARIENT NAME","PHONE NO","DUE AMOUNT","FEE AMOUNT"); 
			   fputcsv($file, $header);
			   foreach ($usersdata as $key=>$line){ 
				 fputcsv($file,$line); 
			   }
			   fclose($file); 
			   exit; 

				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function paid()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){
					
               $filename = 'PAID AMOUNT'.date('Ymd').'.csv'; 
			   header("Content-Description: File Transfer"); 
			   header("Content-Disposition: attachment; filename=$filename"); 
			   header("Content-Type: application/csv; ");
			   // get data 
			  $detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$usersdata=$this->Reports_model->get_student_paid_reports($detail['s_id']);	
				//echo'<pre>';print_r($usersdata);exit;
			   // file creation 
			   $file = fopen('php://output', 'w');
				$header = array("STUDENT NAME","ADDRESS","PARIENT NAME","PHONE NO","PAID AMOUNT","TOTAL AMOUNT","BALANCE AMOUNT"); 
			   fputcsv($file, $header);
			   foreach ($usersdata as $key=>$line){ 
				 fputcsv($file,$line); 
			   }
			   fclose($file); 
			   exit; 

				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	
	
	
	
}	
