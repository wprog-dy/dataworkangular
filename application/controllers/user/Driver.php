<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Driver_model');
        $this->load->model('User_model');
		
		if (!$this->session->userdata('is_user_login')) 
		{
			redirect('/');
		}
    }
	public function index()
	{
		$data['page_title'] = 'Driver List';
		
		$data['dbValue'] = $this->Driver_model->get_drivers();
		
		$this->load->view('user/vwDriver', $data);
	}

	public function form($id = false)
	{	
		if(!$id){
			$data['page_title'] = 'Add Driver';
		}else{
			$data['page_title'] = 'Edit Driver';
		}
		
		$data['id']			        = '';
		$data['vendor_id']			= '';
		$data['driver_name']		= '';
		$data['driver_type']		= '';
		$data['phone_no']           = '';
		$data['driving_license_no'] = '';
		$data['driving_license_type'] = '';
		$data['driving_license_issue_date'] = '';
		$data['driving_license_valid_till'] = '';
		$data['driver_mobile_type'] = '';
		$data['dob']			    = '';
		$data['aadhar_number']		= '';
		$data['address']       		= '';
		
		if($id){
			
			$dbValue	= $this->Driver_model->get_driver($id);
			
			if(!$dbValue)
			{	
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect('user/driver');
			}
			
			//set values to db values
			$data['id']			        = $dbValue->id;
			$data['vendor_id']			= $dbValue->vendor_id;
			$data['driver_name']		= $dbValue->driver_name;
			$data['driver_type']		= $dbValue->driver_type;
			$data['phone_no']			= $dbValue->phone_no;
			$data['driving_license_no']	= $dbValue->driving_license_no;
			$data['driving_license_type']= $dbValue->driving_license_type;
			$data['driving_license_issue_date']= $dbValue->driving_license_issue_date;
			$data['driving_license_valid_till']= $dbValue->driving_license_valid_till;
			$data['driver_mobile_type']= $dbValue->driver_mobile_type;
			$data['dob']				= $dbValue->dob;
			$data['aadhar_number']		= $dbValue->aadhar_number;
			$data['address']			= $dbValue->address;
			$data['profile_image']  	= $dbValue->profile_image;
			$data['verification_images']  	= $dbValue->verification_images;
		}
		
		$this->form_validation->set_rules('driver_name', 'Driver Name', 'trim|required'); 
		$this->form_validation->set_rules('driver_type', 'Driver Type', 'trim|required'); 
		$this->form_validation->set_rules('phone_no', 'Phone No.', 'required|regex_match[/^[0-9]{10}$/]'); 
		$this->form_validation->set_rules('dob', 'Date Of Birthday', 'required'); 
		$this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|required'); 
		$this->form_validation->set_rules('driving_license_no', 'Driving License No', 'trim|required'); 
		$this->form_validation->set_rules('driving_license_type', 'Driving License Type', 'trim|required'); 
		$this->form_validation->set_rules('driving_license_issue_date', 'Driving License Issue Date', 'trim|required'); 
		$this->form_validation->set_rules('driving_license_valid_till', 'Driving License Valid Till', 'trim|required'); 
		$this->form_validation->set_rules('driver_mobile_type', 'Driver Mobile Type', 'trim|required'); 

		if ($this->form_validation->run() == FALSE) 
		{	
			$data['vendors'] = $this->User_model->get_users('vendor');
			$data['v_id'] = $this->input->get('vendor_id');
			$this->load->view('user/vwDriverForm', $data);
		}
		else
		{	
			$save = array();			
			$save['id']			        = $id;
			$save['vendor_id']			= $this->input->post('vendor_id');
			$save['driver_name']		= $this->input->post('driver_name');
			$save['driver_type']		= $this->input->post('driver_type');
			$save['phone_no']           = $this->input->post('phone_no');
			$save['driving_license_no'] = $this->input->post('driving_license_no');
			$save['driving_license_type'] = $this->input->post('driving_license_type');
			$save['driving_license_issue_date'] = $this->input->post('driving_license_issue_date');
			$save['driving_license_valid_till'] = $this->input->post('driving_license_valid_till');
			$save['driver_mobile_type'] = $this->input->post('driver_mobile_type');
			$save['dob']			    = $this->input->post('dob');
			$save['aadhar_number']		= $this->input->post('aadhar_number');
			$save['address']       		= $this->input->post('address');


			$filesArr = $_FILES['profile_image']['name'];
			if(!empty($filesArr))
			{		
				$_FILES['user_file']['name']     = $_FILES['profile_image']['name'];
				$_FILES['user_file']['type']     = $_FILES['profile_image']['type'];
				$_FILES['user_file']['tmp_name'] = $_FILES['profile_image']['tmp_name'];
				$_FILES['user_file']['error']    = $_FILES['profile_image']['error'];
				$_FILES['user_file']['size']     = $_FILES['profile_image']['size'];
					
				$fieldname = 'user_file';
				$filename = $_FILES['user_file']['name'];
				$path = 'driver/';
				
				$config['upload_path']          = "./uploads/$path";
				$config['allowed_types']        = '*';
				$config['remove_spaces'] 		= true;
				$config['encrypt_name'] 		= true;
					
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					
				if ( !$this->upload->do_upload($fieldname))
				{
					$data['error'] = array('error' => $this->upload->display_errors());
				}
				else
				{
					$upload_data = $this->upload->data();
					$data['uploaded_file_name'] = $upload_data['file_name'];
				}
					############## ↑↑upload file library ###############
					
				if(!isset($data['error']))
				{
					$uploaded_file = $data['uploaded_file_name'];
				}
				else
				{
					$data['error'] = $data['error'];
					$this->session->set_flashdata('error', $data['error']);
					redirect("user/driver/form/$id");
					die;
				}
					
				// print_r($uploaded_file); die;
				$save['profile_image'] = $uploaded_file;
			} 
			
			$filesArr1 = array_filter($_FILES['verification_images']['name']);
			
			if(!empty($filesArr1)){	
				
				if($id && !empty($data['verification_images'])){
					foreach(json_decode($data['verification_images']) as $prevFile){
						$uploaded_file1[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr1 as $file1){
					
					$_FILES['driver_file']['name']     = $_FILES['verification_images']['name'][$i];
					$_FILES['driver_file']['type']     = $_FILES['verification_images']['type'][$i];
					$_FILES['driver_file']['tmp_name'] = $_FILES['verification_images']['tmp_name'][$i];
					$_FILES['driver_file']['error']    = $_FILES['verification_images']['error'][$i];
					$_FILES['driver_file']['size']     = $_FILES['verification_images']['size'][$i];

					$fieldname1 = 'driver_file';
					$filename1 = $file1;
					$path1 = 'driver/';
					
					$config['upload_path']          = "./uploads/$path1";
					$config['allowed_types']        = '*';
					/* $config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768; */
					$config['remove_spaces'] 		= true;
					$config['encrypt_name'] 		= true;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if ( !$this->upload->do_upload($fieldname1))
					{
						$data['error'] = array('error' => $this->upload->display_errors());
					}
					else
					{
						$upload_data1 = $this->upload->data();
						$data['uploaded_file_name'] = $upload_data1['file_name'];
					}
					############## ↑↑upload file library ###############
					
					if(!isset($data['error'])){
						$uploaded_file1[] = $data['uploaded_file_name'];
					}else{
						$data['error'] = $data['error'];
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/driver/form/$id");
						die;
					}
					
					$i++;
				}  
				$save['verification_images'] = json_encode($uploaded_file1);
			}
			$filesArr3 = array_filter($_FILES['driving_license_front']['name']);
			
			if(!empty($filesArr3)){	
				
				if($id && !empty($data['driving_license_front'])){
					foreach(json_decode($data['driving_license_front']) as $prevFile){
						$uploaded_file3[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr3 as $file3){
					
					$_FILES['driver_file']['name']     = $_FILES['driving_license_front']['name'][$i];
					$_FILES['driver_file']['type']     = $_FILES['driving_license_front']['type'][$i];
					$_FILES['driver_file']['tmp_name'] = $_FILES['driving_license_front']['tmp_name'][$i];
					$_FILES['driver_file']['error']    = $_FILES['driving_license_front']['error'][$i];
					$_FILES['driver_file']['size']     = $_FILES['driving_license_front']['size'][$i];

					$fieldname3 = 'driver_file';
					$filename3 = $file3;
					$path3 = 'driver/';
					
					$config['upload_path']          = "./uploads/$path3";
					$config['allowed_types']        = '*';
					/* $config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768; */
					$config['remove_spaces'] 		= true;
					$config['encrypt_name'] 		= true;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if ( !$this->upload->do_upload($fieldname3))
					{
						$data['error'] = array('error' => $this->upload->display_errors());
					}
					else
					{
						$upload_data3 = $this->upload->data();
						$data['uploaded_file_name'] = $upload_data3['file_name'];
					}
					############## ↑↑upload file library ###############
					
					if(!isset($data['error'])){
						$uploaded_file3[] = $data['uploaded_file_name'];
					}else{
						$data['error'] = $data['error'];
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/driver/form/$id");
						die;
					}
					
					$i++;
				}  
				$save['driving_license_front'] = json_encode($uploaded_file3);
			}
			$filesArr4 = array_filter($_FILES['aadhar_card_front_back']['name']);
			
			if(!empty($filesArr4)){	
				
				if($id && !empty($data['aadhar_card_front_back'])){
					foreach(json_decode($data['aadhar_card_front_back']) as $prevFile){
						$uploaded_file4[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr4 as $file4){
					
					$_FILES['driver_file']['name']     = $_FILES['aadhar_card_front_back']['name'][$i];
					$_FILES['driver_file']['type']     = $_FILES['aadhar_card_front_back']['type'][$i];
					$_FILES['driver_file']['tmp_name'] = $_FILES['aadhar_card_front_back']['tmp_name'][$i];
					$_FILES['driver_file']['error']    = $_FILES['aadhar_card_front_back']['error'][$i];
					$_FILES['driver_file']['size']     = $_FILES['aadhar_card_front_back']['size'][$i];

					$fieldname4 = 'driver_file';
					$filename4 = $file4;
					$path4 = 'driver/';
					
					$config['upload_path']          = "./uploads/$path4";
					$config['allowed_types']        = '*';
					/* $config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768; */
					$config['remove_spaces'] 		= true;
					$config['encrypt_name'] 		= true;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if ( !$this->upload->do_upload($fieldname4))
					{
						$data['error'] = array('error' => $this->upload->display_errors());
					}
					else
					{
						$upload_data4 = $this->upload->data();
						$data['uploaded_file_name'] = $upload_data4['file_name'];
					}
					############## ↑↑upload file library ###############
					
					if(!isset($data['error'])){
						$uploaded_file4[] = $data['uploaded_file_name'];
					}else{
						$data['error'] = $data['error'];
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/driver/form/$id");
						die;
					}
					
					$i++;
				}  
				$save['aadhar_card_front_back'] = json_encode($uploaded_file4);
			}

			// print_r($save); die;
			$dbId = $this->Driver_model->save_driver($save);
			
			$this->session->set_flashdata('message', 'Driver saved successfully.');

			//go back to the product list
			redirect('user/driver/');
		}
	}
	public function changeStatus()
	{
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('drivers', array('status' => $status));
		
		$num  = $this->db->affected_rows();
		
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function delete_driver($id)
	{		
		$del = $this->Driver_model->delete_driver($id);		
		if($del){
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}else{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/driver");	
	}
}
