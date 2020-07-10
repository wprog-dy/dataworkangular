<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
		$this->load->helper('form');
        $this->load->library('form_validation');
        // $this->load->library('uploadfile');
		// $this->load->helper("loginCode_generator_helper");
		$this->load->model('User_model');
		$this->load->model('Enquiries_model');
		
		if (!$this->session->userdata('is_user_login')) {
			redirect('/');
		}
    }
	
	public function index(){
		
		$data['page_title'] = 'Vendor List';
		
		$data['dbValue'] = $this->User_model->get_users('vendor');
		
		$this->load->view('user/vwVendor', $data);
	}
	public function vendorprofile($id = false)
	{
		$data['page_title'] = 'Vendor List';
		
		$data['vendordata'] = $this->User_model->get_user($id);
		$data['driverdata'] = $this->User_model->get_drivers($id);
		$data['vehicledata'] = $this->User_model->get_vehicles($id);
		$this->load->view('user/vwVendorProfile', $data);
	}

	public function form($id = false){	
		
		if(!$id){
			$data['page_title'] = 'Add Vendor';
		}else{
			$data['page_title'] = 'Edit Vendor';
		}
		
		$data['id']			        = '';
		$data['first_name']		    = '';
		$data['last_name']		    = '';
		$data['email']              = '';
		$data['phone']			    = '';
		$data['other_phone']		= '';
		$data['landline']       	= '';
		$data['pancard_no'] 		= '';
		$data['industry_type']		= '';
		$data['additional_info'] 	= '';
		$data['main_services']		= '';
		$data['services'] 			= '';
		$data['city']               = '';
		$data['contact_person']		= '';
		$data['company_type']       = '';
		$data['company_name']       = '';
		$data['company_website']	= '';
		$data['gst_no']             = '';
		$data['business_years']     = '';
		$data['password']           = '';
		// $data['verification_docs']  = '';
		
		if($id){
			
			$dbValue	= $this->User_model->get_user($id);
			
			if(!$dbValue){
				
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect('user/vendor');
			}
			
			//set values to db values
			$data['id']			        = $dbValue->id;
			$data['first_name']		    = $dbValue->first_name;
			$data['last_name']		    = $dbValue->last_name;
			$data['email']              = $dbValue->email;
			$data['phone']			    = $dbValue->phone;
			$data['other_phone']		= $dbValue->other_phone;
			$data['landline']       	= $dbValue->landline;
			$data['pancard_no'] 		= $dbValue->pancard_no;
			$data['industry_type']		= $dbValue->industry_type;
			$data['additional_info'] 	= $dbValue->additional_info;
			$data['main_services']		= $dbValue->main_services;
			$data['services'] 			= $dbValue->services;
			$data['city']               = $dbValue->city;
			$data['contact_person']		= $dbValue->contact_person;
			$data['company_type']       = $dbValue->company_type;
			$data['company_name']       = $dbValue->company_name;
			$data['company_website']	= $dbValue->company_website;
			$data['gst_no']             = $dbValue->gst_no;
			$data['business_years']     = $dbValue->business_years;
			$data['password']           = base64_decode($dbValue->password);
			$data['gst_certificate']  	= $dbValue->gst_certificate;
			$data['pan_cart_image']  	= $dbValue->pan_cart_image;
			$data['cancelled_cheque']  	= $dbValue->cancelled_cheque;
			$data['director_id_roof']  = $dbValue->director_id_roof;
			$data['msme_certificate']  = $dbValue->msme_certificate;
		}
		
		//Validate the form
		// if($this->form_validation->run() == false)
		if(!$this->input->post())
		{	
			$this->load->view('user/vwVendorForm', $data);
		}
		else
		{	
			$save = array();
			
			$save['id']			        = $id;
			$save['first_name']		    = $this->input->post('first_name');
			$save['last_name']		    = $this->input->post('last_name');
			$save['email']              = $this->input->post('email');
			$save['phone']			    = $this->input->post('phone');
			$save['other_phone']		= $this->input->post('other_phone');
			$save['landline']       	= $this->input->post('landline');
			$save['pancard_no'] 		= strtoupper($this->input->post('pancard_no'));
			$save['industry_type']		= $this->input->post('industry_type');
			$save['additional_info'] 	= $this->input->post('additional_info');
			$save['main_services']		= $this->input->post('main_services');
			$save['services'] 			= $this->input->post('services');
			$save['city']               = $this->input->post('city');
			$save['contact_person']		= $this->input->post('contact_person');
			$save['company_type']       = $this->input->post('company_type');
			$save['company_name']       = $this->input->post('company_name');
			$save['company_website']	= $this->input->post('company_website');
			$save['gst_no']             = $this->input->post('gst_no');
			$save['business_years']     = $this->input->post('business_years');
			$save['password']           = base64_encode($this->input->post('password'));
			$save['user_type']          = $this->input->post('user_type');
			// $save['verification_docs']  = $this->input->post('verification_docs');
			
			$filesArr = array_filter($_FILES['verification_docs']['name']);
			
			if(!empty($filesArr)){	
				
				if($id && !empty($data['verification_docs'])){
					foreach(json_decode($data['verification_docs']) as $prevFile){
						$uploaded_file[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr as $file){
					
					$_FILES['user_file']['name']     = $_FILES['verification_docs']['name'][$i];
					$_FILES['user_file']['type']     = $_FILES['verification_docs']['type'][$i];
					$_FILES['user_file']['tmp_name'] = $_FILES['verification_docs']['tmp_name'][$i];
					$_FILES['user_file']['error']    = $_FILES['verification_docs']['error'][$i];
					$_FILES['user_file']['size']     = $_FILES['verification_docs']['size'][$i];
					
					// $upload_file = $this->uploadfile->do_upload($fieldname = 'user_file', $filename = $file, $path = 'vendor/'); 
					$fieldname = 'user_file';
					$filename = $file;
					$path = 'vendor/';
					
					$config['upload_path']          = "./uploads/$path";
					$config['allowed_types']        = '*';
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
					}
					else
					{
						$upload_data = $this->upload->data();
						$data['uploaded_file_name'] = $upload_data['file_name'];
					}
					############## ↑↑upload file library ###############
					
					/* if(!isset($upload_file['error'])){
						$uploaded_file[] = $upload_file['uploaded_file_name'];
					}else{
						$data['error'] = $upload_file['error'];
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/vendor/form/$id");
						die;
					} */
					
					if(!isset($data['error'])){
						$uploaded_file[] = $data['uploaded_file_name'];
					}else{
						$data['error'] = $data['error'];
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/vendor/form/".$id);
						die;
					}
					$i++;
				}  
				// print_r($uploaded_file); die;
				$save['verification_docs'] = json_encode($uploaded_file);
			}
			
			$filesArr1 = array_filter($_FILES['gst_certificate']['name']);
			
				if(!empty($filesArr1))
				{	
				
					if($id && !empty($data['gst_certificate'])){
						foreach(json_decode($data['gst_certificate']) as $prevFile){
							$uploaded_file1[] = $prevFile;
						}
						// print_r($uploaded_file); echo '<br>';
					}
				
					$i = 0;
					foreach($filesArr1 as $file1)
					{
						$_FILES['user_file']['name']     = $_FILES['gst_certificate']['name'][$i];
						$_FILES['user_file']['type']     = $_FILES['gst_certificate']['type'][$i];
						$_FILES['user_file']['tmp_name'] = $_FILES['gst_certificate']['tmp_name'][$i];
						$_FILES['user_file']['error']    = $_FILES['gst_certificate']['error'][$i];
						$_FILES['user_file']['size']     = $_FILES['gst_certificate']['size'][$i];

						$fieldname1 = 'user_file';
						$filename1 = $file1;
						
							$path1 = 'vendor/';
						
						$config['upload_path']          = "./uploads/$path1";
						$config['allowed_types']        = '*';
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
							$this->session->set_flashdata('fail', $data['error']);
							redirect(base_url('user/vendor/form/'.$id));
							die;
						}
						
						$i++;
					}  
					$save['gst_certificate'] = json_encode($uploaded_file1);
				}
				$filesArr2 = array_filter($_FILES['pan_cart_image']['name']);
			
				if(!empty($filesArr2))
				{	
				
					if($id && !empty($data['pan_cart_image'])){
						foreach(json_decode($data['pan_cart_image']) as $prevFile){
							$uploaded_file2[] = $prevFile;
						}
						// print_r($uploaded_file); echo '<br>';
					}
				
					$i = 0;
					foreach($filesArr2 as $file2)
					{
						$_FILES['user_file']['name']     = $_FILES['pan_cart_image']['name'][$i];
						$_FILES['user_file']['type']     = $_FILES['pan_cart_image']['type'][$i];
						$_FILES['user_file']['tmp_name'] = $_FILES['pan_cart_image']['tmp_name'][$i];
						$_FILES['user_file']['error']    = $_FILES['pan_cart_image']['error'][$i];
						$_FILES['user_file']['size']     = $_FILES['pan_cart_image']['size'][$i];

						$fieldname2 = 'user_file';
						$filename2 = $file2;
						
							$path2 = 'vendor/';
						
						$config['upload_path']          = "./uploads/$path2";
						$config['allowed_types']        = '*';
						$config['remove_spaces'] 		= true;
						$config['encrypt_name'] 		= true;
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						if ( !$this->upload->do_upload($fieldname2))
						{
							$data['error'] = array('error' => $this->upload->display_errors());
						}
						else
						{
							$upload_data2 = $this->upload->data();
							$data['uploaded_file_name'] = $upload_data2['file_name'];
						}
						############## ↑↑upload file library ###############
						
						if(!isset($data['error'])){
							$uploaded_file2[] = $data['uploaded_file_name'];
						}else{
							$data['error'] = $data['error'];
							$this->session->set_flashdata('fail', $data['error']);
							redirect(base_url('user/vendor/form/'.$id));
							die;
						}
						
						$i++;
					}  
					$save['pan_cart_image'] = json_encode($uploaded_file2);
				}
				$filesArr3 = array_filter($_FILES['cancelled_cheque']['name']);
			
					if(!empty($filesArr3))
					{	
					
						if($id && !empty($data['cancelled_cheque'])){
							foreach(json_decode($data['cancelled_cheque']) as $prevFile){
								$uploaded_file3[] = $prevFile;
							}
							// print_r($uploaded_file); echo '<br>';
						}
					
						$i = 0;
						foreach($filesArr3 as $file3)
						{
							$_FILES['user_file']['name']     = $_FILES['cancelled_cheque']['name'][$i];
							$_FILES['user_file']['type']     = $_FILES['cancelled_cheque']['type'][$i];
							$_FILES['user_file']['tmp_name'] = $_FILES['cancelled_cheque']['tmp_name'][$i];
							$_FILES['user_file']['error']    = $_FILES['cancelled_cheque']['error'][$i];
							$_FILES['user_file']['size']     = $_FILES['cancelled_cheque']['size'][$i];

							$fieldname3 = 'user_file';
							$filename3 = $file3;
							$path3 = 'vendor/';
							$config['upload_path']          = "./uploads/$path3";
							$config['allowed_types']        = '*';
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
								$this->session->set_flashdata('fail', $data['error']);
								redirect(base_url('user/vendor/form/'.$id));
								die;
							}
							
							$i++;
						}  
						$save['cancelled_cheque'] = json_encode($uploaded_file3);
					}
					$filesArr4 = array_filter($_FILES['director_id_roof']['name']);
			
					if(!empty($filesArr4))
					{	
					
						if($id && !empty($data['director_id_roof'])){
							foreach(json_decode($data['director_id_roof']) as $prevFile){
								$uploaded_file4[] = $prevFile;
							}
							// print_r($uploaded_file); echo '<br>';
						}
					
						$i = 0;
						foreach($filesArr4 as $file4)
						{
							$_FILES['user_file']['name']     = $_FILES['director_id_roof']['name'][$i];
							$_FILES['user_file']['type']     = $_FILES['director_id_roof']['type'][$i];
							$_FILES['user_file']['tmp_name'] = $_FILES['director_id_roof']['tmp_name'][$i];
							$_FILES['user_file']['error']    = $_FILES['director_id_roof']['error'][$i];
							$_FILES['user_file']['size']     = $_FILES['director_id_roof']['size'][$i];

							$fieldname4 = 'user_file';
							$filename4 = $file4;
							$path4 = 'vendor/';
							$config['upload_path']          = "./uploads/$path4";
							$config['allowed_types']        = '*';
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
								$this->session->set_flashdata('fail', $data['error']);
								redirect(base_url('user/vendor/form/'.$id));
								die;
							}
							
							$i++;
						}  
						$save['director_id_roof'] = json_encode($uploaded_file4);
					}
					$filesArr5 = array_filter($_FILES['msme_certificate']['name']);
			
					if(!empty($filesArr5))
					{	
					
						if($id && !empty($data['msme_certificate'])){
							foreach(json_decode($data['msme_certificate']) as $prevFile){
								$uploaded_file5[] = $prevFile;
							}
							// print_r($uploaded_file); echo '<br>';
						}
					
						$i = 0;
						foreach($filesArr5 as $file5)
						{
							$_FILES['user_file']['name']     = $_FILES['msme_certificate']['name'][$i];
							$_FILES['user_file']['type']     = $_FILES['msme_certificate']['type'][$i];
							$_FILES['user_file']['tmp_name'] = $_FILES['msme_certificate']['tmp_name'][$i];
							$_FILES['user_file']['error']    = $_FILES['msme_certificate']['error'][$i];
							$_FILES['user_file']['size']     = $_FILES['msme_certificate']['size'][$i];

							$fieldname5 = 'user_file';
							$filename5 = $file5;
							$path5 = 'vendor/';
							$config['upload_path']          = "./uploads/$path5";
							$config['allowed_types']        = '*';
							$config['remove_spaces'] 		= true;
							$config['encrypt_name'] 		= true;
							
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							
							if ( !$this->upload->do_upload($fieldname5))
							{
								$data['error'] = array('error' => $this->upload->display_errors());
							}
							else
							{
								$upload_data5 = $this->upload->data();
								$data['uploaded_file_name'] = $upload_data5['file_name'];
							}
							############## ↑↑upload file library ###############
							
							if(!isset($data['error'])){
								$uploaded_file5[] = $data['uploaded_file_name'];
							}else{
								$data['error'] = $data['error'];
								$this->session->set_flashdata('fail', $data['error']);
								redirect(base_url('user/vendor/form/'.$id));
								die;
							}
							
							$i++;
						}  
						$save['msme_certificate'] = json_encode($uploaded_file5);
					}
			// print_r($save); die;
			$dbId = $this->User_model->save_user($save);
			
			if(!$id){
				$update['id'] = $dbId;
				$update['login_code'] = generate_loginCode('vendor');
				$this->User_model->save_user($update);
			}
			
			$this->session->set_flashdata('message', 'Vendor saved successfully.');
			
			redirect('user/vendor/form/'.$id);
		}
	}
	public function vendorinbox()
	{
		$data['page_title'] = "Inbox";
		$data['admin_setting_status'] = $this->Enquiries_model->chkSetting();
		$data['dbValue'] = $this->Enquiries_model->getallEnquiries();
		
		$this->load->view("user/vwVendorinbox",$data);
	}
	public function vendorBit()
	{
		$save['vendor_id'] = $this->session->userdata('id');
		$save['customerid'] = $this->input->post('customerid');
		$save['reference_id'] = 'LW-'.uniqid();
		$save['equiry_status'] = 'accept';
		$save['category_id'] = $this->input->post('category_id');
		$save['enquiry_id'] = $this->input->post('enquiry_id');
		$save['rate_per_unit'] = $this->input->post('rate_per_unit');
		$save['validity'] = $this->input->post('validity');
		$save['credit_term'] = $this->input->post('credit_term');
		$save['message'] = $this->input->post('message');

		$dbId = $this->User_model->saveVendorbit($save);
		$this->session->set_flashdata('message', 'Enquiry Rate Submit successfully.');
		redirect('user/enquiries/enquirydetail/'.$this->input->post('category_id').'/'. $this->input->post('enquiry_id'));
	}
	public function vendorreplies()
	{
		$data['page_title'] = "Vendor Reply";
		$vendorid = $this->session->userdata('id');
		$data['page_title'] = 'Vendor Replay';
		$data['vendorreplies'] = $this->Enquiries_model->getVendorReplies($vendorid);
		$this->load->view("user/vwVendorReplies",$data);
	}
}