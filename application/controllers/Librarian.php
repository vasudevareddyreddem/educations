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
				$save_data=array(
				'book_name'=>$post['book_name'],
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
					$this->load->view('librarian/issue-book');
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
	public function return_book()
	{	
		if($this->session->userdata('userdetails'))
		{
			$login_details=$this->session->userdata('userdetails');
				if($login_details['role_id']==10){
					$this->load->view('librarian/return-book');
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
