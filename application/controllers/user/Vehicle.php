<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Vehicle_model');
        $this->load->model('Driver_model');
        $this->load->model('User_model');
		
		if (!$this->session->userdata('is_user_login')) 
		{
			redirect('/');
		}
    }
	public function index()
	{
		$data['page_title'] = 'Vehicle List';
		
		$data['dbValue'] = $this->Vehicle_model->get_vehicles();
		$data['driverValue'] = $this->Driver_model->get_drivers();

		$this->load->view('user/vwVehicle', $data);
	}

	public function form($id = false)
	{	

		if(!$id){
			$data['page_title'] = 'Add Vehicle';
		}else{
			$data['page_title'] = 'Edit Vehicle';
		}
		
		$data['id']			 		= '';
		$data['vendor_id']	 		= '';
		$data['vehicle']	 		= '';
		$data['vehicle_type']		= '';
		$data['vehicle_type_mention']= '';
		$data['owner_name']			= '';
		$data['registering_authority']= '';
		$data['vehicle_class']		= '';
		$data['fuel_type']			= '';
		$data['registration_date']	= '';
		$data['fitness_valid_upto']	= '';
		$data['insurance_valid_upto']= '';
		$data['tax_valid_upto']		= '';
		$data['pucc_valid_upto']	= '';
		$data['vehicle_no']	 		= '';

		if($id){
			
			$dbValue	= $this->Vehicle_model->get_vehicle($id);
			
			if(!$dbValue)
			{	
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect('user/vehicle');
			}
			
			//set values to db values
			$data['id']			        	= $dbValue->id;
			$data['vendor_id']				= $dbValue->vendor_id;
			$data['vehicle']				= $dbValue->vehicle;
			$data['vehicle_type']			= $dbValue->vehicle_type;
			$data['vehicle_type_mention']	= $dbValue->vehicle_type_mention;
			$data['owner_name']				= $dbValue->owner_name;
			$data['registering_authority']	= $dbValue->registering_authority;
			$data['vehicle_class']			= $dbValue->vehicle_class;
			$data['fuel_type']				= $dbValue->fuel_type;
			$data['registration_date']		= $dbValue->registration_date;
			$data['fitness_valid_upto']		= $dbValue->fitness_valid_upto;
			$data['insurance_valid_upto']	= $dbValue->insurance_valid_upto;
			$data['tax_valid_upto']			= $dbValue->tax_valid_upto;
			$data['pucc_valid_upto']		= $dbValue->pucc_valid_upto;
			$data['vehicle_no']		    	= $dbValue->vehicle_no;
			$data['vehicle_images']			= $dbValue->vehicle_images;
			$data['vehicle_important_images']= $dbValue->vehicle_important_images;
		}
		
		$this->form_validation->set_rules('vehicle', 'Vehicle', 'trim|required'); 
		$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'trim|required'); 
		$this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'trim|required'); 
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required'); 
		$this->form_validation->set_rules('registering_authority', 'Registering Authority', 'trim|required'); 
		$this->form_validation->set_rules('vehicle_class', 'Vehicle Class', 'trim|required'); 
		$this->form_validation->set_rules('fuel_type', 'Fuel Type', 'trim|required'); 
		$this->form_validation->set_rules('registration_date', 'Registration Date', 'trim|required'); 
		$this->form_validation->set_rules('fitness_valid_upto', 'Fitness Valid upto', 'trim|required'); 
		$this->form_validation->set_rules('insurance_valid_upto', 'Insurance Valid upto', 'trim|required'); 
		$this->form_validation->set_rules('tax_valid_upto', 'Tax Valid upto', 'trim|required'); 
		$this->form_validation->set_rules('pucc_valid_upto', 'PUCC Valid upto', 'trim|required'); 

		if ($this->form_validation->run() == FALSE) 
		{	
			$data['v_id'] = $this->input->get('vendor_id');
			
			$data['vendors'] = $this->User_model->get_users('vendor');
			$this->load->view('user/vwVehicleForm', $data);
		}
		else
		{	
			$save = array();			
			$save['id']			       		= $id;
			$save['vendor_id']				= $this->input->post('vendor_id');
			$save['vehicle']				= $this->input->post('vehicle');
			$save['vehicle_type']			= $this->input->post('vehicle_type');
			$save['vehicle_type_mention']	= $this->input->post('vehicle_type_mention');
			$save['owner_name']				= $this->input->post('owner_name');
			$save['registering_authority']	= $this->input->post('registering_authority');
			$save['vehicle_class']			= $this->input->post('vehicle_class');
			$save['fuel_type']				= $this->input->post('fuel_type');
			$save['registration_date']		= $this->input->post('registration_date');
			$save['fitness_valid_upto']		= $this->input->post('fitness_valid_upto');
			$save['insurance_valid_upto']	= $this->input->post('insurance_valid_upto');
			$save['tax_valid_upto']			= $this->input->post('tax_valid_upto');
			$save['pucc_valid_upto']		= $this->input->post('pucc_valid_upto');
			$save['vehicle_no']				= $this->input->post('vehicle_no');
 
			
			$filesArr1 = array_filter($_FILES['vehicle_images']['name']);
			
			if(!empty($filesArr1)){	
				
				if($id && !empty($data['vehicle_images'])){
					foreach(json_decode($data['vehicle_images']) as $prevFile){
						$uploaded_file1[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr1 as $file1){
					
					$_FILES['vehicle_file']['name']     = $_FILES['vehicle_images']['name'][$i];
					$_FILES['vehicle_file']['type']     = $_FILES['vehicle_images']['type'][$i];
					$_FILES['vehicle_file']['tmp_name'] = $_FILES['vehicle_images']['tmp_name'][$i];
					$_FILES['vehicle_file']['error']    = $_FILES['vehicle_images']['error'][$i];
					$_FILES['vehicle_file']['size']     = $_FILES['vehicle_images']['size'][$i];

					$fieldname1 = 'vehicle_file';
					$filename1 = $file1;
					$path1 = 'vehicle/';
					
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
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/vehicle/form/$id");
						die;
					}
					
					$i++;
				}  
				$save['vehicle_images'] = json_encode($uploaded_file1);
			}

			$filesArr2 = array_filter($_FILES['vehicle_important_images']['name']);
			
			if(!empty($filesArr2)){	
				
				if($id && !empty($data['vehicle_important_images'])){
					foreach(json_decode($data['vehicle_important_images']) as $prevFile){
						$uploaded_file2[] = $prevFile;
					}
					// print_r($uploaded_file); echo '<br>';
				}
				
				$i = 0;
				foreach($filesArr2 as $file2)
				{	
					$_FILES['vehicle_file']['name']     = $_FILES['vehicle_important_images']['name'][$i];
					$_FILES['vehicle_file']['type']     = $_FILES['vehicle_important_images']['type'][$i];
					$_FILES['vehicle_file']['tmp_name'] = $_FILES['vehicle_important_images']['tmp_name'][$i];
					$_FILES['vehicle_file']['error']    = $_FILES['vehicle_important_images']['error'][$i];
					$_FILES['vehicle_file']['size']     = $_FILES['vehicle_important_images']['size'][$i];

					$fieldname2 = 'vehicle_file';
					$filename2 = $file2;
					$path2 = 'vehicle/';
					
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
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/vehicle/form/$id");
						die;
					}
					
					$i++;
				}  
				$save['vehicle_important_images'] = json_encode($uploaded_file2);
			}

			// print_r($save); die;
			$dbId = $this->Vehicle_model->save_vehicle($save);
			
			$this->session->set_flashdata('message', 'Vehicle saved successfully.');

			//go back to the product list
			redirect('user/vehicle/');
		}
	}
	public function changeStatus()
	{
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('vehicles', array('status' => $status));
		
		$num  = $this->db->affected_rows();
		
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function delete_vehicle($id)
	{		
		$del = $this->Vehicle_model->delete_vehicle($id);		
		if($del){
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}else{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/vehicle");	
	}
	public function assignDriver()
	{		
		$vehicleid	= $this->input->post('vehicleid');
		$driverid   = $this->input->post('driverid');

		$dr_id = $this->Vehicle_model->assign_vehicle($driverid,$vehicleid);		
		if($dr_id > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}	
}
