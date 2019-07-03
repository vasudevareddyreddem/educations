<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Classwise extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Student_model');
			$this->load->model('Subject_model');
	}
	
	public function subjects()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['tab']=base64_decode($this->uri->segment(3));
				$data['school_details']=$this->School_model->get_school_basic_details_with_u_id($login_details['u_id']);
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				$data['subjects_list']=$this->School_model->get_school_subjects_list($detail['s_id']);
				$data['class_wise_subjects']=$this->Subject_model->get_class_wise_subjects_list($detail['s_id']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('school/add-subject',$data);
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
	
	public function addsubjectpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			foreach($post['subject'] as $list){ 
						$check=$this->Subject_model->check_subject($post['class_id'],ucfirst($list));
						if(count($check)>0){
							$this->session->set_flashdata('error',"Subject already exist. Please try again.");
							redirect('classwise/subjects');
						}
					
					}
			
			foreach($post['subject'] as $list){ 
			$save_data=array(
			's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
			'class_id'=>isset($post['class_id'])?$post['class_id']:'',
			'subject'=>ucfirst($list),
			'status'=>1,
			'create_at'=>date('Y-m-d H:i:s'),
			'update_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
			);
				
			$this->Subject_model->save_class_subjects($save_data);
			}
		//echo '<pre>';print_r($save);exit;
		$this->session->set_flashdata('success',"Classwise subjects successfully added");	
		redirect('classwise/subjects/'.base64_encode(1));	
				
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function editsubject()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);

				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
			$data['edit_class_wise_subjects']=$this->Subject_model->edit_class_wise_subject_list($detail['s_id'],base64_decode($this->uri->segment(3)));	

				//echo '<pre>';print_r($data);exit;
				$this->load->view('school/edit-subject',$data);
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
	public function editsubjectpost()
	{
	if($this->session->userdata('userdetails'))
		{	
		$login_details=$this->session->userdata('userdetails');
		if($login_details['role_id']==3){

        $post=$this->input->post();

		$detail=$this->Student_model->get_resources_details($login_details['u_id']);
		$edit_class_wise_subjects=$this->Subject_model->edit_class_wise_subject_list($detail['s_id'],$post['id']);	
				//echo '<pre>';print_r($edit_class_wise_subjects);exit;
		if($edit_class_wise_subjects['class_id']!=$post['class_id']  || $edit_class_wise_subjects['subject']!=$post['subject']){
				$check=$this->Subject_model->check_subject($post['class_id'],$post['subject']);
					if(count($check)>0){
						$this->session->set_flashdata('error',"Subject already exist. Please try again.");
						redirect('classwise/editsubject/'.base64_encode($post['id']));
					}
			}		
         $update_data=array(
		 's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
			'class_id'=>isset($post['class_id'])?$post['class_id']:'',
			'subject'=>isset($post['subject'])?$post['subject']:'',
			'update_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
			);
		//echo '<pre>';print_r($update_data);exit;
		$update=$this->Subject_model->update_class_wise_subjects_details($post['id'],$update_data);	
			if(count($update)>0){
			$this->session->set_flashdata('success',"Classwise subjects successfully updated");	
			redirect('classwise/subjects/'.base64_encode(1));	
			
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('classwise/subjects/'.base64_encode(1));
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
	public  function subjectstatus(){
		
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
					$id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'update_at'=>date('Y-m-d H:i:s')
							);
							$statusdata= $this->Subject_model->update_class_wise_subjects_details($id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Class wise Subject successfully Deactivated.");
								}else{
									$this->session->set_flashdata('success',"Class wise Subject successfully Activated.");
								}
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('classwise/subjects/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('classwise/subjects/'.base64_encode(1));
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
	public function subjectdelete()
	{
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=2){
					$id=base64_decode($this->uri->segment(3));
					
							$deletedata= $this->Subject_model->delete_class_wise_subject($id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"Subject successfully Deleted.");
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('classwise/subjects/'.base64_encode(1));
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
	
	
	/* subjects
	public function subjects()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['tab']=base64_decode($this->uri->segment(3));
				$data['school_details']=$this->School_model->get_school_basic_details_with_u_id($login_details['u_id']);
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				$data['subjects_list']=$this->School_model->get_school_subjects_list($detail['s_id']);
				$subject_id=base64_decode($this->uri->segment(4));
				if($subject_id!=''){
					$data['details']=$this->School_model->get_subject_details($subject_id);
				}else{
					$data['details']=array();
				}
				//echo '<pre>';print_r($data);exit;
				$this->load->view('school/add-subject',$data);
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
	public function addsubjectpost(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=2){
				$post=$this->input->post();
				
				//echo '<pre>';print_r($post);exit;
				$detail=$this->School_model->get_resources_details($login_details['u_id']);
				
				if(isset($post['subject_id']) && $post['subject_id']!=''){
					$subject_detais=$this->School_model->get_subject_details($post['subject_id']);
					if($subject_detais['class_id'] !=$post['class_id'] || $subject_detais['subject'] !=$post['subject']){
						$check=$this->School_model->check_subject_name_exits($detail['s_id'],$post['class_id'],$post['subject']);
						if(count($check)>0){
							$this->session->set_flashdata('error',"Subject already exists. Please try again.");
							redirect('classwise/subjects/'.base64_encode(0));
						}
					}
					$update_subject=array(
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'subject'=>isset($post['subject'])?$post['subject']:'',
						'update_at'=>date('Y-m-d H:i:s'),
						);
						$updatedata=$this->School_model->update_subject_details($post['subject_id'],$update_subject);
						if(count($updatedata)>0){
								$this->session->set_flashdata('success',"Subject successfully Updated.");
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('classwise/subjects/'.base64_encode(0));
							}
					
				}else{
						$check=$this->School_model->check_subject_name_exits($detail['s_id'],$post['class_id'],$post['subject']);
						if(count($check)>0){
							$this->session->set_flashdata('error',"Subject already exists. Please try again.");
							redirect('classwise/subjects/'.base64_encode(0));
						}
						$class_subject=array(
						's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'subject'=>isset($post['subject'])?$post['subject']:'',
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
						);
						$addclass_teacher=$this->School_model->save_class_subject($class_subject);
						if(count($addclass_teacher)>0){
								$this->session->set_flashdata('success',"Subject successfully added.");
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('classwise/subjects/'.base64_encode(0));
							}
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
	public  function subjectstatus(){
		
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=2){
					$s_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($s_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'update_at'=>date('Y-m-d H:i:s')
							);
							$statusdata= $this->School_model->update_subject_details($s_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Subject successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Subject successfully Activate.");
								}
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('classwise/subjects/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('classwise/subjects/'.base64_encode(1));
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
	public function subjectdelete()
	{
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=2){
					$s_id=base64_decode($this->uri->segment(3));
					if($s_id!=''){
							$statusdata= $this->School_model->delete_class_subject($s_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Subject successfully Deleted.");
								redirect('classwise/subjects/'.base64_encode(1));
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('classwise/subjects/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('classwise/subjects/'.base64_encode(1));
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
	/* subject*/
	
	public function prints()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
			$data['time_slot_list']=$this->Student_model->class_wise_time_slot_details($post['class_id']);
			//echo '<pre>';print_r($data);exit;
			
				//$data['time_slot_list']=$this->School_model->get_all_time_slot_list($detail['s_id']);
					
				
				$path = rtrim(FCPATH,"/");
					$file_name = '22'.$post['class_id'].'.pdf';                
					$data['page_title'] = $data['time_slot_list']['name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/classlist/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('school/classlistpdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/classlist/".$file_name);
				
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	
	public function get_student_subject_list(){
	if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==3){
					$post=$this->input->post();
					$subject_list=$this->Subject_model->get_class_wise_subjects($post['class_id']);
					// echo'<pre>';print_r($subject_list);exit;
					 //echo $this->db->last_query();exit;
					if(count($subject_list)>0){
						$data['msg']=1;
						$data['list']=$subject_list;
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
	
	
	public function timetable()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$data['tab']=base64_decode($this->uri->segment(3));
				$data['school_details']=$this->School_model->get_school_basic_details_with_u_id($login_details['u_id']);
				$data['role_list']=$this->Home_model->get_roles_list();
				$data['student_list']=$this->Student_model->get_student_list($login_details['u_id']);
				$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
				$data['teachers_list']=$this->School_model->get_all_class_teachers_list($detail['s_id']);
				$data['timings_list']=$this->School_model->get_all_timings_list($detail['s_id']);
				//$data['subjects_list']=$this->School_model->get_all_subjects_list_list($detail['s_id']);
				$data['time_slot_list']=$this->School_model->get_all_time_slot_list($detail['s_id']);
				$timeslot_id=base64_decode($this->uri->segment(4));
				if($timeslot_id!=''){
					$data['details']=$this->School_model->get_timeslot_id_details($timeslot_id);
                    $data['subjects_list']=$this->Subject_model->get_class_wise_subjects($data['details']['class_id']);

				}else{
					$data['details']=array();
				}
				//echo '<pre>';print_r($data);exit;

				$this->load->view('school/add-timetable',$data);
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
	public  function addtimeslot(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']==3){
				$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				if(isset($post['timeslot_id']) && $post['timeslot_id']!=''){
					$details=$this->School_model->get_timeslot_id_details($post['timeslot_id']);
					
					//echo '<pre>';print_r($details);exit;
						$check=$this->School_model->check_time_slote_exits($post['day'],$post['time'],$post['class_id'],$post['teacher']);
						if(count($check)>0){
						$this->session->set_flashdata('error',"Time slot already exists. Please try again.");
						redirect('classwise/timetable/'.base64_encode(0).'/'.base64_encode($post['timeslot_id']));
						}
				
					//echo '<pre>';print_r($check);exit;
					$class_times=array(
						'day'=>isset($post['day'])?$post['day']:'',
						'time'=>isset($post['time'])?$post['time']:'',
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'subject'=>isset($post['subject'])?$post['subject']:'',
						'teacher'=>isset($post['teacher'])?$post['teacher']:'',
						'update_at'=>date('Y-m-d H:i:s'),
						);
						$update= $this->School_model->update_time_slote_details($post['timeslot_id'],$class_times);
							//echo $this->db->last_query();exit;
							if(count($update)>0){
									$this->session->set_flashdata('success',"Time slot successfully updated.");
									redirect('classwise/timetable/'.base64_encode(0));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('classwise/timetable/'.base64_encode(0).'/'.base64_encode($post['timeslot_id']));
							}
				}else{
					$check=$this->School_model->check_time_slote_exits($post['day'],$post['time'],$post['class_id'],$post['teacher']);
					if(count($check)>0){
						$this->session->set_flashdata('error',"Time slot already exists. Please try again.");
						redirect('classwise/timetable/'.base64_encode(0));
					}
					$class_times=array(
						's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
						'day'=>isset($post['day'])?$post['day']:'',
						'time'=>isset($post['time'])?$post['time']:'',
						'class_id'=>isset($post['class_id'])?$post['class_id']:'',
						'subject'=>isset($post['subject'])?$post['subject']:'',
						'teacher'=>isset($post['teacher'])?$post['teacher']:'',
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$login_details['u_id'],
						);
						$addclass_slote=$this->School_model->save_class_time_slot($class_times);
						if(count($addclass_slote)>0){
								$this->session->set_flashdata('success',"Time Slot successfully added.");
								redirect('classwise/timetable/'.base64_encode(1));
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('classwise/timetable/'.base64_encode(0));
							}
							
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
	public  function timeslottatus(){
		
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=3){
					$c_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($c_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'update_at'=>date('Y-m-d H:i:s')
							);
							$statusdata= $this->School_model->update_time_slote_details($c_id,$stusdetails);
							//echo $this->db->last_query();exit;
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Time slot succcessfully  deactivated.");
								}else{
									$this->session->set_flashdata('success',"Time slot successfully activated.");
								}
								redirect('classwise/timetable/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('classwise/timetable/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('classwise/timetable/'.base64_encode(1));
					}
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('home');
		}
		
	}public function timeslotdelete()
	{
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
			if($login_details['role_id']=3){
					$c_id=base64_decode($this->uri->segment(3));
					if($c_id!=''){
							$statusdata= $this->School_model->delete_timeslote($c_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Time successfully Deleted.");
								redirect('classwise/timetable/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('classwise/timetable/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('classwise/timetable/'.base64_encode(1));
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
	// payment page
	
	
	
	
}
