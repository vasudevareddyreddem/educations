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
	public function editroutes()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$r_id=base64_decode($this->uri->segment(3));					
					$routes_details=$this->Transportation_model->get_routes_details($r_id);
					//echo '<pre>';print_r($routes_details);exit;

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
					$post=$this->input->post();
					
	                $update=array(
					'route_no'=>isset($post['route_no'])?$post['route_no']:'',
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					
					$update=$this->Transportation_model->update_route($post['r_id'],$update);
					
	              //echo'<pre>';print_r($comibile);exit;
				  if(count($update)>0){
						if(isset($post['route_stops']) && count($post['route_stops'])>0){
							/*stop delete purpose*/
							$routes_stops=$this->Transportation_model->get_stop_list($post['r_id']);
							//echo'<pre>';print_r($routes_stops);exit;
								foreach($routes_stops as $lis){
									
									if (in_array($lis['stop_id'], $post['stop_id']))
									  {
										$in[]=$lis['stop_id'];
										
									  }
									else
									  {
									  $out[]=$lis['stop_id'];
									  }
								}
								
								if(isset($out) && count($out)>0){
									foreach($out as $li){
										$de=array('s_status'=>2,'updated_at'=>date('Y-m-d H:i:s'));
										$siva=$this->Transportation_model->update_route_stops($li,$de);
										//echo'<pre>';print_r($siva);exit;
									}
								}
							$comibile=array_combine($post['stop_id'],$post['route_stops']);
							
							foreach($comibile as $key=>$val){
								
								if($key!=''){
									$route_update=array(
									'stop_name'=>$val,
									'updated_at'=>date('Y-m-d H:i:s'),
									);
									$this->Transportation_model->update_route_stops($key,$route_update);
									
								}else{
									if($val!=''){
									$route_add=array(
									'r_id'=>$post['r_id'],
									's_id'=>$detail['s_id'],
									'stop_name'=>$val,
									's_status'=>1,
									'created_at'=>date('Y-m-d H:i:s'),
									'updated_at'=>date('Y-m-d H:i:s'),
									'created_by'=>$login_details['u_id']
									);
									$this->Transportation_model->save_route_stops($route_add);
									}
								}
								
							}
							
						}
						$this->session->set_flashdata('success',"Route Number successfully Updated");
						redirect('transportation/addroutes/'.base64_encode(1));
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('transportation/editroutes/'.base64_encode($post['r_id']));
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
							
						
						if($status==1){
								$this->session->set_flashdata('success',"Vehical details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Vehical details successfully Activate.");
								}

				
						
						
						
						redirect('transportation/addroutes/'.base64_encode(1));
						
	              }else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/addroutes/'.base64_encode(1));
				}

				  
	   }else{
		 $this->session->set_flashdata('error',"techincal problem");
              redirect('transportation/addroutes/');
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
			$delete_stops=$this->Transportation_model->delete_route_stops($r_id);
					//echo'<pre>';print_r($delete_stops);exit;
					$this->session->set_flashdata('success',"delete successfully ");
						redirect('transportation/addroutes/'.base64_encode(1));	
					
				}else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/addroutes/'.base64_encode(1));
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
	               
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					
					$data['route']=$this->Transportation_model->get_route_details($detail['s_id']);	
					//echo'<pre>';print_r($data['route']);exit;
			$data['vehicle_list']=$this->Transportation_model->get_vechical_details($detail['s_id'],$login_details['u_id']);
					
					//echo'<pre>';print_r($data['vehicle_list']);exit;
			       $data['tab']=base64_decode($this->uri->segment(3));
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
	public function vehicle_details_post()
		{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					
		            //echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
		         $post=$this->input->post();
		         //echo'<pre>';print_r( $post);exit;
				 $save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'route_number'=>isset($post['route_number'])?$post['route_number']:'',
				'registration_no'=>isset($post['registration_no'])?$post['registration_no']:'',
				'driver_name'=>isset($post['driver_name'])?$post['driver_name']:'',
				'driver_no'=>isset($post['driver_no'])?$post['driver_no']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['u_id']
				);
				//echo'<pre>';print_r( $save_data);exit;
				$save=$this->Transportation_model->save_vechil($save_data);
				//echo'<pre>';print_r($save);exit;
					foreach($post['multiple_stops'] as $lis){
					$route_add=array(	
					'v_id'=>$save,
					's_id'=>$detail['s_id'],
					'multiple_stops'=>$lis,
				     's_status'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$login_details['u_id']
					);
					//echo'<pre>';print_r($route_add);exit;
					$user=$this->Transportation_model->save_vechil_stops($route_add);
				
					}
				//echo'<pre>';print_r($user);exit;
		            $this->session->set_flashdata('success'," vehicle details successfully added");
						redirect('transportation/vehicle_details/'.base64_encode(1));
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('transportation/vehicle_details/'.base64_encode($post['v_id']));
					}
				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
	}	
	public function edit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					//echo'<pre>';print_r($login_details);exit;
				
				$v_id=base64_decode($this->uri->segment(3));
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);

					$data['route']=$this->Transportation_model->get_route_details($detail['s_id']);	
				//echo '<pre>';print_r($data['route']);exit;
					$data['vechical_details']=$this->Transportation_model->get_edit_vechical_details_list($v_id);
					$data['all_stop_list']=$this->Transportation_model->get_route_stop_lists($data['vechical_details']['route_number']);
					//echo '<pre>';print_r($data);exit;

					$this->load->view('transportation/edit-vehicle-details',$data);
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
		
	public function edit_post()
		{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
		          //echo'<pre>';print_r($login_details);exit;
		$detail=$this->Student_model->get_resources_details($login_details['u_id']);
		$post=$this->input->post();
		//echo'<pre>';print_r($post);exit;
		$save_data=array(
				'route_number'=>isset($post['route_number'])?$post['route_number']:'',
				'registration_no'=>isset($post['registration_no'])?$post['registration_no']:'',
				'driver_name'=>isset($post['driver_name'])?$post['driver_name']:'',
				'driver_no'=>isset($post['driver_no'])?$post['driver_no']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['u_id']
				);
				//echo'<pre>';print_r($save_data);exit;
				$update=$this->Transportation_model->update_vechil_route_value($post['v_id'],$save_data);
				//echo'<pre>';print_r($post);
			          if(count($update)>0){
						 $stop=$this->Transportation_model->stops_list_data_update($post['v_id']);	

						   foreach($stop as $list){
								  //echo'<pre>';print_r($stop);exit;
									$s_ids[]=$list['multiple_stops'];
						   }
						foreach($s_ids as $li){
								//echo'<pre>';print_r($li);
								if (in_array($li,$post['multiple_stops']))
									{
										//echo "dd";	
									}else{
										$out[]= $li;
									}
									
								}
						   if(isset($out) && count($out)>0){
									foreach($out as $los){
										
										if($los!=''){
										$del=array('s_status'=>2,'updated_at'=>date('Y-m-d H:i:s'));
										$this->Transportation_model->vehical_update_query($los,$post['v_id'],$del);
										}
									}
								}
							
										 foreach($post['multiple_stops'] as $li){
											if (in_array($li,$s_ids))
											{
											  $dd=array(
												's_status'=>1,
												'created_at'=>date('Y-m-d H:i:s'),
												);
												//echo'<pre>';print_r($dd);exit;
												$this->Transportation_model->update_query($li,$dd);	
												
														
										 
											}else{
												$save=array(
													'v_id'=>$post['v_id'],
													's_id'=>$detail['s_id'],
													'multiple_stops'=>$li,
													's_status'=>1,
													'created_at'=>date('Y-m-d H:i:s'),
													'updated_at'=>date('Y-m-d H:i:s'),
													'created_by'=>$login_details['u_id']
													);
												$this->Transportation_model->insert_query_stops($save);
												//echo $this->db->last_query();exit;
										
											}		
												
										 }
					
					
							
					
							 // exit;      
							
					
				
			
		            $this->session->set_flashdata('success'," vehicle details successfully updated");
						redirect('transportation/vehicle_details/'.base64_encode(1));
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
	
	public function vechicalstatus()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
				$v_id=base64_decode ($this->uri->segment(3));
	            $status=base64_decode ($this->uri->segment(4));
					if($status==1){
	                 $stain=0;
					 }else{
						 $stain=1;
					 }
				if($v_id!=''){
					$staindata=array(
							'status'=> $stain,
							'created_at'=>date('Y-m-d H:i:s')
							);
					$statusdetails =$this->Transportation_model->status_data($v_id,$staindata);
					
					
				 //echo'<pre>';print_r($statusdetails);exit;		
					//echo'<pre>';print_r($statusdetails);exit;  
								$route_add=array(
									's_status'=>$stain,
									'created_at'=>date('Y-m-d H:i:s'),
								);
								//echo'<pre>';print_r($route_add);exit;
							$siva=$this->Transportation_model->status_data_stops($v_id,$route_add);
							if($status==1){
								$this->session->set_flashdata('success',"Vehical details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Vehical details successfully Activate.");
								}

						
						redirect('transportation/vehicle_details/'.base64_encode(1));			  					  
	              }else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/vehicle_details/'.base64_encode(1));
				}

				  
	   }else{
		 $this->session->set_flashdata('error',"techincal problem");
              redirect('transportation/addroutes/');
	   }		   
				
				}else{
						$this->session->set_flashdata('error',"you don't have permission to access");
						redirect('dashboard');
				}
		
		
	}
	
	public function vechicaldelete()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					//echo'<pre>';print_r($login_details);exit;
					$v_id=base64_decode($this->uri->segment(3));
		$delete_details =$this->Transportation_model->delete_vechical_details_data($v_id);
						 //echo'<pre>';print_r($delete_details);exit;  			
			$siva=$this->Transportation_model->delete_vechical_details_stops($v_id);
					//echo'<pre>';print_r($siva);exit;
		
		 
					$this->session->set_flashdata('success',"delete successfully ");
						redirect('transportation/vehicle_details/'.base64_encode(1));	
					
				}else{
						$this->session->set_flashdata('error',"problem is occurs");
			            redirect('transportation/vehicle_details/'.base64_encode(1));
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('dashboard');
		}
	}	

	public function transport_fee_details()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					$data['tab']=base64_decode($this->uri->segment(3));
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$data['route']=$this->Transportation_model->get_route_details_card($detail['s_id']);	
					$data['transport_free']=$this->Transportation_model->get_transport_free_list_data($detail['s_id']);
					 
					 //echo '<pre>';print_r($data);exit;
					 $data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('transportation/transport-fee-details',$data);
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
	
	public function transport_fee_details_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$post=$this->input->post();	
					$cnt=0;foreach($post['route_id'] as $lis){
							$save_data = array(
							's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
							'route_id'=>$lis,
							'stops'=>$post['stops'][$cnt],
							'frequency'=>$post['frequency'][$cnt],
							'amount'=>$post['amount'][$cnt],
							'status'=>1,
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
							'created_by'=>$login_details['u_id']   
						);
					$save=$this->Transportation_model->save_transport_data($save_data);		
					$cnt++;
					}
					if(count($save)>0){
						$this->session->set_flashdata('success',"transport free details are successfully added");	
						redirect('transportation/transport-fee-details/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('transportation/transport-fee-details'.base64_encode($post['f_id']));
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
	
	
	
	 public function routes_sides(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5 || $login_details['role_id']==8){
					$post=$this->input->post();
					
					$route_stops=$this->Transportation_model->routes_wise_stop_list($post['route_number']);
					//echo'<pre>';print_r($route_list);exit;
					if(count($route_stops)>0){
						$data['msg']=1;
						$data['list']=$route_stops;
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
	public function routes_stops()
	{
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==5){
					//echo'<pre>';print_r($login_details);exit;
					$post=$this->input->post();
    $route_stops=$this->Transportation_model->routes_stops($post['route_id']);
					//echo'<pre>';print_r($route_stops);exit;
					if(count($route_stops)>0){
						$data['msg']=1;
						$data['list']=$route_stops;
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
	
	
	/* transportation fee*/
	public  function transportedit(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==5){
				
					$f_id=base64_decode($this->uri->segment(3));
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$data['transportion_details']=$this->Transportation_model->get_transportaion_details($f_id);
					//echo'<pre>';print_r($data['transportion_details']);exit;
					$data['route']=$this->Transportation_model->get_route_details_card($detail['s_id']);
					//echo'<pre>';print_r($data['route']);exit;
					$data['route_stops']=$this->Transportation_model->routes_stops($data['transportion_details']['route_id']);	

					//echo'<pre>';print_r($data);exit;	
					$this->load->view('transportation/transport-fee-edit',$data);
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
	public  function transport_fee_update_post(){
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==5){
				$post=$this->input->post();
				$details=$this->Transportation_model->get_transportaion_details($post['f_id']);
				if($details['route_id']=!$post['route_id'] || $details['stops']=!$post['stops']){
				$check=$this->Transportation_model->check_transfprtaion_exits($post['route_id'],$post['stops'],$post['frequency'],$post['amount']);
					if(count($check)>0){
							$this->session->set_flashdata('error',"transportation Details already exists. Please try again.");
							redirect('transportation/transportedit/'.base64_encode($post['f_id']));
						
					}
				}
				$update=array(
					'route_id'=>isset($post['route_id'])?$post['route_id']:"",
					'stops'=>isset($post['stops'])?$post['stops']:"",
					'frequency'=>isset($post['frequency'])?$post['frequency']:"",
					'amount'=>isset($post['amount'])?$post['amount']:"",
					'updated_at'=>date('Y-m-d H:i:s'),
				
				);
				$statusdata=$this->Transportation_model->update_transactional_fee__details($post['f_id'],$update);
					if(count($statusdata)>0){
						$this->session->set_flashdata('success',"Transportation fee details successfully Updated.");
						
						redirect('transportation/transport_fee_details/'.base64_encode(1));
					}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('transportation/transportedit/'.base64_encode($post['f_id']));
					}
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	public function transportstatus()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==5){
					$f_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($f_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Transportation_model->update_transactional_fee__details($f_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Transportation fee details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Transportation fee details successfully Activate.");
								}
								redirect('transportation/transport_fee_details/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transportation/transport_fee_details/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
		
	}
	public function transportdelete()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==5){
					$f_id=base64_decode($this->uri->segment(3));
					
					if($f_id!=''){
						$stusdetails=array(
							'status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Transportation_model->update_transactional_fee__details($f_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Transportation fee details successfully deleted.");
								
								redirect('transportation/transport_fee_details/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transportation/transport_fee_details/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
		
	}
	/* transportation fee*/
	/* transportation registration*/
	public function student_transport_registration()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
                     $data['tab']=base64_decode($this->uri->segment(3));
					
					$data['vechical_no']=$this->Transportation_model->get_vechical_number_list($detail['s_id']);
					$data['routes_number']=$this->Transportation_model->get_routes_number($detail['s_id']);
					$data['student_transport']=$this->Transportation_model->student_transport_registration($detail['s_id']);	
					
					
					//echo'<pre>';print_r($login_details);exit;
					$this->load->view('transportation/student-transport-registration',$data);
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
	public function get_active_vehical_list(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);	
					$post=$this->input->post();
					$vechical_list=$this->Transportation_model->get_active_vehical_list($post['stop_id'],$detail['s_id']);
					
					if(count($vechical_list)>0){
						$data['msg']=1;
						$data['list']=$vechical_list;
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
		
		public function student_transport_registration_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					//echo'<pre>';print_r($login_details);exit;
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					//echo'<pre>';print_r($detail);exit;
					 $post=$this->input->post();
		         //echo'<pre>';print_r( $post);exit;
				 $save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'student_id'=>isset($post['student_id'])?$post['student_id']:'',
				'route'=>isset($post['route'])?$post['route']:'',
				'stop'=>isset($post['stop'])?$post['stop']:'',
				'vechical_number'=>isset($post['vechical_number'])?$post['vechical_number']:'',
				'pickup_point'=>isset($post['pickup_point'])?$post['pickup_point']:'',
				'distance'=>isset($post['distance'])?$post['distance']:'',
				'amount'=>isset($post['amount'])?$post['amount']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['u_id']
				);
				//echo'<pre>';print_r($save_data);exit;	
				$save=$this->Transportation_model->save_student_transport_data($save_data);			
				//echo'<pre>';print_r($save);exit;	
				if(count($save)>0){
						$this->session->set_flashdata('success',"student transport registration details are successfully added");	
						redirect('transportation/student_transport_registration/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('transportation/student_transport_registration/');
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
	public function studentedit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					//echo'<pre>';print_r($login_details);exit;
					$this->uri->segment(3);
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					//echo'<pre>';print_r($detail);exit;
					$data['student']=$this->Transportation_model->edit_student_transport_registration($detail['s_id'],base64_decode($this->uri->segment(3)));
					//echo'<pre>';print_r($data);exit;	
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
					//echo'<pre>';print_r($data['class_list']);exit;			
					$data['vechical_detail']=$this->Transportation_model->get_vechical_number_details_list($data['student']['stop']);
					//echo'<pre>';print_r($data['vechical_detail']);exit;
					$data['routes_number']=$this->Transportation_model->get_routes_number($detail['s_id']);		
					$data['route_stops']=$this->Transportation_model->vehical_wise_stops_list($data['student']['route']);		
					$data['student_name']=$this->Transportation_model->class_wise_student_list($data['student']['class_id']);	
					$data['stops_list']=$this->Transportation_model->vehical_stops_list_pickup_point($data['student']['vechical_number']);
					
					//echo'<pre>';print_r($data['stops_list']);exit;	
					$data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('transportation/student-transport-registration-edit',$data);
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
	
	public function student_transport_edit_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					//echo'<pre>';print_r($login_details);exit;
					$this->uri->segment(3);
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					 $update_data=array(
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'student_id'=>isset($post['student_id'])?$post['student_id']:'',
						'route'=>isset($post['route'])?$post['route']:'',
						'stop'=>isset($post['stop'])?$post['stop']:'',
						'vechical_number'=>isset($post['vechical_number'])?$post['vechical_number']:'',
						'pickup_point'=>isset($post['pickup_point'])?$post['pickup_point']:'',
						'distance'=>isset($post['distance'])?$post['distance']:'',
						'amount'=>isset($post['amount'])?$post['amount']:'',
						'status'=>1,
						'updated_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$login_details['u_id']
					);
				//echo'<pre>';print_r($update_data);exit;	
				$update=$this->Transportation_model->update_student_transport_data($post['s_t_id'],$update_data);			
				//echo'<pre>';print_r($update);exit;	
				if(count($update)>0){
						$this->session->set_flashdata('success',"student transport registration details are successfully updated");	
						redirect('transportation/student_transport_registration/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('transportation/student_transport_registration/'.base64_encode($post['s_t_id']));
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
	public function studentstatus()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8){
					$s_t_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($s_t_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Transportation_model->status_student_transport_registration_details($s_t_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"student transport registration details details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"student transport registration details successfully Activate.");
								}
								redirect('transportation/student_transport_registration/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transportation/student_transport_registration/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
		
	}
	public function studentdelete()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8){
					$s_t_id=base64_decode($this->uri->segment(3));
					
							$deleted_data=$this->Transportation_model->deleted_student_transport_registration_details($s_t_id,$stusdetails);
							if(count($deleted_data)>0){
								$this->session->set_flashdata('success',"student transport registration details details successfully Deleted.");
								
								redirect('transportation/student_transport_registration/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transportation/student_transport_registration/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
	}
	public function get_vehical_routes_lists(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$post=$this->input->post();
					$stops_list=$this->Transportation_model->vehical_wise_stops_list($post['route']);
					if(count($stops_list)>0){
						$data['msg']=1;
						$data['list']=$stops_list;
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
	public function class_student_list(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$post=$this->input->post();
					$student_list=$this->Transportation_model->class_wise_student_list($post['class_id']);
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
	public function get_vehical_stop_lists(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$post=$this->input->post();
					$stops_list=$this->Transportation_model->vehical_stops_list_pickup_point($post['vechical_number']);
					
					if(count($stops_list)>0){
						$data['msg']=1;
						$data['list']=$stops_list;
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
	/* transportation registration*/
	
}
