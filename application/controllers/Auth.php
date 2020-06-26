<?php
class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('User_model');
	}
	public function login()
	{
		if ($this->session->userdata('id')) 
        {          
			redirect(base_url('auth/myaccount'));
        }
        else 
        {  
        	if($this->input->post('login') == 'Log in')
			{  
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
	            $this->form_validation->set_rules('password', 'Password', 'trim|required');
	            
				if ($this->form_validation->run() == FALSE) 
				{
					
					$data['error'] = validation_errors();
	                $this->load->view('login',$data);
	            }
	            else
	            {
	            	
					$user     = $this->input->post('email');
					$password = md5($this->input->post('password'));
	                
					$sql = "SELECT * FROM users WHERE email = ? AND password = ? AND status = ?";
	                
					$val = $this->db->query($sql,array($user ,$password, '1'))->row();
					// echo $this->db->last_query(); die;
	               
				   if ($val) 
				   {
						//create session	
						$this->session->set_userdata(array(
							'id' => $val->id,
							'email' => $val->email,
							'user_type' => $val->user_type
						));
						redirect('auth/myaccount');
	                }
	                else 
	                {
	                    $this->session->set_flashdata('fail','Email or Password incorrect');
	                    $this->load->view('login', $err);
	                }
	            }
	        }    
	        else
            {
            	$this->load->view('login');
            }  
        }
	}
	public function myaccount()
	{
		$data['id'] = $this->session->userdata('id');
		$data['profile'] = $this->User_model->get_user($data['id']);
		if($this->input->post('profileupdate') == 'Update')
		{
			$this->form_validation->set_rules('fullname', 'Name', 'trim|required'); 
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required'); 

			if ($this->form_validation->run() == FALSE) 
			{	
				$this->load->view('myaccount', $data);
			}
			else
			{
				$save = array();			
				$save['id']			        = $data['id'];
				$save['fullname']			= $this->input->post('fullname');
				$save['company_name']		= $this->input->post('company_name');


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
						if($this->session->userdata('user_type') == 'vendor')
						{
							$path1 = 'vendor/';
						}
						else
						{
							$path1 = 'customer/';
						}
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
							redirect(base_url('auth/myaccount'));
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
						if($this->session->userdata('user_type') == 'vendor')
						{
							$path2 = 'vendor/';
						}
						else
						{
							$path2 = 'customer/';
						}
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
							redirect(base_url('auth/myaccount'));
							die;
						}
						
						$i++;
					}  
					$save['pan_cart_image'] = json_encode($uploaded_file2);
				}
				if($this->session->userdata('user_type') == 'vendor')
				{
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
								redirect(base_url('auth/myaccount'));
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
								redirect(base_url('auth/myaccount'));
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
								redirect(base_url('auth/myaccount'));
								die;
							}
							
							$i++;
						}  
						$save['msme_certificate'] = json_encode($uploaded_file5);
					}
				}
				$dbId = $this->User_model->save_user($save);
				$this->session->set_flashdata('success', 'User saved successfully.');

				//go back to the product list
				redirect(base_url('auth/myaccount'));
			}
		}
		else
		{
			$this->load->view('myaccount',$data);
		}
		
	}
	public function register()
	{
		if($this->input->post('submit') == 'Create Account')
		{
			$this->form_validation->set_rules('user_type','Type','trim|required');
			$this->form_validation->set_rules('industry_type','Type','trim|required');
			$this->form_validation->set_rules('phone','Phone No.','trim|required|min_length[10]');
			$this->form_validation->set_rules('email','email','trim|required|min_length[7]|valid_email');
			$this->form_validation->set_rules('password','Password','trim|min_length[3]|required');

			if ($this->form_validation->run() == FALSE) 
			{
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('error_update', $data['errors']);
				redirect(base_url('auth/register'),'refresh');

			}
			else
			{
				$pass  = md5($this->input->post('password'));
				$data = array(
					'user_type' => $this->input->post('user_type'),
					'industry_type' => $this->input->post('industry_type'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'password' => $pass
				);


				$result = $this->User_model->save_user($data);

				if ($result) 
				{
					$this->session->set_flashdata('success','Your Account Is Create Successfully!');
					redirect(base_url('auth/register'));
				}
				else
				{
					$this->session->set_flashdata('fail','Your Account Is Not Create!');
					redirect(base_url('auth/register'));
				}
			}
		}
		else
		{
			$this->load->view('registration');
		}
	}
	public function logout()
	{
		
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_type');      
        
		$this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('/', 'refresh');
    }
}
