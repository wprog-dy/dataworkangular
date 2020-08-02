<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('is_user_login')) 
        {
            redirect('/');
		}
    }
	
	public function index()
	{
		$data['page_title'] = 'Dashboard';
		$this->load->view('user/vwdashboard', $data);
	}
	public function contact()
	{
		$data['page_title'] = 'Contact';

		if($this->input->post('submit') == 'Send')
		{
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required'); 
			$this->form_validation->set_rules('message', 'Message', 'trim|required'); 

			if ($this->form_validation->run() == FALSE) 
			{	
				$this->load->view('myaccount', $data);
			}
			else
			{
				$save = array();			
				$save['user_type'] = $this->session->userdata('user_type');
				$save['userid'] = $this->session->userdata('id');
				$save['subject'] = $this->input->post('subject');
				$save['message'] = $this->input->post('message');


				$filesArr = $_FILES['attachment']['name'];
			
				if(!empty($filesArr))
				{	
				
						$_FILES['contact_file']['name']     = $_FILES['attachment']['name'];
						$_FILES['contact_file']['type']     = $_FILES['attachment']['type'];
						$_FILES['contact_file']['tmp_name'] = $_FILES['attachment']['tmp_name'];
						$_FILES['contact_file']['error']    = $_FILES['attachment']['error'];
						$_FILES['contact_file']['size']     = $_FILES['attachment']['size'];

						$fieldname = 'contact_file';
						$filename = $filesArr;
						
						$path = 'contact/';
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
						}else{
							$data['error'] = $data['error'];
							$this->session->set_flashdata('error', $data['error']);
							redirect(base_url('user/Dashboard/contact'));
							die;
						}
						
						$i++;
					
					$save['attachment'] = $uploaded_file;
				}
			
				
				$dbId = $this->User_model->save_contact($save);

				$this->session->set_flashdata('message', 'Send Message successfully.');

				//go back to the product list
				redirect(base_url('user/Dashboard/contact'));
			}
		}
		else
		{
			$this->load->view('user/vwContactForm', $data);
		}
	}
	public function admincontact($user_type = false)
	{
		$data['page_title'] = ucfirst($user_type).' Contact';
		$data['user_type'] = $user_type;
		$data['dbValue'] = $this->User_model->allcontact($user_type);
		$this->load->view('user/vwAdminContact', $data);
	}
}