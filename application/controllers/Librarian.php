<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Librarian extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Librarian_model');
			$this->load->model('Student_model');
	}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$this->load->view('librarian/attendence-report');
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
	public function add_book()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					//echo'<pre>';print_r($login_details);exit;
					
					$details=$this->Librarian_model->libray_values($login_details['u_id']);
					//echo'<pre>';print_r($details);exit;
				
            $data['book_list']=$this->Librarian_model->book_list_order($details['s_id']);
				//echo'<pre>';print_r($data);exit;
					
					
					$data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('librarian/add-book',$data);
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
	public function add_book_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
						//echo'<pre>';print_r($login_details);exit;
				$post=$this->input->post();	
				//echo'<pre>';print_r($post);exit;
				$details=$this->Librarian_model->libray_values($login_details['u_id']);
					//echo'<pre>';print_r($details);exit;
		$check_book_exit=$this->Librarian_model->check_book_already($details['s_id'],$post['book_number']);
				//echo'<pre>';print_r($check_book_exit);exit;
				if(count($check_book_exit)>0){
					$this->session->set_flashdata('error',"Book already taken");
					redirect('librarian/add-book');
				}	
					
				$save_data=array(
				's_id'=>isset($details['s_id'])?$details['s_id']:'',
				'book_number'=>isset($post['book_number'])?$post['book_number']:'',
				'book_title'=>isset($post['book_title'])?$post['book_title']:'',
				'author_name'=>isset($post['author_name'])?$post['author_name']:'',
				'publisher'=>isset($post['publisher'])?$post['publisher']:'',
				'category'=>isset($post['category'])?$post['category']:'',
				'isbn'=>isset($post['isbn'])?$post['isbn']:'',
				'date'=>isset($post['date'])?$post['date']:'',
				'price'=>isset($post['price'])?$post['price']:'',
				'qty'=>isset($post['qty'])?$post['qty']:'',
				'shelf_no'=>isset($post['shelf_no'])?$post['shelf_no']:'',
				'department'=>isset($post['department'])?$post['department']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
				//echo'<pre>';print_r($save_data);exit;	
				$save=$this->Librarian_model->book_details($save_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($save)>0){
					$this->session->set_flashdata('success',"add book details are successfully register");	
					redirect('librarian/add-book/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('librarian/add-book');
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
	public function edit()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					//echo'<pre>';print_r($login_details);exit;
					
				 $this->uri->segment(3);
		  //echo'<pre>';print_r($login_details);exit;
		  $details=$this->Librarian_model->libray_values($login_details['u_id']);
					//echo'<pre>';print_r($details);exit;
				
       $data['book']=$this->Librarian_model->book_list_details($details['s_id'],base64_decode($this->uri->segment(3)));
		//echo'<pre>';print_r($data);exit;
			
		  $this->load->view('librarian/edit_add_book',$data);
		
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
				if($login_details['role_id']==10){
			//echo'<pre>';print_r($login_details);exit;
				$post=$this->input->post();	
				//echo'<pre>';print_r($post);exit;
		$book_number=$this->Librarian_model->book_number_exit_details($post['b_id']);		 
				//echo'<pre>';print_r($book_number);exit; 
				if($book_number['book_number']!=$post['book_number']){
		$book_list=$this->Librarian_model->book_number_book_name($post['book_number']);		 
				 //echo'<pre>';print_r($book_list);exit; 
				if(count($book_list)>0){
					 $this->session->set_flashdata('error',"book name alreay taken");
					 redirect('librarian/edit/'.base64_encode($post['b_id']));
			      }	
			}
				$user_data=array(
				'book_number'=>isset($post['book_number'])?$post['book_number']:'',
				'book_title'=>isset($post['book_title'])?$post['book_title']:'',
				'author_name'=>isset($post['author_name'])?$post['author_name']:'',
				'publisher'=>isset($post['publisher'])?$post['publisher']:'',
				'category'=>isset($post['category'])?$post['category']:'',
				'isbn'=>isset($post['isbn'])?$post['isbn']:'',
				'date'=>isset($post['date'])?$post['date']:'',
				'price'=>isset($post['price'])?$post['price']:'',
				'qty'=>isset($post['qty'])?$post['qty']:'',
				'shelf_no'=>isset($post['shelf_no'])?$post['shelf_no']:'',
				'department'=>isset($post['department'])?$post['department']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
				//echo'<pre>';print_r($user_data);exit;
				$update=$this->Librarian_model->update_book_details($post['b_id'],$user_data);
				//echo'<pre>';print_r($update);exit;
				if(count($update)>0){
							$this->session->set_flashdata('success','books details successfully Updated');
							redirect('librarian/add_book/'.base64_encode(1));
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('librarian/edit/'.base64_encode($post['b_id']));
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
				if($login_details['role_id']==10){
				$b_id=base64_decode ($this->uri->segment(3));
	            $status=base64_decode ($this->uri->segment(4));
					if($status==1){
	                 $stain=0;
					 }else{
						 $stain=1;
					 }
				if($b_id!=''){
					$staindata=array(
							'status'=> $stain,
							'create_at'=>date('Y-m-d H:i:s')
							);
							 //echo'<pre>';print_r($staindata );exit;  
			$statusdetails =$this->Librarian_model->status_details_data($b_id,$staindata);
						 //echo'<pre>';print_r($statusdetails );exit;  
					      if(count($statusdetails)>0){
						$this->session->set_flashdata('sucess',"status  successfully");
				redirect('librarian/add_book/'.base64_encode(1));			  					  
	              }	  
	   }else{
		 $this->session->set_flashdata('error',"techincal problem");
              redirect('librarian/add_book/'.base64_encode($b_id));
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
	public function delete()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$b_id=base64_decode($this->uri->segment(3));
		
		  $delete_details =$this->Librarian_model->delete_details_data($b_id);
						 //echo'<pre>';print_r($delete_details);exit;  			
				if(count($delete_details)>0){
		$this->session->set_flashdata('sucess'," delete successfully");
	    redirect('librarian/add_book/'.base64_encode(1));			
		}else{
			$this->session->set_flashdata('error',"problem is occurs");
			redirect('librarian/add_book/'.base64_encode($b_id));
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

	public function issue_book()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
					$data['issued_book_list']=$this->Librarian_model->get_issued_book_list($detail['s_id']);
					$data['book_list']=$this->Librarian_model->get_book_list($detail['s_id']);
					$data['tab']=base64_decode($this->uri->segment(3));
					//echo '<pre>';print_r($data);exit;
					$this->load->view('librarian/issue-book',$data);
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
	public function issue_book_post()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
						//echo'<pre>';print_r($login_details);exit;
				$post=$this->input->post();	
				$check_book_exits=$this->Librarian_model->check_book_already_issued($detail['s_id'],$post['student_id'],$post['book_number']);
				//echo'<pre>';print_r($check_book_exits);exit;
				if(count($check_book_exits)>0){
					$this->session->set_flashdata('error',"Book already issued with this student. Please issue another book");
					redirect('librarian/issue_book');
				}
				//echo'<pre>';print_r($post);exit;
				$save_data=array(
				's_id'=>isset($detail['s_id'])?$detail['s_id']:'',
				'barcode_id'=>isset($post['book_id'])?$post['book_id']:'',
				'student_id'=>isset($post['student_id'])?$post['student_id']:'',
				'class_id'=>isset($post['class_id'])?$post['class_id']:'',
				'b_id'=>isset($post['book_number'])?$post['book_number']:'',
				'no_of_books_taken'=>isset($post['no_of_books'])?$post['no_of_books']:'',
				'issued_date'=>isset($post['date'])?$post['date']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>isset($login_details['u_id'])?$login_details['u_id']:''
				 );
				//echo'<pre>';print_r($save_data);exit;	
				$save=$this->Librarian_model->save_issued_book($save_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($save)>0){
					$this->session->set_flashdata('success'," book issued successfully");	
					redirect('librarian/issue_book/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('librarian/issue_book/');
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
	
	public function get_student_list_class_wise(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$post=$this->input->post();
					$student_list=$this->Librarian_model->get_classwise_student_list($post['class_id']);
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
						redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	public function get_student_issued_book_list(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$post=$this->input->post();
					$book_list=$this->Librarian_model->get_student_issued_books_list($post['student_id']);
					if(count($book_list)>0){
						$data['msg']=1;
						$data['list']=$book_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
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
	public function get_book_issued_date(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$detail=$this->Librarian_model->get_resources_details($login_details['u_id']);
					$lib_due_days=$this->Librarian_model->get_school_lib_due_hours($detail['s_id']);
					$post=$this->input->post();
					$book_details=$this->Librarian_model->get_issued_book_details($post['book_id']);
					if(count($book_details)>0){
						if($lib_due_days['lib_book_due_time']){
							
						}else{
							
							}
						$data['msg']=1;
						$data['list']=$book_details;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
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
	
	public function return_book()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
					$data['book_list']=$this->Librarian_model->get_book_list($detail['s_id']);
					$data['tab']=base64_decode($this->uri->segment(3));
					$this->load->view('librarian/return-book',$data);
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
	public function return_book_list()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$this->load->view('librarian/return-book-list');
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
	public function book_damage()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					//echo'<pre>';print_r($login_details);exit;
					
					$this->load->view('librarian/book-damage');
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
