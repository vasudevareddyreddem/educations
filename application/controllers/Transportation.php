<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Transportation extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Transportation_model');
	}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$this->load->view('transportation/index');
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
	
	public function addroutes()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);	
					$data['tab']=base64_decode($this->uri->segment(3));
					$data['routes_list']=$this->Transportation_model->get_routes_list($detail['s_id'],$login_details['u_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('transportation/add-routes-stops',$data);
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
	public function addroutespost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);	

					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					$add=array(
					's_id'=>$detail['s_id'],
					'route_no'=>isset($post['route_no'])?$post['route_no']:'',
					'status'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$login_details['u_id']
					);
					$save=$this->Transportation_model->save_route($add);
					if(count($save)>0){
						if(isset($post['route_stops']) && count($post['route_stops'])>0){
							foreach($post['route_stops'] as $list){
								$route_add=array(
									'r_id'=>$save,
									's_id'=>$detail['s_id'],
									'stop_name'=>$list,
									's_status'=>1,
									'created_at'=>date('Y-m-d H:i:s'),
									'updated_at'=>date('Y-m-d H:i:s'),
									'created_by'=>$login_details['u_id']
								);
							$this->Transportation_model->save_route_stops($route_add);
							}
						}
						$this->session->set_flashdata('success',"Route Number successfully added");

						redirect('transportation/addroutes/'.base64_encode(1));
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('transportation/addroutes/');
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
	public function vehicle_details()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$this->load->view('transportation/vehicle-details');
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
	public function transport_fee_details()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$this->load->view('transportation/transport-fee-details');
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
	public function student_transport_registration()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$this->load->view('transportation/student-transport-registration');
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
	
	
	
	
	
}
