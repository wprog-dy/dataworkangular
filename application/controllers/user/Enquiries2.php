<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries2 extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Enquiries_model');
		
		if(!$this->session->userdata('is_user_login')) 
		{
			redirect('/');
		}
    }
	public function index($category_id)
	{
		$categoryResult = $this->Enquiries_model->getCategory($category_id);
		$data['page_title'] = $categoryResult->category_name.' List';
		$data['category_id'] = $category_id;
		$data['dbValue'] = $this->Enquiries_model->getEnquiries($category_id);
		$this->load->view('user/vwEnquiries2', $data);
	}
	
	public function form($category_id,$id = false)
	{	
		$data['category_id'] = $category_id;
		$categoryResult = $this->Enquiries_model->getCategory($category_id);
		$data['currencies'] = $this->Enquiries_model->getCurrencies();
		if(!$id){
			$data['page_title'] = 'Add '.$categoryResult->category_name.' Enquiry';
		}else{
			$data['page_title'] = 'Edit '.$categoryResult->category_name.' Enquiry';
		}
		
		$data['id']			 		= '';
		if($category_id == '26')
		{
			$data['origin_city'] = '';
			$data['destination_city'] = '';
			$data['scheduling_type'] = '';
			$data['loadingdate'] = '';
			$data['loadingtime'] = '';
			$data['days'] = '';
			$data['product'] = '';
			$data['weight']	= '';
			$data['no_of_vehicles']= '';
			$data['freight'] = '';
			$data['paymentterms'] = '';
			$data['balance_per'] = '';
			$data['advance_per'] = '';
			$data['specific_requirement']= '';
		}
		
		

		if($id)
		{	
			$dbValue	= $this->Enquiries_model->getEnquiry2($id);
			if(!$dbValue)
			{	
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect("user/enquiries2/$category_id");
			}
				//set values to db values
				$data['id']			        	= $dbValue->id;
			if($category_id == '26')
			{
				$data['origin_city']		= $dbValue->origin_city;
				$data['destination_city']	= $dbValue->destination_city;
				$data['scheduling_type']	= $dbValue->scheduling_type;
				$data['loadingdate']	= $dbValue->loadingdate;
				$data['loadingtime']= $dbValue->loadingtime;
				$data['days']		= $dbValue->days;
				$data['product']		= $dbValue->product;
				$data['weight']= $dbValue->weight;
				$data['no_of_vehicles']	= $dbValue->no_of_vehicles;
				$data['freight']		= $dbValue->freight;
				$data['paymentterms']		= $dbValue->paymentterms;	
				$data['advance_per']		= $dbValue->advance_per;	
				$data['balance_per']		= $dbValue->balance_per;
				$data['specific_requirement']= $dbValue->specific_requirement;	
			}
			
		}
			if($category_id == '26')
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('scheduling_type', 'When Required', 'trim|required'); 
				$this->form_validation->set_rules('product', 'Product', 'trim|required'); 
				$this->form_validation->set_rules('weight', 'Weight', 'trim|required'); 
				$this->form_validation->set_rules('no_of_vehicles', 'No Of Vehicles', 'trim|required'); 
				$this->form_validation->set_rules('freight', 'Freight', 'required'); 
				$this->form_validation->set_rules('specific_requirement', 'Any specific requirement (if any)', 'trim|required');
			}
			if($category_id == '27')
			{
				$this->form_validation->set_rules('origin_city[]', 'Origin City', 'trim|required');
			}
			if($category_id == '20')
			{
				$this->form_validation->set_rules('vehicle_placement_location', 'Vehicle Placement Location', 'trim|required');
			}
			if($category_id == '28')
			{
				$this->form_validation->set_rules('vehicle_placement_location', 'Vehicle Placement Location', 'trim|required');
			}
				
		if ($this->form_validation->run() == FALSE) 
		{	
			$this->load->view("user/vwEnquiryForm2", $data);
		}
		else
		{	
				$save = array();			
				$save['id'] = $id;
				$save['category_id'] = $this->input->post('category_id');
				$save['customerid'] = $this->session->userdata('id');
				$save['reference_id'] = 'LW-'.uniqid();
				$setting = $this->Enquiries_model->chkSetting();
				$save['admin_setting_status'] = $setting->status;

			if($category_id == '26')
			{	
				$destination_city = '';
				foreach ($_POST['destination_city'] as $value) 
				{
					$destination_city .= $value.','; 
				}
				$days = '';
				foreach ($_POST['days'] as $value) 
				{
					$days .= $value.','; 
				}
				$save['origin_city']		 = $this->input->post('origin_city');
				$save['destination_city']	 = $destination_city;
				$save['scheduling_type']	 = $this->input->post('scheduling_type');
				$save['when_required_date']	 = $this->input->post('loadingdate');
				$save['when_required_time'] = $this->input->post('loadingtime');
				$save['days']	 = $days;
				$save['product']		 = $this->input->post('product');
				$save['weight'] = $this->input->post('weight');
				$save['no_of_vehicles']	 = $this->input->post('no_of_vehicles');
				$save['freight']		 = $this->input->post('freight');
				if($this->input->post('advance_per'))
				{
					$paymentterms_percentage = array('advance_per'=>$this->input->post('advance_per'));
				}
				else
				{
					$paymentterms_percentage = array('balance_per'=>$this->input->post('balance_per'));
				}
				$save['paymentterms_percentage'] = json_encode($paymentterms_percentage);
				$save['specific_requirement'] = $this->input->post('specific_requirement');
				$dbId = $this->Enquiries_model->saveEnquiry($save);

				$this->session->set_flashdata('message', 'Enquiry saved successfully.');
				redirect("user/enquiries2/$category_id");
			}
			if($category_id == '27')
			{
				for ($i=0; $i < count($_POST['origin_city']); $i++) 
				{ 
					$save['origin_city']		 = $_POST['origin_city'][$i];
					$save['destination_city']	 = $_POST['destination_city'][$i];
					$save['origin_pincode']	 = $_POST['origin_pincode'][$i];
					$save['destination_pincode']	 = $_POST['destination_pincode'][$i];
					$save['your_national'] = $_POST['your_national'][$i];
					$save['national_value']	 = $_POST['national_value'][$i];
					$save['national_weight']		 = $_POST['national_weight'][$i];
					$dimension[$i] = array('length'=>$_POST['length'][$i],'breadth'=>$_POST['breadth'][$i],'height'=>$_POST['height'][$i],'unit_of_dimension'=>$_POST['unit_of_dimension'][$i]);
					$save['dimension'] = json_encode($dimension[$i]);
					$save['pickup_date']	 = $_POST['pickup_date'][$i];
					
					$dbId = $this->Enquiries_model->saveEnquiry($save);
				}
			 	if($i == count($_POST['origin_city']))
			 	{
			 		$this->session->set_flashdata('message', 'Enquiry saved successfully.');
					redirect("user/enquiries2/$category_id");
			 	}
			}
			if($category_id == '20')
			{
				$save['vehicle_placement_location']		 = $this->input->post('vehicle_placement_location');
				$save['company_name'] = $this->input->post('company_name');
				$save['type_of_vehicle'] = json_encode($_POST['type_of_vehicle']);
				$save['no_of_vehicles']	= json_encode($_POST['no_of_vehicles']);
				$save['reporting_time']	= json_encode($_POST['reporting_time']);
				$save['monthly_km'] = json_encode($_POST['monthly_km']);

				$dbId = $this->Enquiries_model->saveEnquiry($save);
		 		$this->session->set_flashdata('message', 'Enquiry saved successfully.');
				redirect("user/enquiries2/$category_id");
			}
			if($category_id == '28')
			{
				$save['vehicle_placement_location']		 = $this->input->post('vehicle_placement_location');
				$save['type_of_vehicle'] = json_encode($_POST['type_of_vehicle']);
				$save['no_of_vehicles']	= json_encode($_POST['no_of_vehicles']);
				$save['daily_hour']	= json_encode($_POST['daily_hour']);
				$save['with_without']	= json_encode($_POST['with_without']);
				$save['monthly_km'] = json_encode($_POST['monthly_km']);

				$dbId = $this->Enquiries_model->saveEnquiry($save);
		 		$this->session->set_flashdata('message', 'Enquiry saved successfully.');
				redirect("user/enquiries2/$category_id");
			}	
		}
	}
}
