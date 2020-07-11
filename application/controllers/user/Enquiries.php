<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Enquiries_model');
        $this->load->model('User_model');
        $this->load->model('Driver_model');
		
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
		$this->load->view('user/vwEnquiries', $data);
	}
	public function EnquiryDetail($category_id,$enquiryid)
	{
		$data['page_title'] = "Enquiry Detail";
		$vendor_id = $this->session->userdata('id');
		$data['dbValue'] = $this->Enquiries_model->getEnquiry($category_id,$enquiryid);
		$data['dbValueVendotBit'] = $this->User_model->getVendorbit($category_id,$enquiryid,$vendor_id);
		$this->load->view("user/vwEnquiryDetail",$data);	
	}
	public function customerinbox()
	{
		$data['page_title'] = 'Inbox';
		$data['dbValue'] = $this->Enquiries_model->getallEnquiries();	
		$this->load->view('user/vwCustomerInbox', $data);
	}
	public function vendorreplay()
	{
		$customerid = $this->session->userdata('id');
		$data['page_title'] = 'Vendor Replay';
		$data['vendorreplay'] = $this->Enquiries_model->getVendorReplay($customerid);

		$this->load->view('user/vwVendorReplay', $data);
	}
	public function vendorReplyDetails($enquiry_id,$bitid)
	{
		$data['page_title'] = 'Vendor Replay Detail';
		$data['vendorreplaydetail'] = $this->Enquiries_model->getVendorReplayDetail($enquiry_id,$bitid);
		$data['driverValue'] = $this->Driver_model->get_drivers();
		$this->load->view('user/vwVendorReplayDetail', $data);
	}
	public function orderSummary()
	{
		$customerid = $this->session->userdata('id');
		$data['page_title'] = 'Order Summary';
		$data['vendorreplay'] = $this->Enquiries_model->getOrderSummary($customerid);
		$this->load->view('user/vwOrderSummary', $data);
	}
	public function orderSummaryList($enquiry_id)
	{
		$customerid = $this->session->userdata('id');
		$data['page_title'] = 'Order Summary List';
		$data['dbValue'] = $this->Enquiries_model->getOrderSummaryList($customerid,$enquiry_id);
		$this->load->view('user/vwOrderSummaryList', $data);
	}
	public function orderSummaryDetails($enquiry_id,$bitid)
	{
		$data['page_title'] = 'Order Summary Detail';
		$data['vendorreplaydetail'] = $this->Enquiries_model->getVendorReplayDetail($enquiry_id,$bitid);
		$data['driverValue'] = $this->Driver_model->get_drivers();
		$this->load->view('user/vwVendorReplayDetail', $data);
	}
	public function enquiryVendorStatus($enquiry_id,$reference_id,$equiry_status,$bitid)
	{
		if($equiry_status == 'Pending')
		{
			$save['equiry_status'] = 'Accepted';	
		}	
		$result = $this->Enquiries_model->updateEnquiryStatus($enquiry_id,$reference_id,$save,$bitid);
		$this->session->set_flashdata('error', 'Enquiry Accepted');
		redirect("user/enquiries/orderSummarylist/$enquiry_id");
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
		if(($category_id == '2')||($category_id == '3'))
		{
			$data['origin_city']	 	= '';
			$data['destination_city']	= '';
			$data['when_required_date']	= '';
			$data['when_required_time']	= '';
			$data['type_of_transaction']= '';
			$data['type_of_load']		= '';
			$data['industry_type']		= '';
			$data['product_commodities']= '';
			$data['approx_weight_kg']	= '';
			$data['no_of_packets']		= '';
			$data['pickup_address']		= '';
			$data['drop_address']		= '';
		}
		if($category_id=='5')
		{
			$data['area'] = '';
			$data['area_dimension'] = '';
			$data['location'] = '';
			$data['whatsapp_no'] = '';
			$data['type_of_warehouse'] = '';
			$data['services'] = '';
		}
		if(($category_id=='8')||($category_id == '11'))
		{
			$data['area'] = '';
			$data['city'] = '';
			$data['state'] = '';
			$data['country'] = '';
			$data['name'] = '';
			$data['contact_no'] = '';
			$data['whatsapp_no'] = '';
			$data['email'] = '';
			$data['expected_rate_sqr_feet'] = '';
			$data['shed_requirement'] = '';
			$data['area_required'] = '';
		}
		if(($category_id == '9')||($category_id == '10'))
		{
			$data['street_1'] = '';
			$data['street_2'] = '';
			$data['town'] = '';
			$data['district'] = '';
			$data['city'] = '';
			$data['state'] = '';
			$data['pincode'] = '';
			$data['name'] = '';
			$data['contact_no'] = '';
			$data['whatsapp_no'] = '';
			$data['email'] = '';
			$data['min_lockin_period'] = '';
			$data['dedicated_and_shared'] = '';
			$data['other_services_provide'] = '';
			$data['area_required'] = '';
			$data['available_for'] = '';
			$data['tentative_price_sqr_feet'] = '';
		}
		if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
		{
			$data['origin_city'] = '';
			$data['destination_city'] = '';
			$data['when_required_date']	= '';
			$data['when_required_time']	= '';
			if($category_id == '13')
			{
				$data['currency_id'] = '';
				$data['my_expected_freight'] = '';
			}
			if($category_id == '14')
			{
				$data['mode_of_shipment'] = '';
			}
			$data['type_of_service'] = '';
			$data['industry_type']	= '';
			$data['product_commodities']= '';
			$data['approx_weight_kg']	= '';
			$data['volume_weight']	= '';
			$data['dimension'] = '';
			$data['no_of_packets']	= '';
			$data['pickup_address']	= '';
			$data['drop_address']	= '';
		}
		if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
		{
			$data['origin_city']	 	= '';
			$data['destination_city']	= '';
			
			if($category_id == '17')
			{
				$data['target_pricing']	= '';
				$data['mode_of_transport']	= '';
				$data['type_of_transaction']= '';
				$data['industry_type']		= '';
				$data['wishtomove']	= '';
				$data['post_vendor']	= '';
				$data['pickup_address']		= '';
				$data['drop_address']		= '';
			}
			if($category_id == '18')
			{
				$data['target_pricing']	= '';
				$data['type_of_transaction']= '';
				$data['volume_or_dense']	= '';
				$data['approx_weight_kg']	= '';
				$data['type_of_product']= '';
			}
			if($category_id == '19')
			{
				$data['industry_type']		= '';
				$data['approx_weight_kg']	= '';
				$data['product_requirement']	= '';
				$data['essential_requirement']	= '';
				$data['no_of_vehicles']	= '';
				$data['volume_or_dense']	= '';
				$data['pickup_address']		= '';
				$data['drop_address']		= '';
			}
			
			$data['product_commodities']= '';
			$data['no_of_packets']		= '';
			$data['starttime']	= '';
			$data['closingtime']	= '';
			$data['vendor_based_post']	= '';
			$data['turnover_of_company']	= '';
			$data['businessyear']	= '';
			
		}
		if($category_id == '22')
		{
			$data['origin_city'] = '';
			$data['destination_city'] = '';
			$data['container_type']= '';
			$data['type_of_vehicle']= '';
			$data['my_expect_freight']= '';
			$data['starttime']= '';
			$data['closingtime']= '';
			$data['pickup_address']= '';
			$data['drop_address']= '';
		}
		if($category_id == '23')
		{
			$data['origin_city'] = '';
			$data['destination_city'] = '';
			$data['tentation_rate_Kg_in_USD']= '';
			$data['starttime']= '';
			$data['closingtime']= '';
			$data['pickup_address']= '';
			$data['drop_address']= '';
		}
		if($category_id == '24')
		{
			$data['expertise_of_industries'] = '';
			$data['my_expected_charges_shipment'] = '';
			$data['port_airport_in_india'] = '';
			$data['pickup_address']= '';
			$data['drop_address']= '';
		}
		if($category_id == '26')
		{
			$data['origin_city'] = '';
			$data['destination_city'] = '';
			$data['port_airport_in_india'] = '';
			$data['pickup_address']= '';
			$data['drop_address']= '';
		}
		
			$data['specific_requirement']= '';

		if($id)
		{	
			$dbValue	= $this->Enquiries_model->getEnquiry($id);
			if(!$dbValue)
			{	
				//page does not exist
				$this->session->set_flashdata('error', 'The requested page could not be found.');
				redirect("user/enquiries/$category_id");
			}
			
				//set values to db values
				$data['id']			        	= $dbValue->id;
			if(($category_id == '2')||($category_id == '3'))
			{
				$data['origin_city']		= $dbValue->origin_city;
				$data['destination_city']	= $dbValue->destination_city;
				$data['when_required_date']	= $dbValue->when_required_date;
				$data['when_required_time']	= $dbValue->when_required_time;
				$data['type_of_transaction']= $dbValue->type_of_transaction;
				$data['type_of_load']		= $dbValue->type_of_load;
				$data['industry_type']		= $dbValue->industry_type;
				$data['product_commodities']= $dbValue->product_commodities;
				$data['approx_weight_kg']	= $dbValue->approx_weight_kg;
				$data['no_of_packets']		= $dbValue->no_of_packets;
				$data['pickup_address']		= $dbValue->pickup_address;
				$data['drop_address']		= $dbValue->drop_address;	
			}
			if($category_id == '5')
			{
				$data['area'] = $dbValue->area;
				$data['area_dimension'] = $dbValue->area_dimension;
				$data['location'] = $dbValue->location;
				$data['whatsapp_no'] = $dbValue->whatsapp_no;
				$data['type_of_warehouse'] = $dbValue->type_of_warehouse;
				$data['services'] = $dbValue->services;
			}	
			if(($category_id=='8')||($category_id == '11'))
			{
				$data['area'] = $dbValue->area;
				$data['city'] = $dbValue->city;
				$data['state'] = $dbValue->state;
				$data['country'] = $dbValue->country;
				$data['name'] = $dbValue->name;
				$data['contact_no'] = $dbValue->contact_no;
				$data['whatsapp_no'] = $dbValue->whatsapp_no;
				$data['email'] = $dbValue->email;
				$data['expected_rate_sqr_feet'] = $dbValue->expected_rate_sqr_feet;
				$data['shed_requirement'] = $dbValue->shed_requirement;
				$data['area_required'] = $dbValue->area_required;
			}
			if(($category_id == '9')||($category_id == '10'))
			{
				$data['street_1'] = $dbValue->street_1;
				$data['street_2'] = $dbValue->street_2;
				$data['town'] = $dbValue->town;
				$data['district'] = $dbValue->district;
				$data['city'] = $dbValue->city;
				$data['state'] = $dbValue->state;
				$data['pincode'] = $dbValue->pincode;
				$data['name'] = $dbValue->name;
				$data['contact_no'] = $dbValue->contact_no;
				$data['whatsapp_no'] = $dbValue->whatsapp_no;
				$data['email'] = $dbValue->email;
				$data['photo_front'] = $dbValue->photo_front;
				$data['photo_inside'] = $dbValue->photo_inside;
				$data['photo_back'] = $dbValue->photo_back;
				$data['photo_side'] = $dbValue->photo_side;
				$data['min_lockin_period'] = $dbValue->min_lockin_period;
				$data['dedicated_and_shared'] = $dbValue->dedicated_and_shared;
				$data['other_services_provide'] = $dbValue->other_services_provide;
				$data['area_required'] = $dbValue->area_required;
				$data['available_for'] = $dbValue->available_for;
				$data['tentative_price_sqr_feet'] = $dbValue->tentative_price_sqr_feet;
			}	
			if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
			{
				$data['origin_city']		= $dbValue->origin_city;
				$data['destination_city']	= $dbValue->destination_city;
				$data['when_required_date']	= $dbValue->when_required_date;
				$data['when_required_time']	= $dbValue->when_required_time;
				if($category_id == '13')
				{
					$data['currency_id'] = $dbValue->currency_id;
					$data['my_expected_freight']= $dbValue->my_expected_freight;
				}
				if($category_id == '14')
				{
					$data['mode_of_shipment']= $dbValue->mode_of_shipment;
				}
				$data['type_of_service']	= $dbValue->type_of_service;
				$data['industry_type']		= $dbValue->industry_type;
				$data['product_commodities']= $dbValue->product_commodities;
				$data['approx_weight_kg']	= $dbValue->approx_weight_kg;
				$data['volume_weight']	= $dbValue->volume_weight;
				$data['no_of_packets']		= $dbValue->no_of_packets;
				$data['dimension']			= $dbValue->dimension;
				$data['pickup_address']		= $dbValue->pickup_address;
				$data['drop_address']		= $dbValue->drop_address;
			}
			if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
			{
				$data['origin_city']		= $dbValue->origin_city;
				$data['destination_city']	= $dbValue->destination_city;
				
				if($category_id == '17')
				{
					$data['target_pricing'] = $dbValue->target_pricing;
					$data['mode_of_transport']	= $dbValue->mode_of_transport;
					$data['industry_type']		= $dbValue->industry_type;
					$data['wishtomove']	= $dbValue->wishtomove;
					$data['pickup_address']		= $dbValue->pickup_address;
					$data['drop_address']		= $dbValue->drop_address;
				}
				if($category_id == '18')
				{
					$data['target_pricing'] = $dbValue->target_pricing;
					$data['type_of_transaction']= $dbValue->type_of_transaction;
					$data['volume_or_dense']	= $dbValue->volume_or_dense;
					$data['approx_weight_kg']	= $dbValue->approx_weight_kg;
					$data['type_of_product']		= $dbValue->type_of_product;
				}
				if($category_id == '19')
				{
					$data['industry_type']		= $dbValue->industry_type;
					$data['product_requirement']	= $dbValue->product_requirement;
					$data['essential_requirement']	= $dbValue->essential_requirement;
					$data['approx_weight_kg']		= $dbValue->approx_weight_kg;
					$data['no_of_vehicles']	= $dbValue->no_of_vehicles;
					$data['volume_or_dense']	= $dbValue->volume_or_dense;
					$data['pickup_address']		= $dbValue->pickup_address;
					$data['drop_address']		= $dbValue->drop_address;
				}
				
				$data['product_commodities']= $dbValue->product_commodities;
				$data['no_of_packets']		= $dbValue->no_of_packets;
				$data['starttime']		= $dbValue->starttime;
				$data['closingtime']		= $dbValue->closingtime;
				$data['vendor_based_post'] = $dbValue->vendor_based_post;
					
			}
			if($category_id == '22')
			{
				$data['origin_city'] = $dbValue->origin_city;
				$data['destination_city'] = $dbValue->destination_city;
				$data['container_type']	= $dbValue->container_type;
				$data['type_of_vehicle'] = $dbValue->type_of_vehicle;
				$data['my_expect_freight'] = $dbValue->my_expect_freight;
				$data['starttime']	= $dbValue->starttime;
				$data['closingtime'] = $dbValue->closingtime;
				$data['pickup_address'] = $dbValue->pickup_address;
				$data['drop_address'] = $dbValue->drop_address;
			}
			if($category_id == '23')
			{
				$data['origin_city'] = $dbValue->origin_city;
				$data['destination_city'] = $dbValue->destination_city;
				$data['tentation_rate_Kg_in_USD'] = $dbValue->tentation_rate_Kg_in_USD;
				$data['starttime']	= $dbValue->starttime;
				$data['closingtime'] = $dbValue->closingtime;
				$data['pickup_address'] = $dbValue->pickup_address;
				$data['drop_address'] = $dbValue->drop_address;
			}
			if($category_id == '24')
			{
				
				$data['expertise_of_industries'] = $dbValue->expertise_of_industries;
				$data['port_airport_in_india'] = $dbValue->port_airport_in_india;
				$data['my_expected_charges_shipment'] = $dbValue->my_expected_charges_shipment;
				$data['pickup_address'] = $dbValue->pickup_address;
				$data['drop_address'] = $dbValue->drop_address;
			}		
				$data['specific_requirement']= $dbValue->specific_requirement;
		}
			if(($category_id == '2')||($category_id == '3'))
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('destination_city', 'Destination City', 'trim|required'); 
				$this->form_validation->set_rules('when_required_date', 'When Required', 'trim|required'); 
				$this->form_validation->set_rules('when_required_time', 'When Required Time', 'trim|required'); 
				$this->form_validation->set_rules('type_of_transaction', 'Type of Transaction', 'trim|required'); 
				$this->form_validation->set_rules('type_of_load', 'Type of Load', 'trim|required'); 
				$this->form_validation->set_rules('industry_type', 'Industry Type', 'trim|required'); 
				$this->form_validation->set_rules('product_commodities', 'Product/Commodities', 'trim|required'); 
				$this->form_validation->set_rules('approx_weight_kg', 'Approx Weight (Kg)', 'trim|required'); 
				$this->form_validation->set_rules('no_of_packets', 'No of Packets', 'required'); 
				$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
				$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required'); 
			}
			if($category_id == '5')
			{
				$this->form_validation->set_rules('area', 'Area', 'trim|required');
				$this->form_validation->set_rules('area_dimension', 'Area Dimension', 'trim|required');
				$this->form_validation->set_rules('location', 'Location', 'trim|required');
				$this->form_validation->set_rules('whatsapp_no', 'WhatsApp no.', 'trim|required');
			}	 
			if(($category_id=='8')||($category_id == '11'))
			{
				$this->form_validation->set_rules('area', 'Area', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('contact_no', 'Contact No', 'trim|required');
				$this->form_validation->set_rules('whatsapp_no', 'WhatsApp No', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('expected_rate_sqr_feet', 'Expected Rate/Sqr Feet', 'trim|required');
				$this->form_validation->set_rules('area_required', 'Area Requirement', 'trim|required');
			}
			if(($category_id == '9')||($category_id == '10'))
			{
				$this->form_validation->set_rules('street_1', 'Street 1', 'trim|required');
				$this->form_validation->set_rules('street_2', 'Street 2', 'trim|required');
				$this->form_validation->set_rules('town', 'Town', 'trim|required');
				$this->form_validation->set_rules('district', 'District', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('contact_no', 'Contact No', 'trim|required');
				$this->form_validation->set_rules('whatsapp_no', 'WhatsApp No', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('min_lockin_period', 'Min Lockin period', 'trim|required');
				$this->form_validation->set_rules('dedicated_and_shared', 'Dedicated and Shared', 'trim|required');
				$this->form_validation->set_rules('area_required', 'Area offered (ft2/m2)', 'trim|required');
				$this->form_validation->set_rules('available_for', 'Available For', 'trim|required');
				$this->form_validation->set_rules('tentative_price_sqr_feet', 'Tentative Price/sqr Feet', 'trim|required');
			}
			if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('destination_city', 'Destination City', 'trim|required'); 
				$this->form_validation->set_rules('when_required_date', 'When Required', 'trim|required'); 
				$this->form_validation->set_rules('when_required_time', 'When Required Time', 'trim|required');
				if($category_id == '13')
				{
					$this->form_validation->set_rules('currency_id', 'Currency', 'trim|required'); 
					$this->form_validation->set_rules('my_expected_freight', 'My expected Freight', 'trim|required'); 
				}
				if($category_id == '14')
				{
					$this->form_validation->set_rules('mode_of_shipment', 'Mode of shipment', 'trim|required');
				} 
				$this->form_validation->set_rules('type_of_service', 'Type of Service', 'trim|required'); 
				$this->form_validation->set_rules('industry_type', 'Industry Type', 'trim|required'); 
				$this->form_validation->set_rules('product_commodities', 'Product/Commodities', 'trim|required'); 
				$this->form_validation->set_rules('approx_weight_kg', 'Approx Weight (Kg)', 'trim|required'); 
				$this->form_validation->set_rules('volume_weight', 'Volume Weight', 'trim|required'); 
				$this->form_validation->set_rules('no_of_packets', 'No of Packets', 'required'); 
				$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
				$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
			}
			if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('destination_city', 'Destination City', 'trim|required'); 

				if($category_id == '17')
				{

					$this->form_validation->set_rules('target_pricing', 'Target Pricing', 'trim|required'); 
					$this->form_validation->set_rules('type_of_transaction', 'Type of Transaction', 'trim|required'); 
					$this->form_validation->set_rules('mode_of_transport', 'Mode of Transport', 'trim|required'); 
					$this->form_validation->set_rules('industry_type', 'Industry Type', 'trim|required'); 
					$this->form_validation->set_rules('wishtomove', 'What do you wish to move?', 'trim|required');
					$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
					$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');  

				}
				if($category_id == '18')
				{
					$this->form_validation->set_rules('target_pricing', 'Target Pricing', 'trim|required'); 
					$this->form_validation->set_rules('type_of_transaction', 'Type of Transaction', 'trim|required');
					$this->form_validation->set_rules('volume_or_dense', 'Volume Or Dense', 'trim|required');
					$this->form_validation->set_rules('approx_weight_kg', 'Approx Weight kg', 'trim|required');
					$this->form_validation->set_rules('type_of_product', 'Type Of Product', 'trim|required');
				}
				if($category_id == '19')
				{
					$this->form_validation->set_rules('industry_type', 'Industry Type', 'trim|required'); 
					$this->form_validation->set_rules('product_requirement', 'Product Requirement', 'trim|required'); 
					$this->form_validation->set_rules('essential_requirement', 'Essential Requirement', 'trim|required'); 
					$this->form_validation->set_rules('no_of_vehicles', 'No Of Vehicles', 'trim|required');
					$this->form_validation->set_rules('volume_or_dense', 'Volume Or Dense', 'trim|required');
					$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
					$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');  
				}
				
				$this->form_validation->set_rules('product_commodities', 'Product/Commodities', 'trim|required');
				$this->form_validation->set_rules('no_of_packets', 'No of Packets', 'required'); 
				$this->form_validation->set_rules('starttime', 'Start Time', 'required'); 
				$this->form_validation->set_rules('closingtime', 'Closing Time', 'required'); 
				$this->form_validation->set_rules('vendor_based_post', 'Vendor Based Post', 'required'); 
				
			}
			if($category_id == '22')
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('destination_city', 'Destination City', 'trim|required');
				$this->form_validation->set_rules('container_type', 'Container Type', 'trim|required');
				$this->form_validation->set_rules('type_of_vehicle', 'Type Of Vehicle', 'trim|required');
				$this->form_validation->set_rules('my_expect_freight', 'My Expect Freight', 'trim|required');
				$this->form_validation->set_rules('starttime', 'Start Time', 'required'); 
				$this->form_validation->set_rules('closingtime', 'Closing Time', 'required');
				$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
				$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
			}
			if($category_id == '23')
			{
				$this->form_validation->set_rules('origin_city', 'Origin City', 'trim|required'); 
				$this->form_validation->set_rules('destination_city', 'Destination City', 'trim|required');
				$this->form_validation->set_rules('tentation_rate_Kg_in_USD', 'Tentation Rate/Kg in USD', 'trim|required');
				$this->form_validation->set_rules('starttime', 'Start Time', 'required'); 
				$this->form_validation->set_rules('closingtime', 'Closing Time', 'required');
				$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
				$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
			}	 
			if($category_id == '24')
			{
				$this->form_validation->set_rules('expertise_of_industries', 'Expertise of Industries', 'trim|required'); 
				$this->form_validation->set_rules('my_expected_charges_shipment', 'My Expected Charges/Shipment', 'trim|required'); 
				$this->form_validation->set_rules('port_airport_in_india', 'Port/Airport in India', 'trim|required'); 
				$this->form_validation->set_rules('pickup_address', 'Pickup Address', 'trim|required'); 
				$this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
			}	 
			
				$this->form_validation->set_rules('specific_requirement', 'Any specific requirement (if any)', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{	
			$this->load->view("user/vwEnquiryForm", $data);
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

			if(($category_id == '2')||($category_id == '3'))
			{	
				$save['origin_city']		 = $this->input->post('origin_city');
				$save['destination_city']	 = $this->input->post('destination_city');
				$save['when_required_date']	 = $this->input->post('when_required_date');
				$save['when_required_time']	 = $this->input->post('when_required_time');
				$save['type_of_transaction'] = $this->input->post('type_of_transaction');
				$save['type_of_load']		 = $this->input->post('type_of_load');
				$save['industry_type']		 = $this->input->post('industry_type');
				$save['product_commodities'] = $this->input->post('product_commodities');
				$save['approx_weight_kg']	 = $this->input->post('approx_weight_kg');
				$save['no_of_packets']		 = $this->input->post('no_of_packets');
				$save['pickup_address']		 = $this->input->post('pickup_address');
				$save['drop_address']		 = $this->input->post('drop_address');
			}
			if($category_id == '5')
			{
				$save['area'] = $this->input->post('area');
				$save['area_dimension'] = $this->input->post('area_dimension');
				$save['location'] = $this->input->post('location');
				$save['whatsapp_no'] = $this->input->post('whatsapp_no');
				foreach($_POST['type_of_warehouse'] as $value) 
				{
					$type_of_warehouse .= $value.',';
				}  
				$save['type_of_warehouse'] = $type_of_warehouse;
				foreach($_POST['services'] as $value) 
				{
					$services .= $value.',';
				}
				$save['services'] = $services;
			}
			if(($category_id=='8')||($category_id == '11'))
			{
				$save['area'] = $this->input->post('area');
				$save['city'] = $this->input->post('city');
				$save['state'] = $this->input->post('state');
				$save['country'] = $this->input->post('country');
				$save['name'] = $this->input->post('name');
				$save['contact_no'] = $this->input->post('contact_no');
				$save['whatsapp_no'] = $this->input->post('whatsapp_no');
				$save['email'] = $this->input->post('email');
				$save['expected_rate_sqr_feet'] = $this->input->post('expected_rate_sqr_feet');
				foreach($_POST['shed_requirement'] as $value) 
				{
					$shed_requirement .= $value.',';
				}
				$save['shed_requirement'] = $shed_requirement;
				$save['area_required'] = $this->input->post('area_required');
			}
			if(($category_id == '9')||($category_id == '10'))
			{
				$save['street_1'] = $this->input->post('street_1');
				$save['street_2'] = $this->input->post('street_2');
				$save['town'] = $this->input->post('town');
				$save['district'] = $this->input->post('district');
				$save['city'] = $this->input->post('city');
				$save['state'] = $this->input->post('state');
				$save['pincode'] = $this->input->post('pincode');
				$save['name'] = $this->input->post('name');
				$save['contact_no'] = $this->input->post('contact_no');
				$save['whatsapp_no'] = $this->input->post('whatsapp_no');
				$save['email'] = $this->input->post('email');

				$filesArr1 = $_FILES['photo_front']['name'];

				if(!empty($filesArr1))
				{		
					$_FILES['enquiry_file']['name']     = $_FILES['photo_front']['name'];
					$_FILES['enquiry_file']['type']     = $_FILES['photo_front']['type'];
					$_FILES['enquiry_file']['tmp_name'] = $_FILES['photo_front']['tmp_name'];
					$_FILES['enquiry_file']['error']    = $_FILES['photo_front']['error'];
					$_FILES['enquiry_file']['size']     = $_FILES['photo_front']['size'];

					$fieldname1 = 'enquiry_file';
					$filename1 = $file1;
					$path1 = 'enquiry/';
					
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
						redirect("user/enquiries/form/$category_id/$id");
						die;
					}
					$save['photo_front'] = json_encode($uploaded_file1);
				}

				$filesArr2 = $_FILES['photo_inside']['name'];

				if(!empty($filesArr2))
				{		
					$_FILES['enquiry_file']['name']     = $_FILES['photo_inside']['name'];
					$_FILES['enquiry_file']['type']     = $_FILES['photo_inside']['type'];
					$_FILES['enquiry_file']['tmp_name'] = $_FILES['photo_inside']['tmp_name'];
					$_FILES['enquiry_file']['error']    = $_FILES['photo_inside']['error'];
					$_FILES['enquiry_file']['size']     = $_FILES['photo_inside']['size'];

					$fieldname2 = 'enquiry_file';
					$filename2 = $file2;
					$path2 = 'enquiry/';
					
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
						redirect("user/enquiries/form/$category_id/$id");
						die;
					}
					$save['photo_inside'] = json_encode($uploaded_file2);
				}
				$filesArr3 = $_FILES['photo_back']['name'];

				if(!empty($filesArr3))
				{		
					$_FILES['enquiry_file']['name']     = $_FILES['photo_back']['name'];
					$_FILES['enquiry_file']['type']     = $_FILES['photo_back']['type'];
					$_FILES['enquiry_file']['tmp_name'] = $_FILES['photo_back']['tmp_name'];
					$_FILES['enquiry_file']['error']    = $_FILES['photo_back']['error'];
					$_FILES['enquiry_file']['size']     = $_FILES['photo_back']['size'];

					$fieldname3 = 'enquiry_file';
					$filename3 = $file3;
					$path3 = 'enquiry/';
					
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
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/enquiries/form/$category_id/$id");
						die;
					}
					$save['photo_back'] = json_encode($uploaded_file3);
				}
				$filesArr4 = $_FILES['photo_side']['name'];

				if(!empty($filesArr4))
				{		
					$_FILES['enquiry_file']['name']     = $_FILES['photo_side']['name'];
					$_FILES['enquiry_file']['type']     = $_FILES['photo_side']['type'];
					$_FILES['enquiry_file']['tmp_name'] = $_FILES['photo_side']['tmp_name'];
					$_FILES['enquiry_file']['error']    = $_FILES['photo_side']['error'];
					$_FILES['enquiry_file']['size']     = $_FILES['photo_side']['size'];

					$fieldname4 = 'enquiry_file';
					$filename4 = $file4;
					$path4 = 'enquiry/';
					
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
						$this->session->set_flashdata('error', $data['error']);
						redirect("user/enquiries/form/$category_id/$id");
						die;
					}
					$save['photo_side'] = json_encode($uploaded_file4);
				}
				
				$save['min_lockin_period'] = $this->input->post('min_lockin_period');
				$save['dedicated_and_shared'] = $this->input->post('dedicated_and_shared');
				foreach($_POST['other_services_provide'] as $value) 
				{
					$other_services_provide .= $value.',';
				}
				$save['other_services_provide'] = $other_services_provide;
				$save['area_required'] = $this->input->post('area_required');
				$save['available_for'] = $this->input->post('available_for');
				$save['tentative_price_sqr_feet'] = $this->input->post('tentative_price_sqr_feet');
			}
			if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
			{	
				$save['origin_city'] = $this->input->post('origin_city');
				$save['destination_city'] = $this->input->post('destination_city');
				$save['when_required_date'] = $this->input->post('when_required_date');
				$save['when_required_time'] = $this->input->post('when_required_time');
				if($category_id == '13')
				{
					$save['currency_id'] = $this->input->post('currency_id');
					$save['my_expected_freight'] = $this->input->post('my_expected_freight'); 
				}
				if($category_id == '14')
				{
					$save['mode_of_shipment'] = $this->input->post('mode_of_shipment');
				}
				$save['type_of_service'] = $this->input->post('type_of_service');
				$save['industry_type'] = $this->input->post('industry_type');
				$save['product_commodities'] = $this->input->post('product_commodities');
				$save['approx_weight_kg'] = $this->input->post('approx_weight_kg');
				$save['volume_weight'] = $this->input->post('volume_weight');
				$save['no_of_packets'] = $this->input->post('no_of_packets');
				$dimension[count($_POST['length'])] = array('length'=>$_POST['length'],'breadth'=>$_POST['breadth'],'height'=>$_POST['height'],'noofpackets'=>$_POST['noofpackets']);
				$save['dimension'] = json_encode($dimension);
				$save['pickup_address']	= $this->input->post('pickup_address');
				$save['drop_address'] = $this->input->post('drop_address');
			}
			if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
			{	
				$save['origin_city']		 = $this->input->post('origin_city');
				$save['destination_city']	 = $this->input->post('destination_city');
				
				if($category_id == '17')
				{
					$save['target_pricing']	= $this->input->post('target_pricing'); 
					$save['type_of_transaction']	= $this->input->post('type_of_transaction'); 
					$save['mode_of_transport']	= $this->input->post('mode_of_transport'); 
					$save['industry_type']		 = $this->input->post('industry_type'); 
					$save['wishtomove']	 = $this->input->post('wishtomove'); 
					$save['pickup_address']		 = $this->input->post('pickup_address');
					$save['drop_address']		 = $this->input->post('drop_address'); 
					$vendor_based_post = array('vendor_based_post'=>$this->input->post('vendor_based_post'),'post_vendor'=>$this->input->post('post_vendor'),'turnover_of_company'=>$this->input->post('turnover_of_company'),'businessyear'=>$this->input->post('businessyear'));

				}
				if($category_id == '18')
				{
					$save['target_pricing'] = $this->input->post('target_pricing');
					$save['type_of_transaction'] = $this->input->post('type_of_transaction');
					$save['volume_or_dense'] = $this->input->post('volume_or_dense');
					$save['approx_weight_kg'] = $this->input->post('approx_weight_kg');
					$save['type_of_product'] = $this->input->post('type_of_product');
					$vendor_based_post = array('vendor_based_post'=>$this->input->post('vendor_based_post'),'turnover_of_company'=>$this->input->post('turnover_of_company'),'businessyear'=>$this->input->post('businessyear'));
				}
				if($category_id == '19')
				{
					$save['industry_type']		 = $this->input->post('industry_type');
					$save['product_requirement'] = $this->input->post('product_requirement');
					$save['essential_requirement'] = $this->input->post('essential_requirement'); 
					$save['approx_weight_kg'] = $this->input->post('approx_weight_kg'); 
					$save['no_of_vehicles'] = $this->input->post('no_of_vehicles');
					$save['volume_or_dense'] = $this->input->post('volume_or_dense');
					$save['pickup_address']	= $this->input->post('pickup_address');
					$save['drop_address']	= $this->input->post('drop_address'); 
					$vendor_based_post = array('vendor_based_post'=>$this->input->post('vendor_based_post'),'post_vendor'=>$this->input->post('post_vendor'),'turnover_of_company'=>$this->input->post('turnover_of_company'),'businessyear'=>$this->input->post('businessyear'));
				}
				
				$save['product_commodities'] = $this->input->post('product_commodities');
				$save['no_of_packets']		 = $this->input->post('no_of_packets');
				$save['starttime']		 = $this->input->post('starttime');
				$save['closingtime']		 = $this->input->post('closingtime');
				$save['vendor_based_post']	 = json_encode($vendor_based_post);
			
			}
			if($category_id == '22')
			{
				$save['origin_city'] = $this->input->post('origin_city');
				$save['destination_city'] = $this->input->post('destination_city');
				$save['container_type'] = $this->input->post('container_type');
				$save['type_of_vehicle'] = $this->input->post('type_of_vehicle');
				$save['my_expect_freight'] = $this->input->post('my_expect_freight');
				$save['starttime'] = $this->input->post('starttime');
				$save['closingtime'] = $this->input->post('closingtime');
				$save['pickup_address']	= $this->input->post('pickup_address');
				$save['drop_address'] = $this->input->post('drop_address'); 
			}
			if($category_id == '23')
			{
				$save['origin_city'] = $this->input->post('origin_city');
				$save['destination_city'] = $this->input->post('destination_city');
				$save['tentation_rate_Kg_in_USD'] = $this->input->post('tentation_rate_Kg_in_USD');
				$save['starttime'] = $this->input->post('starttime');
				$save['closingtime'] = $this->input->post('closingtime');
				$save['pickup_address']	= $this->input->post('pickup_address');
				$save['drop_address'] = $this->input->post('drop_address'); 
			}
			if($category_id == '24')
			{
				$save['expertise_of_industries'] = $this->input->post('expertise_of_industries');
				$save['my_expected_charges_shipment'] = $this->input->post('my_expected_charges_shipment');
				$save['port_airport_in_india'] = $this->input->post('port_airport_in_india');
				$save['pickup_address']	= $this->input->post('pickup_address');
				$save['drop_address'] = $this->input->post('drop_address'); 
			}
				$save['specific_requirement'] = $this->input->post('specific_requirement');

			$dbId = $this->Enquiries_model->saveEnquiry($save);
			
			$this->session->set_flashdata('message', 'Enquiry saved successfully.');

			redirect("user/enquiries/$category_id");
		}
	}
	public function changeStatus()
	{
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->where('id', $id);
		$this->db->update('enquiries', array('status' => $status));
		
		$num  = $this->db->affected_rows();
		
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function delete_enquiries($category_id,$id)
	{		
		$del = $this->Enquiries_model->deleteEnquiry($id);	
		if($del)
		{
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}
		else
		{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/enquiries/$category_id");	
	}	
	public function assignDriver()
	{		
		$referenceid	= $this->input->post('referenceid');
		$driverid   = $this->input->post('driverid');

		$dr_id = $this->Enquiries_model->assignDriver($driverid,$referenceid);		
		if($dr_id > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function assignVendor()
	{		
		$enquiryid	= $this->input->post('enquiryid');
		$vendorids   = $this->input->post('vendorids');
		$values = '';
		foreach ($vendorids as $value) 
		{
			$values .= $value.",";
		}
		$vr_id = $this->Enquiries_model->assignVendor($values,$enquiryid);		
		if($vr_id > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}
