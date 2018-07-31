<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Librarian_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function book_details($data){
		$this->db->insert('books_list',$data);
		return $this->db->insert_id();
		
	}
	public function get_saved_user(){
		$this->db->select('*')->from('books_list');
		return $this->db->get()->result_array();
		
	}
	public function get_saved_user_edit($b_id){
		 $this->db->select('*')->from('books_list');
		$this->db->where('b_id',$b_id);
		return $this->db->get()->row_array();
	 }
	 
	 public  function save_issued_book($data){
		 $this->db->insert('issued_book',$data);
		 return $this->db->insert_id();
	 }
	 public function get_classwise_student_list($class_id){
		 $this->db->select('users.class_name,users.name,users.u_id')->from('users');
		 $this->db->where('class_name',$class_id);
		 $this->db->where('role_id',7);
		 $this->db->where('status',1);
		 return $this->db->get()->result_array();
		 
	 }
	 public  function get_issued_book_list($school_id){
		 $this->db->select('users.name,users.roll_number,books_list.book_number,books_list.book_title,books_list.author_name,books_list.publisher,books_list.department,issued_book.no_of_books_taken,issued_book.issued_date,issued_book.status')->from('issued_book');
		 $this->db->join('books_list', 'books_list.b_id = issued_book.b_id', 'left');
		 $this->db->join('users', 'users.u_id = issued_book.student_id', 'left');

		 $this->db->where('issued_book.s_id',$school_id);
		 return $this->db->get()->result_array();
	}
	public  function get_book_list($school_id){
		 $this->db->select('b_id,book_number,book_title,author_name')->from('books_list');
		 $this->db->where('books_list.s_id',$school_id);
		 $this->db->where('books_list.status',1);
		 return $this->db->get()->result_array();
	}
	
	public  function check_book_already_issued($s_id,$student_id,$book_no){
		$this->db->select('*')->from('issued_book');
		$this->db->where('issued_book.s_id',$s_id);
		$this->db->where('issued_book.student_id',$student_id);
		$this->db->where('issued_book.b_id',$book_no);
		return $this->db->get()->row_array();
	}
	
	
	
}