<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->helper('email');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$result = $this->employee_model->getemployee();
		$this->load->view('employee_list',['result'=>$result]);
	}
	public function insert()
	{
		$this->load->view('insert');
	}
	public function save()
	{
		// print_r($_POST);exit;
		$config['upload_path'] = "./uploads/";
		$config['allowed_types'] = "jpg|png";
		// $config['']
		if (isset($_FILES)) {
			$this->load->library('upload',$config);
			if (! $this->upload->do_upload('userfile')) {
				
				$error = array('error' =>  $this->upload->display_errors());
				$this->load->view('insert',$error);
				
			}else{
				
				$data = array('upload_data' => $this->upload->data());
				
			}
		}
		$this->employee_model->insert_data();
		redirect('employee');
		
	}
	public function edit($emp_id='')
	{
		$result = $this->employee_model->getsingleemployee($emp_id);
		$this->load->view('edit',['result'=>$result]);
	}
	public function delete($emp_id='')
	{
		$this->db->where('emp_id',$emp_id);
		$this->db->update('employee',array('status'=>2));
		redirect('employee');
	}
}
