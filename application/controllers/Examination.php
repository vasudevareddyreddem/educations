<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Examination extends In_frontend {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Examination_model');		
	
	}
	public function create()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			//echo '<pre>';print_r($admindetails);exit;
			if($login_details['role_id']==9){
				$detail=$this->School_model->get_resources_details($login_details['u_id']);
				$data['class_list']=$this->School_model->get_all_class_list($detail['s_id']);
				$data['subject_list']=$this->Examination_model->get_subject_list($detail['s_id']);
				$data['times_list']=$this->Examination_model->get_time_list($detail['s_id']);
				$data['teachers_list']=$this->Examination_model->get_teacher_list_list($detail['s_id']);
				$data['exam_time_table_list']=$this->Examination_model->get_exam_time_table_list($detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('examination/create-exam',$data);	
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
	public function edit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			//echo '<pre>';print_r($admindetails);exit;
			if($login_details['role_id']==9){
				$exam_id=base64_decode($this->uri->segment(3));
				$detail=$this->School_model->get_resources_details($login_details['u_id']);
				$data['class_list']=$this->School_model->get_all_class_list($detail['s_id']);
				$data['subject_list']=$this->Examination_model->get_subject_list($detail['s_id']);
				$data['times_list']=$this->Examination_model->get_time_list($detail['s_id']);
				$data['teachers_list']=$this->Examination_model->get_teacher_list_list($detail['s_id']);
				$data['detail']=$this->Examination_model->get_exam_time_table_details($exam_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('examination/edit-exam',$data);	
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
	public function createpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			$detail=$this->School_model->get_resources_details($login_details['u_id']);

			if($login_details['role_id']==9){
				$post=$this->input->post();
				$check=$this->Examination_model->check_exam_exits($post['exam_type'],$post['class_id'],$post['subject'],$post['exam_date'],$detail['s_id']);
					if(count($check)>0){
						$this->session->set_flashdata('error',"Exam already exists. Please try again once");
						redirect('examination/create');
					}
				$addexam=array(
				's_id'=>$detail['s_id'],
				'exam_type'=>isset($post['exam_type'])?$post['exam_type']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'subject'=>isset($post['subject'])?$post['subject']:'',
				'exam_date'=>isset($post['exam_date'])?$post['exam_date']:'',
				'start_time'=>isset($post['start_time'])?$post['start_time']:'',
				'to_time'=>isset($post['to_time'])?$post['to_time']:'',
				'room_no'=>isset($post['room_no'])?$post['room_no']:'',
				'teacher_id'=>isset($post['teacher_id'])?$post['teacher_id']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>$login_details['u_id'],
				);
				
				$save_exam=$this->Examination_model->save_exam($addexam);
				if(count($save_exam)>0){
					$this->session->set_flashdata('success',"Exam successfully added.");
					redirect('examination/create');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('examination/create');
				}
				//echo '<pre>';print_r($post);exit;
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	public function editpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			$detail=$this->School_model->get_resources_details($login_details['u_id']);

			if($login_details['role_id']==9){
				$post=$this->input->post();
				$exam_detail=$this->Examination_model->get_exam_time_table_details($post['exam_id']);

				if($exam_detail['exam_type']!=$post['exam_type'] || $exam_detail['class_id']!=$post['class_id'] || $exam_detail['subject']!=$post['subject'] || $exam_detail['exam_date']!=$post['exam_date']){
					$check=$this->Examination_model->check_exam_exits($post['exam_type'],$post['class_id'],$post['subject'],$post['exam_date'],$detail['s_id']);
					if(count($check)>0){
						$this->session->set_flashdata('error',"Exam already exists. Please try again once");
						redirect('examination/create');
					}
				}
				$updateexam=array(
				'exam_type'=>isset($post['exam_type'])?$post['exam_type']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'subject'=>isset($post['subject'])?$post['subject']:'',
				'exam_date'=>isset($post['exam_date'])?$post['exam_date']:'',
				'start_time'=>isset($post['start_time'])?$post['start_time']:'',
				'to_time'=>isset($post['to_time'])?$post['to_time']:'',
				'room_no'=>isset($post['room_no'])?$post['room_no']:'',
				'teacher_id'=>isset($post['teacher_id'])?$post['teacher_id']:'',
				'status'=>1,
				'update_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Examination_model->update_exam_details($post['exam_id'],$updateexam);
				if(count($update)>0){
					$this->session->set_flashdata('success',"Exam successfully Updated.");
					redirect('examination/create');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('examination/create');
				}
				//echo '<pre>';print_r($post);exit;
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
	}
	public  function marks(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==9){
				$detail=$this->School_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
				if(isset($post['signup'])&& $post['signup']=='submit'){
					$data['student_list']=$this->Examination_model->get_student_list($post['class_id']);
					$data['subject_name']=$this->Examination_model->get_student_name($post['subject']);
					$data['exam_name']=$this->Examination_model->get_exam_name($post['exam_type']);
					//echo '<pre>';print_r($data);exit;
				}
				$data['class_list']=$this->School_model->get_all_class_list($detail['s_id']);
				$data['subject_list']=$this->Examination_model->get_subject_list($detail['s_id']);
				$data['exam_list']=$this->Examination_model->get_exam_subject_list($detail['s_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('examination/add-marks',$data);
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
	public  function viewmarks(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==8 || $login_details['role_id']==9){
				$detail=$this->School_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
				if(isset($post['signup'])&& $post['signup']=='submit'){
					$data['student_list']=$this->Examination_model->get_student_withmarks_list($detail['s_id'],$post['class_id'],$post['subject'],$post['exam_type']);
				//echo $this->db->last_query();
					//echo '<pre>';print_r($data);exit;
				}
				$data['student_name_list']=$this->Examination_model->get_all_student_name_list($detail['s_id']);
				//echo '<pre>';print_r($data['student_name_list']);exit;
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				$data['subject_list']=$this->Examination_model->get_subject_list($detail['s_id']);
				$data['exam_list']=$this->Examination_model->get_exam_subject_wise_list($detail['s_id']);
				//echo '<pre>';print_r($data['subject_list']);exit;
				$this->load->view('examination/view-marks',$data);
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
	
	public  function addmarks(){
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==9){
					$post=$this->input->post();
					$detail=$this->School_model->get_resources_details($login_details['u_id']);
					$cnt=0;foreach($post['marks_obtained'] as $list){
						$add_marks=array(
						's_id'=>$detail['s_id'],
						'student_id'=>isset($post['student_id'][$cnt])?$post['student_id'][$cnt]:'',
						'exam_id'=>isset($post['exam_id'])?$post['exam_id']:'',
						'subject_id'=>isset($post['subject_id'])?$post['subject_id']:'',
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'marks_obtained'=>isset($post['marks_obtained'][$cnt])?$post['marks_obtained'][$cnt]:'',
						'max_marks'=>isset($post['max_marks'][$cnt])?$post['max_marks'][$cnt]:'',
						'remarks'=>isset($post['remarks'][$cnt])?$post['remarks'][$cnt]:'',
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
						);
						//echo '<pre>';print_r($add_marks);exit;
						$cnt.$check=$this->Examination_model->chekck_martks_entered($post['student_id'][$cnt],$detail['s_id'],$post['exam_id'],$post['subject_id'],$post['class_id']);
						if(count($check)>0){
							$save_marks=$this->Examination_model->update_exam_mark($check['id'],$add_marks);
						}else{
							$save_marks=$this->Examination_model->save_exam_mark($add_marks);
						}
						
						
					$cnt++;}
					
					
					if(count($save_marks)>0){
						$this->session->set_flashdata('success',"Student Marks successfully added.");
						redirect('examination/marks');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('examination/marks');
					}
					//echo '<pre>';print_r($post);exit;
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
	}
	public  function status(){
		
		if($this->session->userdata('userdetails'))
		{
		$login_details=$this->session->userdata('userdetails');

			if($login_details['role_id']==9){
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
							$statusdata=$this->Examination_model->update_exam_details($r_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Exam successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Exam successfully Activate.");
								}
								redirect('examination/create');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('examination/create');
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

			if($login_details['role_id']==9){
					$r_id=base64_decode($this->uri->segment(3));
					if($r_id!=''){
						$statusdata=$this->Examination_model->delete_exam($r_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Exam successfully Deleted.");

								redirect('examination/create');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('examination/create');
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
	public function class_student_list(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$post=$this->input->post();
					$student_list=$this->Examination_model->class_wise_student_list($post['class_id']);
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
	
	public function get_student_allsubjects_list(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==8){
					$post=$this->input->post();
					$student_list=$this->Examination_model->get_student_allsubjects_list($post['student_id']);
					echo'<pre>';print_r($student_list);exit;
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
	
	
	
}
