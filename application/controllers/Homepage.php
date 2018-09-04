<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');
class Homepage extends In_frontend {
public function __construct() 
	{
		parent::__construct();	
			$this->load->model('Transportation_model');
			$this->load->model('Student_model');
			$this->load->model('Homepage_model');
	}
	public function index()
	{	
		
				
	$this->load->view('page/index');
	$this->load->view('html/footer');
				
		
	}
	
	public function program()
	{	
		
				
	$this->load->view('page/program-content');
	$this->load->view('html/footer');
				
		
	}
	
	
}

