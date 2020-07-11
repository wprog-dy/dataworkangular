<?php
Class Enquiries_model extends CI_Model
{
	function getCategory($category_id)
	{
		$query = $this->db->order_by('id', 'DESC')->where('id',$category_id)->get_where('categories')->row();
		return $query;
    }
    function getEnquiries($category_id)
	{
		$query = $this->db->order_by('id', 'DESC')->where('category_id', $category_id)->get_where('enquiries')->result();
		return $query;
    } 
    function getBitEnquiries()
    {
    	$query = $this->db->order_by('vendor_enquiry_bit.id', 'DESC')->join('users','users.id=vendor_enquiry_bit.vendor_id')->join('categories','categories.id=vendor_enquiry_bit.category_id')->get_where('vendor_enquiry_bit')->result();
		return $query;
    }
    function getEnquiries2($category_id)
	{
		$query = $this->db->order_by('id', 'DESC')->where('category_id', $category_id)->get_where('enquiries2')->result();
		return $query;
    }
    function getallEnquiries()
	{
		$query = $this->db->order_by('enquiries.id', 'DESC')->select('enquiries.id as enquiryid,users.first_name,users.last_name,categories.category_name,enquiries.category_id,enquiries.industry_type,enquiries.when_required_date,enquiries.product_commodities as product,enquiries.type_of_warehouse as type_of_warehouse,enquiries.customerid,enquiries.origin_city,enquiries.destination_city,enquiries.created_date,enquiries.admin_setting_status,enquiries.assign_vendor_ids')->join('categories', 'categories.id  = enquiries.category_id')->join('users', 'users.id = enquiries.customerid')->get_where('enquiries')->result();
		return $query;
    }
    function getCurrencies()
	{
		$query = $this->db->order_by('id', 'ASC')->get_where('currencies')->result();
		return $query;
    }
    function updateEnquiryStatus($enquiry_id,$reference_id,$save,$bitid)
    {
    	$this->db->where('enquiry_id', $enquiry_id);
    	$this->db->where('reference_id', $reference_id);
    	$this->db->where('id', $bitid);
		$this->db->update('vendor_enquiry_bit', $save);

		if($reference_id)
		{
			$this->db->where('id', $enquiry_id);
	    	$this->db->where('reference_id', $reference_id);
			$this->db->update('enquiries', $save);
		}
		return $reference_id;
    }
	function saveEnquiry($save){
	   
		if ($save['id'] != ""){
			
			$this->db->where('id', $save['id']);
			$this->db->update('enquiries', $save);

			$id	= $save['id'];
		}
		else{
			
			$this->db->insert('enquiries', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function getEnquiry($category_id,$enquiryid)
	{
		$query = $this->db->get_where('enquiries', array('id'=>$enquiryid,'category_id'=>$category_id))->row();
		return $query;
    }
    function getVendorReplay($customerid)
    {
    	$query = $this->db->order_by('vendor_enquiry_bit.id', 'DESC')->select('vendor_enquiry_bit.id as bitid,enquiries.origin_city,vendor_enquiry_bit.enquiry_id,enquiries.destination_city,enquiries.when_required_date,enquiries.product,enquiries.type_of_transaction,enquiries.type_of_load,vendor_enquiry_bit.created_date as replaied_date')->join('enquiries','enquiries.id = vendor_enquiry_bit.enquiry_id')->get_where('vendor_enquiry_bit', array('vendor_enquiry_bit.customerid'=>$customerid))->result();
    	return $query;
    }
    function getOrderSummary($customerid)
    {
    	$query = $this->db->order_by('vendor_enquiry_bit.rate_per_unit')->group_by('vendor_enquiry_bit.category_id')->select('min(vendor_enquiry_bit.rate_per_unit) as rate, categories.category_name,enquiries.reference_id,enquiries.equiry_status,vendor_enquiry_bit.enquiry_id,vendor_enquiry_bit.created_date as replaied_date')->join('enquiries','enquiries.id = vendor_enquiry_bit.enquiry_id')->join('categories','categories.id = vendor_enquiry_bit.category_id')->get_where('vendor_enquiry_bit', array('vendor_enquiry_bit.customerid'=>$customerid))->result();
    	return $query;
    }
    function getOrderSummaryList($customerid,$enquiry_id)
    {
		$query = $this->db->group_by('vendor_enquiry_bit.rate_per_unit')->select('enquiries.origin_city,enquiries.destination_city,categories.category_name,users.company_name,users.company_website,users.phone,vendor_enquiry_bit.rate_per_unit,vendor_enquiry_bit.equiry_status,vendor_enquiry_bit.enquiry_id,vendor_enquiry_bit.id as bitid,vendor_enquiry_bit.reference_id')->join('categories','categories.id = vendor_enquiry_bit.category_id')->join('enquiries','enquiries.id = vendor_enquiry_bit.enquiry_id')->join('users','users.id = vendor_enquiry_bit.vendor_id')->get_where('vendor_enquiry_bit', array('vendor_enquiry_bit.customerid'=>$customerid,'vendor_enquiry_bit.enquiry_id'=>$enquiry_id))->result();
    	return $query;
    }
    function getVendorReplies($vendorid)
    {
    	$query = $this->db->order_by('vendor_enquiry_bit.id', 'DESC')->select('enquiries.origin_city,vendor_enquiry_bit.enquiry_id,enquiries.destination_city,enquiries.when_required_date,enquiries.product,enquiries.type_of_transaction,enquiries.type_of_load,vendor_enquiry_bit.created_date as replaied_date,users.first_name,users.last_name,vendor_enquiry_bit.equiry_status,vendor_enquiry_bit.reference_id,vendor_enquiry_bit.id as bitid')->join('users','users.id = vendor_enquiry_bit.customerid')->join('enquiries','enquiries.id = vendor_enquiry_bit.enquiry_id')->get_where('vendor_enquiry_bit', array('vendor_enquiry_bit.vendor_id'=>$vendorid))->result();
    	return $query;
    }
    function getVendorReplayDetail($enquiry_id,$bitid)
    {
    	$query = $this->db->join('enquiries','enquiries.id = vendor_enquiry_bit.enquiry_id')->join('categories','categories.id = vendor_enquiry_bit.category_id')->join('users','users.id = vendor_enquiry_bit.vendor_id')->get_where('vendor_enquiry_bit', array('vendor_enquiry_bit.enquiry_id'=>$enquiry_id,'vendor_enquiry_bit.id'=>$bitid))->result();
    	return $query;
    }
	function deleteEnquiry($id)
	{
		return $this->db->where('id', $id)->delete('enquiries');
	}
	function chkSetting()
	{
		$query = $this->db->order_by('id', 'DESC')->get_where('setting')->row();
		return $query;
	}
	function assignDriver($driverid,$referenceid)
	{
		$save['assign_driver_id'] = $driverid;
		$this->db->where('reference_id',$referenceid);
		$this->db->update('vendor_enquiry_bit', $save);
		return $driverid;
	}
	function assignVendor($vendorids,$enquiryid)
	{
		$save['assign_vendor_ids'] = $vendorids;
		$this->db->where('id',$enquiryid);
		$this->db->update('enquiries', $save);
		return $enquiryid;
	}
}