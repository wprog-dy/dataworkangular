<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    var $admin_id		= false;
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		
		$this->load->model('User_model');
    }
    
	public function index() 
	{
        if ($this->session->userdata('is_user_login')) 
        {
			// redirect('user/dashboard');
			$data['page_title'] = 'Home';
			$this->load->view('user/vwHome', $data);
        } 
        else 
        {
        	$data['user_type'] = 'user';
			$this->load->view('user/vwLogin',$data);
        }
    }	
	public function admin()
	{
		$data['user_type'] = 'admin';
		if ($this->session->userdata('is_user_login')) 
        {
			$data['page_title'] = 'Home';
			$this->load->view('user/vwHome',$data);
        } 
        else 
        {
        	$data['page_title'] = 'Admin';
			$this->load->view('user/vwLogin',$data);
        }
	}
	public function registration() 
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

				$this->session->set_flashdata('fail', $data['errors']);
				redirect(base_url('user/home/registration'),'refresh');

			}
			else
			{
				$pass  = base64_encode($this->input->post('password'));
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
					redirect(base_url('user/home/registration'));
				}
				else
				{
					$this->session->set_flashdata('fail','Your Account Is Not Create!');
					redirect(base_url('user/home/registration'));
				}
			}
		}
        else 
        {
            $this->load->view('user/vwRegistration');
        }
    }
    public function do_login()
    {
        if ($this->session->userdata('is_user_login')) 
        {    
			redirect('user/dashboard');
        }
        else
        {    
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
			if ($this->form_validation->run() == FALSE) 
			{	
				$data['error'] = validation_errors();
                $this->load->view('user/vwLogin',$data);
            }
            else 
            {	
				$user_type = $this->input->post('user_type');
				$user      = $this->input->post('email');
				$password  = $this->input->post('password');
                
				$enc_pass  = base64_encode($password);
				// echo $enc_pass;       
				
				$sql = "SELECT * FROM `users` WHERE email = '".$user."' AND password = '".$enc_pass."' AND status = '1'";
				
				$val = $this->db->query($sql)->row();
			   	if ($val) 
			   	{
			   		if($val->user_type=='admin')
			   		{
			   			$this->session->set_flashdata('fail','Username or Password incorrect!');
                    	redirect($user_type);
			   		}
			   		else
			   		{
			   			//create session	
	            		$this->session->set_userdata(array(
							'id' => $val->id,
							'email' => $val->email,
							'user_type' => $val->user_type,
							'is_user_login' => true
						));
						redirect('user/dashboard');
			   		}
					
                } 
                else 
                {
                    $this->session->set_flashdata('fail','Username or Password incorrect!');
                    redirect($user_type);
                }
            }
        }
    }
    public function do_admin_login()
    {
    	if ($this->session->userdata('is_user_login')) 
        {    
			redirect('user/dashboard');
        }
        else
        {    
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
			if ($this->form_validation->run() == FALSE) 
			{	
				$data['error'] = validation_errors();
                $this->load->view('user/vwLogin',$data);
            }
            else 
            {	
				$user_type = $this->input->post('user_type');
				$user      = $this->input->post('email');
				$password  = $this->input->post('password');
                
				$enc_pass  = base64_encode($password);
				// echo $enc_pass;       
				if($user_type == 'admin') 
				{
					$sql = "SELECT * FROM `users` WHERE email = '".$user."' AND password = '".$enc_pass."' AND status = '1' AND user_type = '".$user_type."'";
				}
				
				$val = $this->db->query($sql)->row();

				
			   	if ($val) 
			   	{
					//create session	
            		$this->session->set_userdata(array(
						'id' => $val->id,
						'email' => $val->email,
						'user_type' => $val->user_type,
						'is_user_login' => true
					));
					redirect('user/dashboard');
                } 
                else 
                {
                    $this->session->set_flashdata('fail','Username or Password incorrect!');
                    redirect($user_type);
                }
            }
        }
    }
    public function logout(){
		/* $logoutuser = $this->session->userdata('login_time');   
		$this->User_model->update_logout($logoutuser); */
		
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_type');   
        $this->session->unset_userdata('is_user_login');   
        
		$this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('/', 'refresh');
    }
}