<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

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
		$this->load->model('Role_model');
		
    }
	
	public function index()
	{
		$data['page_title'] = 'Role List';
		
		$data['dbValue'] = $this->Role_model->get_roles();
		
		$this->load->view('user/vwRole', $data);
	}
	
	public function form($id = false)
	{
		if(!$id){
			$data['page_title'] = 'Add Role';
		}else{
			$data['page_title'] = 'Edit Role';
		}
		
		$data['menus'] = $this->Role_model->get_menus();
		
		$data['id'] = '';
		$data['role_name'] = '';
		$data['permission'] = array();
		
		if($id){
			
			$dbValue = $this->Role_model->get_role($id);
			if(!$dbValue){
				
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect('user/role');
			}
			
			$data['id'] 		= $id;
			$data['role_name'] 	= $dbValue->role_name;
			$data['permission'] = json_decode($dbValue->permission);
		}
		
		$this->form_validation->set_rules('role_name', 'Role', 'trim|required');
		
		if($this->form_validation->run() == false){	
			
			$this->load->view('user/vwRoleForm', $data);
		}else{
			
			$save['id'] = $id;
			$save['role_name'] = $this->input->post('role_name');
			$save['permission'] = json_encode($this->input->post('permission'));
			
			$dbId = $this->Role_model->save_role($save);
			
			if($dbId){
				
				$this->session->set_flashdata('message', 'Role saved successfully.');
			}else{
				
				$this->session->set_flashdata('message', 'Something went wrong, please try again!');
			}
			redirect('user/role');
		}
		// echo '<pre>'; print_r($data['permissions']); die;
	}
	
	public function delete_role($id){
		
		$del = $this->Role_model->delete_role($id);
		
		if($del){
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}else{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/role");	
	}
	
}