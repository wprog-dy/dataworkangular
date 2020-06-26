<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
        parent::__construct();
		if (!$this->session->userdata('is_user_login')) {
			redirect('/');
		}
		
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('Subadmin_model');
		$this->load->model('Role_model');
    } 
	 
	public function index()
	{
		$data['page_title'] = 'Subadmin List';
		
		$data['dbValue'] = $this->Subadmin_model->get_subadmins();
		
		$this->load->view('user/vwSubadmin', $data);
	}
	
	public function form($id = false)
	{	
		if(!$id){
			$data['page_title'] = 'Add Subadmin';
		}else{
			$data['page_title'] = 'Edit Subadmin';
		}
		
		$data['roles'] = $this->Role_model->get_roles();
		
		$data['id'] 			= '';
		$data['name'] 			= '';
		$data['email'] 			= '';
		$data['phone'] 			= '';
		$data['password'] 		= '';
		$data['dob'] 			= '';
		$data['joining_date'] 	= '';
		$data['salary'] 		= '';
		$data['leaving_date'] 	= '';
		$data['profile_pic'] 	= '';
		$data['role'] 			= '';
		
		if($id){
			
			$dbValue = $this->Subadmin_model->get_subadmin($id);
			if(!$dbValue){
				
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect('user/subadmin');
			}
			
			$data['id'] 			= $id;
			$data['name'] 			= $dbValue->name;
			$data['email'] 			= $dbValue->email;
			$data['phone'] 			= $dbValue->phone;
			$data['password'] 		= base64_decode($dbValue->password);
			$data['dob'] 			= $dbValue->dob;
			$data['joining_date'] 	= $dbValue->joining_date;
			$data['salary'] 		= $dbValue->salary;
			$data['leaving_date'] 	= $dbValue->leaving_date;
			$data['profile_pic'] 	= $dbValue->profile_pic;
			$data['role'] 			= $dbValue->role;
		}
		
		$this->form_validation->set_rules('name', 'Role', 'trim|required');
		
		if($this->form_validation->run() == false){	
			
			$this->load->view('user/vwSubadminForm', $data);
		}else{
			
			// print_r($_POST); die;
			$save['id'] 			= $id;
			$save['name'] 			= $this->input->post('name');
			$save['email'] 			= $this->input->post('email');
			$save['phone'] 			= $this->input->post('phone');
			$save['password'] 		= base64_encode($this->input->post('password'));
			$save['dob'] 			= date('Y-m-d', strtotime($this->input->post('dob')));
			$save['joining_date'] 	= date('Y-m-d', strtotime($this->input->post('joining_date')));
			$save['salary'] 		= $this->input->post('salary');
			$save['leaving_date'] 	= !empty($this->input->post('leaving_date')) ? date('Y-m-d', strtotime($this->input->post('leaving_date'))) : null;
			// $save['profile_pic'] 	= $this->input->post('profile_pic');
			$save['role'] 			= $this->input->post('role');
			
			if(!empty($_FILES['profile_pic']['name'])){	
				$fieldname = 'profile_pic';
				$filename = $_FILES['profile_pic']['name'];
				$path = 'subadmin/';
				
				$config['upload_path']          = "./uploads/$path";
				$config['allowed_types']        = 'gif|png|jpg|jpeg';
				/* $config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768; */
				$config['remove_spaces'] 		= true;
				$config['encrypt_name'] 		= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if ( !$this->upload->do_upload($fieldname))
				{
					$data['error'] = array('error' => $this->upload->display_errors());
					
					$this->session->set_flashdata('error', $data['error']);
					redirect("user/subadmin/form/$id");
					// $this->load->view('user/vwSubadminForm', $data);
					die;
				}
				else
				{
					$upload_data = $this->upload->data();
					$save['profile_pic'] = $upload_data['file_name'];
				}
			}
			// print_r($save); die;
			$dbId = $this->Subadmin_model->save_subadmin($save);
			if($dbId){
				
				$this->session->set_flashdata('message', 'Subadmin saved successfully.');
			}else{
				
				$this->session->set_flashdata('message', 'Something went wrong, please try again!');
			}
			redirect('user/subadmin');
		}
		// echo '<pre>'; print_r($data['permissions']); die;
	}
	
	public function checkPhone(){
		
		$id 	= $this->input->post('id');
		$phone 	= $this->input->post('phone');

		$num = $this->Subadmin_model->checkPhone($id, $phone);
		
		if ($num > 0) {
			echo json_encode(FALSE);
		}else{
			echo json_encode(TRUE);
		}
	}
	
	public function checkEmail(){
		
		$id 	= $this->input->post('id');
		$email 	= $this->input->post('email');
		
		$num = $this->Subadmin_model->checkEmail($id, $email);
		
		if ($num > 0) {
			echo json_encode(FALSE);
		}else{
			echo json_encode(TRUE);
		}
	}
	
	public function delete_subadmin($id){
		
		$del = $this->Subadmin_model->delete_subadmin($id);
		
		if($del){
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}else{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/subadmin");	
	}
}