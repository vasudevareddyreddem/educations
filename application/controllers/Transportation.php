<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Transportation extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Transportation_model');
			$this->load->model('Student_model');
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
	public function editroutes()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$r_id=base64_decode($this->uri->segment(3));					
					$routes_details=$this->Transportation_model->get_routes_details($r_id);
					//echo'<pre>';print_r($routes_details);exit;
					if(isset($routes_details) && count($routes_details)>0){
						foreach($routes_details as $list){
							$routes=$list;
						}
					}else{
						$routes='';
					}
					$data['routes_details']=$routes;
					//echo '<pre>';print_r($data);exit;
					$this->load->view('transportation/edit-routes-stops',$data);
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
								//echo '<pre>';print_r($route_add);exit;
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
	
	public function editroutespost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$r_id=base64_decode($this->uri->segment(3));	
              $routes_details=$this->Transportation_model->get_routes_details($r_id);
					//echo'<pre>';print_r($routes_details);exit;					
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
	                $update=array(
					'r_id'=>isset($post['r_id'])?$post['r_id']:'',
					'route_no'=>isset($post['route_no'])?$post['route_no']:'',
					'status'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$login_details['u_id']
					);
	                 //echo'<pre>';print_r($update);exit;  
	           $save=$this->Transportation_model->update_route($r_id,$update);
	              //echo'<pre>';print_r($save);exit;
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
								//echo'<pre>';print_r($route_add);exit;
							$siva=$this->Transportation_model->update_route_stops($r_id,$route_add);
							//echo'<pre>';print_r($siva);exit;
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
	public function status()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
				$r_id=base64_decode ($this->uri->segment(3));
	            $status=base64_decode ($this->uri->segment(4));
					if($status==1){
	                 $stain=0;
					 }else{
						 $stain=1;
					 }
				if($r_id!=''){
					$staindata=array(
							'status'=> $stain,
							'created_at'=>date('Y-m-d H:i:s')
							);
							 //echo'<pre>';print_r($staindata );exit;  
			$statusdetails =$this->Transportation_model->status_details_data($r_id,$staindata);
				 //echo'<pre>';print_r($statusdetails);exit;  
								$route_add=array(
									's_status'=>$stain,
									'created_at'=>date('Y-m-d H:i:s'),
								);
								//echo'<pre>';print_r($route_add);exit;
							$siva=$this->Transportation_model->status_route_stops($r_id,$route_add);
							//echo'<pre>';print_r($siva);exit;
							
						$this->session->set_flashdata('success',"status successfully ");
						redirect('transportation/addroutes/'.base64_encode(1));			  					  
	              }else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/addroutes/'.base64_encode($b_id));
				}

				  
	   }else{
		 $this->session->set_flashdata('error',"techincal problem");
              redirect('transportation/addroutes/'.base64_encode($b_id));
	   }		   
				
				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
		
	}
	
	public function delete()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$r_id=base64_decode($this->uri->segment(3));
		
		  $delete_details =$this->Transportation_model->delete_details_data($r_id);
						 //echo'<pre>';print_r($delete_details);exit;  			
			$siva=$this->Transportation_model->delete_route_stops($r_id);
					//echo'<pre>';print_r($siva);exit;
					$this->session->set_flashdata('success',"delete successfully ");
						redirect('transportation/addroutes/'.base64_encode(1));	
					
				}else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/addroutes/'.base64_encode($b_id));
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}	

	public function vehicle_details()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
                     //echo'<pre>';print_r($detail);exit;
					 $siva=$this->Transportation_model->get_sources_details($detail['s_id']);
					 //echo'<pre>';print_r($siva);exit;
				$data['route']=$this->Transportation_model->get_route_details($detail['s_id']);	
					//echo'<pre>';print_r($route);exit;
				$data['stops']=$this->Transportation_model->get_stop_details($detail['s_id']);
					//echo'<pre>';print_r($data['stops']);exit;
					
			$data['details']=$this->Transportation_model->get_vechical_details($detail['s_id']);	
                  //echo'<pre>';print_r($data['details']);exit;

				
					$this->load->view('transportation/vehicle-details',$data);
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
	 public function routes_sides(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$post=$this->input->post();
					$student_list=$this->Librarian_model->routes_wise_list($post['r_id']);
					//echo'<pre>';print_r($student_list);exit;
					if(count($student_list)>0){
						$data['msg']=1;
						$data['list']=$student_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
					
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('home');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	
	
	
	public function vehicle_details_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$post=$this->input->post();	
					//echo'<pre>';print_r($post);exit;
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
                     //echo'<pre>';print_r($detail);exit;

					$save_data=array(
                 's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'route_number'=>isset($post['route_number'])?$post['route_number']:'',
				'multiple_stops'=>isset($post['multiple_stops'])?$post['multiple_stops']:'',
				'registration_no'=>isset($post['registration_no'])?$post['registration_no']:'',
				'driver_name'=>isset($post['driver_name'])?$post['driver_name']:'',
				'driver_no'=>isset($post['driver_no'])?$post['driver_no']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
                 );		
					//echo'<pre>';print_r($save_data);exit;
					$save=$this->Transportation_model->insert_vehicle_details_list($save_data);		
				//echo'<pre>';print_r($save_data);exit;
					if(count($save)>0){
				$this->session->set_flashdata('success',"add book damage details are successfully register");	
					redirect('transportation/vehicle-details/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('transportation/vehicle-details/');
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
