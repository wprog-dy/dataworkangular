<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
		$this->load->model('Enquiries_model');
		$this->load->model('User_model');
		if (!$this->session->userdata('is_user_login')) 
		{
			redirect('/');
		}
    }
	public function index()
	{
		$data['page_title'] = 'Setting';
		
		$data['dbValue'] =  $this->db->order_by('id', 'DESC')->get_where('setting')->result();
		$data['dbValueVendor'] = $this->User_model->get_users('vendor');
		$setting_status = $this->Enquiries_model->chkSetting();
		if($setting_status->status == '1')
		{
			$data['dbValueEnquiry'] = $this->Enquiries_model->getallEnquiries();
		}
		else
		{
			$data['dbValueEnquiry']=array();
		}
		$this->load->view('user/vwSetting', $data);
	}
	public function changeStatus()
	{
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('setting', array('status' => $status));
		
		$num  = $this->db->affected_rows();
		
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}

}
