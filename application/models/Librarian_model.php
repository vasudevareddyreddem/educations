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
			   //echo'<pre>';print_r($b_id);exit;
			   $this->db->select('*')->from('books_list');
		$this->db->where('b_id',$b_id);
		return $this->db->get()->row_array();
		  
		   }
	
	
	
}