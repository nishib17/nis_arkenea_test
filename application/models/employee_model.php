<?php
/**
 * 
 */
class Employee_model extends CI_model
{
	
	public function getemployee()
	{
		$query = $this->db->select("*")->where('status!=',2)->get('employee');
		return $query->result();
	}
	public function insert_data()
	{
		$this->form_validation->set_rules('emp_name','Employee Name','alpha');
		// $this->form_validation->set_rules('email_address','Email Address','valid_email');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|valid_email');
		$this->form_validation->set_rules('phone_no','Phone No','numeric|exact_length[10]');
		if ($this->form_validation->run()) {
			$data = array(
				'emp_name' => $_POST['emp_name'],
				'address' => $_POST['address'],
				'email_address' => $_POST['email_address'],
				'phone_no' => $_POST['phone_no'],
				'dob' => date("Y-m-d",strtotime($_POST['dob'])) ,
				'emp_image' => $_FILES['userfile']['name'],
			);
			if ($_POST['emp_id']!='') {
				$this->db->where('emp_id',$_POST['emp_id']);
				$this->db->update('employee',$data);
			}else{

				$query = $this->db->insert('employee',$data);
			}
			if ($query) {
				$this->session->set_flashdata('success','Employee added.');
				redirect('employee');
			}else{
				$this->session->set_flashdata('error','Something went wrong.');
				redirect('employee/insert');
			}

			
		}else{
			redirect('employee/insert');
		}
	}
	public function getsingleemployee($emp_id)
	{
		$query = $this->db->select("*")->where('emp_id',$emp_id)->get('employee');
		return $query->row();
	}
}
?>