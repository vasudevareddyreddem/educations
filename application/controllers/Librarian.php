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
				
					
				$save_data=array(
                's_id'=>$details['s_id'],
				'book_number'=>$post['book_number'],
				'book_title'=>$post['book_title'],
				'author_name'=>$post['author_name'],
				'publisher'=>$post['publisher'],
				'category'=>$post['category'],
				'isbn'=>$post['isbn'],
				'date'=>$post['date'],
				'price'=>$post['price'],
				'qty'=>$post['qty'],
				'shelf_no'=>$post['shelf_no'],
				'department'=>$post['department'],
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'create_by'=>$login_details['u_id']
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
	public  function return_bookpost(){
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$detail=$this->Student_model->get_resources_details($login_details['u_id']);
				$post=$this->input->post();
				//echo'<pre>';print_r($post);exit;
				if($post['type']==0){
					$data=isset($post['issued_date'])?$post['issued_date']:'';
				}else{
					$data=date('Y-m-d');
				}
				$update_data=array(
				'issued_date'=>$data,
				'return_renew_date'=>date('Y-m-d'),
				'status'=>$post['type'],
				'create_at'=>date('Y-m-d H:i:s'),
				'update_at'=>date('Y-m-d H:i:s')
				 );
				//echo'<pre>';print_r($save_data);exit;	
				$update=$this->Librarian_model->update_book_renew_details($post['issued_book_id'],$update_data);	
					//echo'<pre>';print_r($save);exit;
					if(count($update)>0){
						if(isset($post['fine_if_any']) && $post['fine_if_any']!=''){
							$fine=array(
								'book_id'=>$post['issued_book_id'],
								'student_id'=>$post['student_id'],
								'fine_if_any'=>$post['fine_if_any'],
								'status'=>'',
								'create_at'=>date('Y-m-d H:i:s'),
								'update_at'=>date('Y-m-d H:i:s')
							);
							$this->Librarian_model->adding_issued_book_fine_amount($fine);
						
						}
						
					$this->session->set_flashdata('success'," book issued details successfully updated");	
					redirect('librarian/issue_book/'.base64_encode(1));	
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('librarian/return_book/'.base64_encode($post['issued_book_id']));
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
					$datetime1 = new DateTime($book_details['issued_date']);
					$c_date= date('Y-m-d');
					$datetime2 = new DateTime($c_date);
					$interval = $datetime1->diff($datetime2);
					$book_issued_date=$interval->format('%a');
					
					
					if(count($book_details)>0){
						if($lib_due_days['lib_book_due_time'] >$book_issued_date){
							$day_count=(($book_issued_date)-($lib_due_days['lib_book_due_time']));
							$fine=($lib_due_days['fine_charge_amt']*$day_count);
						}else{
							$day_count='';
							$fine='';
						}
						$data['msg']=1;
						$data['i_b_id']=$book_details['i_b_id'];
						$data['issued_date']=$book_details['issued_date'];
						$data['due_days']=$day_count;
						$data['fine_amt']=$fine;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						$data['issued_date']='';
						$data['due_days']='';
						$data['fine_amt']='';
						$data['list']='';
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
					
					$i_b_id=base64_decode($this->uri->segment(3));
					if($i_b_id==''){
						$this->session->set_flashdata('error',"Technical  problem will occured . Please try  again once");
						redirect('librarian/add_book');
					}
					$detail=$this->Librarian_model->get_resources_details($login_details['u_id']);
					$data['class_list']=$this->Student_model->get_school_class_list($detail['s_id']);
					$data['issued_book_details']=$this->Librarian_model->get_all_issued_book_details($i_b_id);
					$lib_due_days=$this->Librarian_model->get_school_lib_due_hours($detail['s_id']);
					$book_details=$this->Librarian_model->get_issued_book_details($i_b_id);
					$datetime1 = new DateTime($book_details['issued_date']);
					$c_date= date('Y-m-d');
					$datetime2 = new DateTime($c_date);
					$interval = $datetime1->diff($datetime2);
					$book_issued_date=$interval->format('%a');
					if(count($data['issued_book_details'])>0){
						if($lib_due_days['lib_book_due_time'] >$book_issued_date){
							$day_count=(($book_issued_date)-($lib_due_days['lib_book_due_time']));
							$fine=($lib_due_days['fine_charge_amt']*$day_count);
						}else{
							$day_count='';
							$fine='';
						}
						$data['msg']=1;
						$data['due_days']=$day_count;
						$data['fine_amt']=$fine;
					}else{
						$data['msg']=0;
						$data['due_days']='';
						$data['fine_amt']='';
					}
					
					//echo '<pre>';print_r($data);exit;
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
