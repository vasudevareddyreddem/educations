<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Student extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Student_model');
	}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3 || $login_details['role_id']==8){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['tab']=base64_decode($this->uri->segment(3));
				$data['school_details']=$this->School_model->get_school_basic_details_with_resourse($login_details['u_id']);
				//echo $this->db->last_query();exit;
				$data['role_list']=$this->Home_model->get_roles_list();
				$data['student_list']=$this->Student_model->get_student_list($data['school_details']['s_id']);
				//echo '<pre>';print_r($data['student_list']);exit;
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);

				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/add-student',$data);
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
	
	
	// payment page
	public function payment()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3 || $login_details['role_id']==8 || $login_details['role_id']==7){
			
				$student_id=base64_decode($this->uri->segment(3));
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['student_details']=$this->Student_model->get_student_details($student_id);
				$data['last_payment_details']=$this->Student_model->get_student_last_payment_details($student_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/payment',$data);
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
	
	public function edit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3 || $login_details['role_id']==8){
				$student_id=base64_decode($this->uri->segment(3));
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['student_list']=$this->Student_model->get_student_details($student_id);
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/edit-student',$data);
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
	public function addpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3 || $login_details['role_id']==8){
				$post=$this->input->post();
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				//echo '<pre>';print_r($detail);exit;
					$check_email=$this->Home_model->check_email_exits($post['email']);
					//echo '<pre>';print_r($check_email);exit;
					if(($check_email)>0){
						$this->session->set_flashdata('error',"Email address already exists. Please enter another email address.");
						redirect('student');
					}
					if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
						$temp = explode(".", $_FILES["profile_pic"]["name"]);
						$image = round(microtime(true)) . '.' . end($temp);
						move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/adminpic/" . $image);
					}else{
						$image='';
					}
					if(isset($post['address_same']) && $post['address_same']=='on'){
						$p_add=isset($post['current_address'])?$post['current_address']:'';
						$p_city=isset($post['current_city'])?$post['current_city']:'';
						$p_state=isset($post['current_state'])?$post['current_state']:'';
						$p_country=isset($post['current_country'])?$post['current_country']:'';
						$p_pincode=isset($post['current_pincode'])?$post['current_pincode']:'';
					}else{
						$p_add=isset($post['per_address'])?$post['per_address']:'';
						$p_city=isset($post['per_city'])?$post['per_city']:'';
						$p_state=isset($post['per_state'])?$post['per_state']:'';
						$p_country=isset($post['per_country'])?$post['per_country']:'';
						$p_pincode=isset($post['per_pincode'])?$post['per_pincode']:'';
					}
					$addstudent=array(
						's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
						'role_id'=>isset($post['role_id'])?$post['role_id']:'',
						'name'=>isset($post['name'])?$post['name']:'',
						'dob'=>isset($post['dob'])?$post['dob']:'',
						'email'=>isset($post['email'])?$post['email']:'',
						'gender'=>isset($post['gender'])?$post['gender']:'',
						'address'=>isset($post['current_address'])?$post['current_address']:'',
						'current_city'=>isset($post['current_city'])?$post['current_city']:'',
						'current_state'=>isset($post['current_state'])?$post['current_state']:'',
						'current_country'=>isset($post['current_country'])?$post['current_country']:'',
						'current_pincode'=>isset($post['current_pincode'])?$post['current_pincode']:'',
						'per_address'=>$p_add,
						'per_city'=>$p_city,
						'per_state'=>$p_state,
						'per_country'=>$p_country,
						'per_pincode'=>$p_pincode,
						'blodd_group'=>isset($post['blodd_group'])?$post['blodd_group']:'',
						'password'=>isset($post['confirmpassword'])?md5($post['confirmpassword']):'',
						'org_password'=>isset($post['confirmpassword'])?$post['confirmpassword']:'',
						'doj'=>isset($post['doj'])?$post['doj']:'',
						'class_name'=>isset($post['class_name'])?$post['class_name']:'',
						'roll_number'=>isset($post['roll_number'])?$post['roll_number']:'',
						'fee_amount'=>isset($post['fee_amount'])?$post['fee_amount']:'',
						'fee_terms'=>isset($post['fee_terms'])?$post['fee_terms']:'',
						'pay_amount'=>isset($post['pay_amount'])?$post['pay_amount']:'',
						'parent_name'=>isset($post['parent_name'])?$post['parent_name']:'',
						'parent_gender'=>isset($post['parent_gender'])?$post['parent_gender']:'',
						'parent_email'=>isset($post['parent_email'])?$post['parent_email']:'',
						'parent_password'=>isset($post['parent_org_password'])?md5($post['parent_org_password']):'',
						'parent_org_password'=>isset($post['parent_org_password'])?$post['parent_org_password']:'',
						'education'=>isset($post['education'])?$post['education']:'',
						'profession'=>isset($post['profession'])?$post['profession']:'',
						'mobile'=>isset($post['parent_mobile'])?$post['parent_mobile']:'',
						'profile_pic'=>$image,
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'update_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
					);
					//echo '<pre>';print_r($addstudent);exit;
					$save_student=$this->Student_model->save_student($addstudent);
						if(count($save_student)>0){
							$id='100'.$save_student;
						$empid=array('roll_number'=>$id);
						$this->Student_model->update_admission_number($save_student,$empid);
							$pay_details=array(
							's_id'=>isset($save_student)?$save_student:'',
							'school_id'=>isset($detail['s_id'])?$detail['s_id']:'',
							'class_name'=>isset($post['class_name'])?$post['class_name']:'',
							'fee_amount'=>isset($post['fee_amount'])?$post['fee_amount']:'',
							'fee_terms'=>isset($post['fee_terms'])?$post['fee_terms']:'',
							'pay_amount'=>isset($post['pay_amount'])?$post['pay_amount']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$login_details['u_id'],
							);
							$this->Student_model->save_student_fee_payment($pay_details);
							$this->session->set_flashdata('success','Student successfully Added');
							redirect('student/index/'.base64_encode(1));
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('student/index/'.base64_encode(0));
						}
					//echo '<pre>';print_r($addstudent);exit;
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function editpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3 || $login_details['role_id']==8){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$detail=$this->Student_model->get_student_details($post['student_id']);
					if($detail['email']!=$post['email']){
						$check_email=$this->Home_model->check_email_exits($post['email']);
						if(count($check_email)>0){
							$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
							redirect('student/edit/'.base64_encode($post['student_id']));
						}
					}
					if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
						unlink('assets/adminpic/'.$detail['profile_pic']);
						$temp = explode(".", $_FILES["profile_pic"]["name"]);
						$image = round(microtime(true)) . '.' . end($temp);
						move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/adminpic/" . $image);
					}else{
						$image=$detail['profile_pic'];
					}
					if(isset($post['address_same']) && $post['address_same']=='on'){
						$p_add=isset($post['current_address'])?$post['current_address']:'';
						$p_city=isset($post['current_city'])?$post['current_city']:'';
						$p_state=isset($post['current_state'])?$post['current_state']:'';
						$p_country=isset($post['current_country'])?$post['current_country']:'';
						$p_pincode=isset($post['current_pincode'])?$post['current_pincode']:'';
					}else{
						$p_add=isset($post['per_address'])?$post['per_address']:'';
						$p_city=isset($post['per_city'])?$post['per_city']:'';
						$p_state=isset($post['per_state'])?$post['per_state']:'';
						$p_country=isset($post['per_country'])?$post['per_country']:'';
						$p_pincode=isset($post['per_pincode'])?$post['per_pincode']:'';
					}
					$updatestudent=array(
						'name'=>isset($post['name'])?$post['name']:'',
						'dob'=>isset($post['dob'])?$post['dob']:'',
						'email'=>isset($post['email'])?$post['email']:'',
						'gender'=>isset($post['gender'])?$post['gender']:'',
						'address'=>isset($post['current_address'])?$post['current_address']:'',
						'current_city'=>isset($post['current_city'])?$post['current_city']:'',
						'current_state'=>isset($post['current_state'])?$post['current_state']:'',
						'current_country'=>isset($post['current_country'])?$post['current_country']:'',
						'current_pincode'=>isset($post['current_pincode'])?$post['current_pincode']:'',
						'per_address'=>$p_add,
						'per_city'=>$p_city,
						'per_state'=>$p_state,
						'per_country'=>$p_country,
						'per_pincode'=>$p_pincode,
						'blodd_group'=>isset($post['blodd_group'])?$post['blodd_group']:'',
						'password'=>isset($post['confirmpassword'])?md5($post['confirmpassword']):'',
						'org_password'=>isset($post['confirmpassword'])?$post['confirmpassword']:'',
						'doj'=>isset($post['doj'])?$post['doj']:'',
						'class_name'=>isset($post['class_name'])?$post['class_name']:'',
						'fee_amount'=>isset($post['fee_amount'])?$post['fee_amount']:'',
						'fee_terms'=>isset($post['fee_terms'])?$post['fee_terms']:'',
						'pay_amount'=>isset($post['pay_amount'])?$post['pay_amount']:'',
						'parent_name'=>isset($post['parent_name'])?$post['parent_name']:'',
						'parent_gender'=>isset($post['parent_gender'])?$post['parent_gender']:'',
						'parent_email'=>isset($post['parent_email'])?$post['parent_email']:'',
						'education'=>isset($post['education'])?$post['education']:'',
						'profession'=>isset($post['profession'])?$post['profession']:'',
						'mobile'=>isset($post['parent_mobile'])?$post['parent_mobile']:'',
						'profile_pic'=>$image,
						'update_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
					);
					//echo '<pre>';print_r($addstudent);exit;
					$save_student=$this->Home_model->update_profile_details($post['student_id'],$updatestudent);
						if(count($save_student)>0){
							$this->session->set_flashdata('success','Student details successfully Updated');
							redirect('student/index/'.base64_encode(1));
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('student/edit/'.base64_encode($post['student_id']));
						}
					//echo '<pre>';print_r($addstudent);exit;
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public  function status(){
		
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==3 || $login_details['role_id']==8){
					$r_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($r_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'update_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Home_model->update_profile_details($r_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Student successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Student successfully Activate.");
								}
								redirect('student/index/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('student/index/'.base64_encode(1));
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
	public function delete()
	{
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==3 || $login_details['role_id']==8){
					$r_id=base64_decode($this->uri->segment(3));
					if($r_id!=''){
						$detail=$this->Student_model->get_student_details($r_id);
						unlink('assets/adminpic/'.$detail['profile_pic']);
						$statusdata=$this->Student_model->delete_student($r_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Student successfully Deleted.");

								redirect('student/index/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('student/index/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('school');
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
	public  function lists(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				$data['class_list']=$this->Student_model->get_teacher_wise_student_list($login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/student_list',$data);
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
	public  function get_class_wise_student_list(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($post);
				$data['student_list']=$this->Student_model->get_class_wise_student_list($post['class_id'],$login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/student_data',$data);
				$this->load->view('html/footer1');
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	public  function attendence(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				if(isset($post['signup']) && $post['signup']=='Signup'){
					$data['student_list']=$this->Student_model->get_class_wise_subjectwise_student_list($post['class_id']);
					$data['subject_name']=$this->Student_model->get_subject_name($post['subjects']);
					$data['subject_name']['time']=isset($post['time'])?$post['time']:'';
				}else{
					$data['student_list']=array();
					$data['subject_name']=array();
					$data['subject_name']['time']='';
				}
				//echo '<pre>';print_r($data);exit;
				$data['class_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['class_time']=$this->Student_model->get_teacher_wise_time_list($login_details['u_id']);
				$data['subject_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/student_attendence',$data);
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
	public  function get_teacher_class_subjects(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($post);
				$subjects_list=$this->Student_model->get_teacher_class_subjects($post['class_id'],$login_details['u_id']);
				if(count($subjects_list) > 0)
				{
				$data['msg']=1;
				$data['list']=$subjects_list;
				echo json_encode($data);exit;	
				}else{
					$data['msg']=2;
					echo json_encode($data);exit;
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
	public  function attendenceaddpost(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				$cnt=0;foreach($post['student_id'] as $list){
					$get_student_details=$this->Student_model->get_basic_student_details($list);
					//echo '<pre>';print_r($get_student_details);exit;
					$attendence=array(
					's_id'=>$detail['s_id'],
					'student_id'=>$list,
					'class_id'=>$post['class_id'],
					'subject_id'=>$post['subject_id'],
					'attendence'=>$post['attendence'][$cnt],
					'time'=>$post['time'],
					'remarks'=>$post['remarks'][$cnt],
					'teacher_id'=>$login_details['u_id'],
					'created_at'=>date('Y-m-d H:i:s'),
					);
					$previous_attendance=$this->Student_model->get_previous_attendance_reports($list,$post['class_id'],$post['subject_id'],$post['time'],$login_details['u_id']);
					if(($previous_attendance)>0){
						$attendence['update_at']=date('Y-m-d H:i:s');
						$add_attendance=$this->Student_model->update_attendance($previous_attendance['id'],$attendence);
					}else{
						$add_attendance=$this->Student_model->save_student_attendance($attendence);
					}
							if(($add_attendance)>0){
									/* student absent msg purpose*/
									
									/*$address=$get_student_details['scl_bas_name'].', '.$get_student_details['scl_bas_add1'].','.$get_student_details['scl_bas_add2'].','.$get_student_details['scl_bas_city'].','.$get_student_details['scl_bas_state'].'.';
									$msg= 'Your '.$get_student_details['name'].' was absent today WITHOUT PRIOR INFORMATION. Please send your ward with the Leave Letter'.$address;
									$username=$this->config->item('smsusername');
									$pass=$this->config->item('smspassword');
									$mobilesno=$get_student_details['mobile'];
									
									//exit;
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL,"http://bhashsms.com/api/sendmsg.php");
									curl_setopt($ch, CURLOPT_POST, 1);
									curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$username.'&pass='.$pass.'&sender=cartin&phone='.$mobilesno.'&text='.$msg.'&priority=ndnd&stype=normal');
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									//echo '<pre>';print_r($ch);exit;
									$server_output = curl_exec ($ch);*/
									
									/* student absent msg purpose*/
							}
					//echo '<pre>';print_r($attendence);
				$cnt++;}
				
				//exit;
				
				if(count($add_attendance)>0){
					$this->session->set_flashdata('success',"Student Attendence successfully Added.");
					redirect('student/attendence');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('student/attendence');
				}
				
				
				//exit;
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	
	public  function homework(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
			$data['tab']=base64_decode($this->uri->segment(3));

				$post=$this->input->post();
				if(isset($post['signup']) && $post['signup']=='Signup'){
					$data['student_list']=$this->Student_model->get_class_wise_subjectwise_student_list($post['class_id']);
					$data['subject_name']=$this->Student_model->get_subject_name($post['subjects']);
					$data['subject_name']['time']=isset($post['time'])?$post['time']:'';
				}else{
					$data['student_list']=array();
					$data['subject_name']=array();
					$data['subject_name']['time']='';
				}
				//echo '<pre>';print_r($data);exit;
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);

				$data['class_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['class_time']=$this->Student_model->get_teacher_wise_time_list($login_details['u_id']);
				$data['subject_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['home_work_list']=$this->Student_model->get_home_work_list($login_details['u_id'],$detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				
					
				$this->load->view('student/create_home_work',$data);
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

	
	 
	
	public function feelist()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if( $login_details['role_id']==3){
				 
                 $detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				//$data['class_details']=$this->Student_model->class_wise_all_details($post['class_id']);
					//echo'<pre>';print_r($data);exit;
                 // $data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('student/fee_list',$data);
					$this->load->view('html/footer');
					
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
	}
	
public function fee()
	{	
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if( $login_details['role_id']==3){
				 
                 $detail=$this->Student_model->get_resources_details($login_details['u_id']);	
             $detail=$this->Student_model->get_resources_details($login_details['u_id']);		
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);				 
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					
				$data['class_details']=$this->Student_model->class_wise_all_details($post['class_id']);
				//echo'<pre>';print_r($data);exit;
				
					$this->load->view('student/fee_list',$data);
					$this->load->view('html/footer');
					
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}
					
			
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
	}
	public function homeworkpost()
	{
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);

				$save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'subjects'=>isset($post['subjects'])?$post['subjects']:'',
				'work_date'=>isset($post['work_date'])?$post['work_date']:'',
				'work_sub_date'=>isset($post['work_sub_date'])?$post['work_sub_date']:'',
				'work'=>isset($post['work'])?$post['work']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				);
				$save=$this->Student_model->save_home_work_details($save_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($save)>0){
					$this->session->set_flashdata('success',"home work details are successfully added");	
					redirect('student/homeworklist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('student/homework');
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
	public  function homeworklist(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
			$data['tab']=base64_decode($this->uri->segment(3));

				$post=$this->input->post();
				if(isset($post['signup']) && $post['signup']=='Signup'){
					$data['student_list']=$this->Student_model->get_class_wise_subjectwise_student_list($post['class_id']);
					$data['subject_name']=$this->Student_model->get_subject_name($post['subjects']);
					$data['subject_name']['time']=isset($post['time'])?$post['time']:'';
				}else{
					$data['student_list']=array();
					$data['subject_name']=array();
					$data['subject_name']['time']='';
				}
				//echo '<pre>';print_r($data);exit;
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);

				$data['class_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['class_time']=$this->Student_model->get_teacher_wise_time_list($login_details['u_id']);
				$data['subject_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['home_work_list']=$this->Student_model->get_home_work_list($login_details['u_id'],$detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				
					
				$this->load->view('student/home_work_list',$data);
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
	public  function homeworkedit(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				
				//echo '<pre>';print_r($data);exit;
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['class_list']=$this->Student_model->get_teacher_wise_class_list($login_details['u_id']);
				$data['class_time']=$this->Student_model->get_teacher_wise_time_list($login_details['u_id']);
				$data['edit_home_work']=$this->Student_model->get_edit_home_work($detail['s_id'],base64_decode($this->uri->segment(3)));
				$data['subject_list']=$this->Student_model->get_teacher_class_subjects($data['edit_home_work']['class_id'],$login_details['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/edit_home_work',$data);
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
public function edithomeworkpost()
	{
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==6){
				
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
			$detail=$this->Student_model->get_resources_details($login_details['u_id']);

				$save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'subjects'=>isset($post['subjects'])?$post['subjects']:'',
				'work_date'=>isset($post['work_date'])?$post['work_date']:'',
				'work_sub_date'=>isset($post['work_sub_date'])?$post['work_sub_date']:'',
				'work'=>isset($post['work'])?$post['work']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				);
				$update=$this->Student_model->upadte_home_work_details($post['h_w_id'],$save_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($update)>0){
					$this->session->set_flashdata('success',"home work details are successfully updated");	
					redirect('student/homeworklist');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('student/homeworklist');
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
	
	 public function homeworkstatus()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==6){
					//echo'<pre>';print_r($login_details);exit;  
				$h_w_id=base64_decode ($this->uri->segment(3));
	            $status=base64_decode ($this->uri->segment(4));
					if($status==1){
	                 $stain=0;
					 }else{
						 $stain=1;
					 }
				if($h_w_id!=''){
					$staindata=array(
							'status'=> $stain,
							'upate_at'=>date('Y-m-d H:i:s')
							);
							 //echo'<pre>';print_r($staindata );exit;  
						$statusdetails =$this->Student_model->upadte_home_work_details($h_w_id,$staindata);
						 //echo'<pre>';print_r($statusdetails );exit;  
					      if(count($statusdetails)>0){
							 if($status==1){
								$this->session->set_flashdata('success',"home work details  successfully Deactivated.");
								}else{
									$this->session->set_flashdata('success',"home work details  successfully Activated.");
								}
							
							redirect('student/homeworklist');			  					  
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('hostelmanagement/allocateroom/'.base64_encode(1));	
						}						
					   }else{
						 $this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('student/homeworklist');
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
	public function homeworkdelete()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==6){
				$h_w_id=base64_decode ($this->uri->segment(3));	 
						$deletedetails =$this->Student_model->delete_home_work_details($h_w_id);
						 //echo'<pre>';print_r($deletedetails );exit;  
					      if(count($deletedetails)>0){
							 $this->session->set_flashdata('success',"home work details successfully Deleted.");
								
							redirect('student/homeworklist');			  					  
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('student/homeworklist');	
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
		
	public function prints(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$post=$this->input->post();
					$student=base64_decode($this->uri->segment(3));
					$filename=$student;
					$data['student_list']=$this->Student_model->get_student_details($student);
					//echo'<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name = '22'.'12_11.pdf';                
					$data['page_title'] = $data['student_list']['name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/students/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('student/student_details_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/students/".$file_name);
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}	
		
		public function details()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==7){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['student_details']=$this->Student_model->get_student_details($login_details['u_id']);
				$data['school_details']=$this->School_model->get_school_basic_details_with_resourse($login_details['u_id']);
				$data['student_list']=$this->Student_model->get_student_wise_list($data['school_details']['u_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/student-details',$data);
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
	public function editdetails()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==7){
				$student_id=base64_decode($this->uri->segment(3));
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['student_list']=$this->Student_model->get_student_details($student_id);
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('student/edit-student-details',$data);
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
	
	public function editdetailspost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==7){
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				//echo'<pre>';print_r($_FILES);exit;
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$student_list=$this->Student_model->get_student_details($post['u_id']);
				if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
						unlink('assets/adminpic/'.$detail['profile_pic']);
						$temp = explode(".", $_FILES["profile_pic"]["name"]);
						$image = round(microtime(true)) . '.' . end($temp);
						move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/adminpic/" . $image);
					}else{
						$image=$student_list['profile_pic'];
					}
					if(isset($post['address_same']) && $post['address_same']=='on'){
						$p_add=isset($post['current_address'])?$post['current_address']:'';
						$p_city=isset($post['current_city'])?$post['current_city']:'';
						$p_state=isset($post['current_state'])?$post['current_state']:'';
						$p_country=isset($post['current_country'])?$post['current_country']:'';
						$p_pincode=isset($post['current_pincode'])?$post['current_pincode']:'';
					}else{
						$p_add=isset($post['per_address'])?$post['per_address']:'';
						$p_city=isset($post['per_city'])?$post['per_city']:'';
						$p_state=isset($post['per_state'])?$post['per_state']:'';
						$p_country=isset($post['per_country'])?$post['per_country']:'';
						$p_pincode=isset($post['per_pincode'])?$post['per_pincode']:'';
					}
					$updatestudent=array(
						'name'=>isset($post['name'])?$post['name']:'',
						'dob'=>isset($post['dob'])?$post['dob']:'',
						'email'=>isset($post['email'])?$post['email']:'',
						'gender'=>isset($post['gender'])?$post['gender']:'',
						'address'=>isset($post['current_address'])?$post['current_address']:'',
						'current_city'=>isset($post['current_city'])?$post['current_city']:'',
						'current_state'=>isset($post['current_state'])?$post['current_state']:'',
						'current_country'=>isset($post['current_country'])?$post['current_country']:'',
						'current_pincode'=>isset($post['current_pincode'])?$post['current_pincode']:'',
						'per_address'=>$p_add,
						'per_city'=>$p_city,
						'per_state'=>$p_state,
						'per_country'=>$p_country,
						'per_pincode'=>$p_pincode,
						'blodd_group'=>isset($post['blodd_group'])?$post['blodd_group']:'',
						'doj'=>isset($post['doj'])?$post['doj']:'',
						'class_name'=>isset($post['class_name'])?$post['class_name']:'',
						'fee_amount'=>isset($post['fee_amount'])?$post['fee_amount']:'',
						'fee_terms'=>isset($post['fee_terms'])?$post['fee_terms']:'',
						'pay_amount'=>isset($post['pay_amount'])?$post['pay_amount']:'',
						'parent_name'=>isset($post['parent_name'])?$post['parent_name']:'',
						'parent_gender'=>isset($post['parent_gender'])?$post['parent_gender']:'',
						'parent_email'=>isset($post['parent_email'])?$post['parent_email']:'',
						'education'=>isset($post['education'])?$post['education']:'',
						'profession'=>isset($post['profession'])?$post['profession']:'',
						'mobile'=>isset($post['parent_mobile'])?$post['parent_mobile']:'',
						'profile_pic'=>$image,
						'update_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
					);
					//echo '<pre>';print_r($updatestudent);exit;
					$update=$this->Home_model->update_profile_details($post['u_id'],$updatestudent);
						if(count($update)>0){
							$this->session->set_flashdata('success','Student details successfully Updated');
							redirect('student/details');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('student/details');
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
		

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
