<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Hostelmanagement extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Hostelmanagement_model');
	}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					$this->load->view('hostel/index');
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
	public function hosteldetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$data['hostel_details']=$this->Hostelmanagement_model->hostel_details_list($detail['s_id']);	
					//echo'<pre>';print_r($data);exit;
					$data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('hostel/hostel-details',$data);
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
	
	public function add_hosteldetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
				$save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'hostel_name'=>isset($post['hostel_name'])?$post['hostel_name']:'',
				'hostel_type'=>isset($post['hostel_type'])?$post['hostel_type']:'',
				'warden_name'=>isset($post['warden_name'])?$post['warden_name']:'',
				'contact_number'=>isset($post['contact_number'])?$post['contact_number']:'',
				'address'=>isset($post['address'])?$post['address']:'',
				'facilities'=>isset($post['facilities'])?$post['facilities']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
					//echo'<pre>';print_r($save_data);exit;
					$save=$this->Hostelmanagement_model->save_hostel_details($save_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($save)>0){
					$this->session->set_flashdata('success',"hostel details are successfully added");	
					redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('Hostelmanagement/hosteldetails');
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
	public function hosteledit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
		$detail=$this->Student_model->get_resources_details($login_details['u_id']);
		$data['hostel_List']=$this->Hostelmanagement_model->edit_hostel_details_list($detail['s_id'],base64_decode($this->uri->segment(3)));	
		//echo'<pre>';print_r($data);exit;
		
					$this->load->view('hostel/edit_hostel-details',$data);
				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	
	public function edit_hostel()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
		$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$update_data=array(
				'hostel_name'=>isset($post['hostel_name'])?$post['hostel_name']:'',
				'hostel_type'=>isset($post['hostel_type'])?$post['hostel_type']:'',
				'warden_name'=>isset($post['warden_name'])?$post['warden_name']:'',
				'contact_number'=>isset($post['contact_number'])?$post['contact_number']:'',
				'address'=>isset($post['address'])?$post['address']:'',
				'facilities'=>isset($post['facilities'])?$post['facilities']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
					//echo'<pre>';print_r($update_data);exit;
					$update=$this->Hostelmanagement_model->update_hostel_details($post['id'],$update_data);	
					//echo'<pre>';print_r($update);exit;
					if(count($update)>0){
					$this->session->set_flashdata('success',"hostel details are successfully updated");	
					redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('Hostelmanagement/hosteldetails/',$post['id']);
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
	
	public function hostalstatus()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
					$id=base64_decode ($this->uri->segment(3));
							$status=base64_decode ($this->uri->segment(4));
								if($status==1){
								 $stain=0;
								 }else{
									 $stain=1;
								 }
							if($id!=''){
								$staindata=array(
										'status'=> $stain,
										'updated_at'=>date('Y-m-d H:i:s')
										);
										 //echo'<pre>';print_r($staindata );exit;  
						$statusdetails =$this->Hostelmanagement_model->update_hostel_details($id,$staindata);
									 //echo'<pre>';print_r($statusdetails );exit;  
									  if($status==1){
								$this->session->set_flashdata('success',"Hostel Details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Hostel Details successfully Activate.");
								}
							redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));			  					  
	                        }else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));
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
	
	public function hostaldelete()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
					$id=base64_decode ($this->uri->segment(3));
						 $delete_details =$this->Hostelmanagement_model->delete_hostel_details_data($id);
						 //echo'<pre>';print_r($delete_details);exit;  			
							$this->session->set_flashdata('success',"delete successfully ");		 
							redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));			  					  
	                        }else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");

			            redirect('Hostelmanagement/hosteldetails/'.base64_encode(1));
				         } 
		              }else{
			          $this->session->set_flashdata('error',"you don't have permission to access");
			          redirect('home');
		    }
	
	}
	public function roomdetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
					$data['tab']=base64_decode($this->uri->segment(3));
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);	
					$data['hostel_list']=$this->Hostelmanagement_model->hostel_type_list($detail['s_id']);	
					$data['hostel_floors_list']=$this->Hostelmanagement_model->get_hostel_floors_list($detail['s_id']);	
					$data['room_list']=$this->Hostelmanagement_model->get_hostel_rooms_list($detail['s_id']);	
					//echo'<pre>';print_r($data);exit;
					
					$this->load->view('hostel/room-details',$data);
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
	
	public function addroomdetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$post=$this->input->post();
							//echo'<pre>';print_r($post);exit;
							 $room_data=array(
								's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
								'hotel_type'=>isset($post['hotel_type'])?$post['hotel_type']:'',
								'room_name'=>isset($post['room_name'])?$post['room_name']:'',
								'floor_id'=>isset($post['floor_number'])?$post['floor_number']:'',
								'total_beds'=>isset($post['total_beds'])?$post['total_beds']:'',
								'status'=>1,
								'created_at'=>date('Y-m-d H:i:s'),
								'updated_at'=>date('Y-m-d H:i:s'),
								'created_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
							 );
					//echo'<pre>';print_r($room_data);exit;
					$save=$this->Hostelmanagement_model->save_room_details($room_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($save)>0){
					$this->session->set_flashdata('success',"room details are successfully added");	
					redirect('hostelmanagement/roomdetails/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('hostelmanagement/roomdetails/');
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
	
	public function beddetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					$this->load->view('hostel/bed-details');
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
	public function allocateroom()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					$this->load->view('hostel/allocate-room');
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
	public function feedetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==11){
					$this->load->view('hostel/fee-details');
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