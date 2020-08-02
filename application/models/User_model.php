<?php
Class User_model extends CI_Model
{
	function get_users($user_type){
		
		$query = $this->db->order_by('id', 'DESC')->get_where('users', array('user_type' => $user_type))->result();
		// echo $this->db->last_query(); die;
		return $query;
    }
	function saveVendorbit($save)
	{
		$this->db->insert('vendor_enquiry_bit', $save);
		$id	= $this->db->insert_id();
		return $id;
	}	
	function getVendorbit($category_id,$enquiryid,$vendor_id)
	{
		$query = $this->db->order_by('id', 'DESC')->get_where('vendor_enquiry_bit', array('category_id' => $category_id,'enquiry_id' => $enquiryid,'vendor_id' => $vendor_id,))->result();
		return $query;
	}
	function save_user($save){
	   
		if ($save['id'] != ""){
			
			$this->db->where('id', $save['id']);
			$this->db->update('users', $save);

			$id	= $save['id'];
		}
		else{
			
			$this->db->insert('users', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	function save_contact($save)
	{
		$this->db->insert('contact', $save);
		$id	= $this->db->insert_id();
		return $id;
	}
	function allcontact($user_type)
    {
		$query = $this->db->join('users','users.id=contact.userid')->get_where('contact', array('contact.user_type'=>$user_type))->result();
		return $query;
    }
	function get_user($id){
		
		$query = $this->db->get_where('users', array('id'=>$id))->row();
		return $query;
    }
    function get_drivers($id)
    {
		
		$query = $this->db->get_where('drivers', array('vendor_id'=>$id))->result();
		return $query;
    }
    function get_vehicles($id)
    {
		$query = $this->db->query("select vehicles.id as vehiclesid,vehicles.vehicle_type,vehicles.vehicle_no,vehicles.status,drivers.id,drivers.driver_name from vehicles inner join drivers on drivers.id=vehicles.assign_driver_id  where  vehicles.vendor_id = $id")->result();
		return $query;
    }
	function get_lastLoginCode($user_type){
		
		$this->db->select('login_code'); 
		$this->db->from('users');   
		$this->db->where('user_type', $user_type);
		$this->db->order_by('login_code', 'DESC');
		$query = $this->db->get()->row()->login_code;
		
		return $query;
    }
	
	function checkPhone($id, $phone){
		
		if($id == ""){
			$this->db->where('phone', $phone);
			$num = $this->db->count_all_results('users');
		}else{
			$this->db->where('phone', $phone);
			$this->db->where_not_in('id', $id);
			$num = $this->db->count_all_results('users');
		}
		return $num;
	}
	
	function checkEmail($id, $email){
		
		if($id == ""){
			$this->db->where('email', $email);
			$num = $this->db->count_all_results('users');
		}else{
			$this->db->where('email', $email);
			$this->db->where_not_in('id', $id);
			$num = $this->db->count_all_results('users');
		}
		return $num;
	}
	
	function check_loginCode($user_type, $login_code){
		
		$this->db->where(array('login_code'=>$login_code, 'user_type'=>$user_type));
		$this->db->from('users'); 
		return $this->db->count_all_results();
	}
	
	function delete_user($id){
		
		return $this->db->where('id', $id)->delete('users');
	}
	
	function processExcel($data, $user_type){
		
		$return_array = array(
							'insert'=> 	0,
							'error' => 	array(
											'count' => 0,
											'errorRow' => array()
										)
						);
		$i = 0;			
		foreach ($data as $data){
			$i++;
			$save['id']					= "";
			$save['first_name'] 		= ucwords(utf8_encode($data['First Name']));
            $save['last_name'] 			= ucwords(utf8_encode($data['Last Name']));
			$save['email'] 				= utf8_encode($data['Email']);
			// $save['login_code']		= ucwords(utf8_encode($data['Phone']));
			$save['phone'] 				= utf8_encode($data['Phone']);
			$save['other_phone'] 		= utf8_encode($data['Other Phone']);
			$save['landline'] 			= utf8_encode($data['Landline']);
			$save['pancard_no'] 		= strtoupper(utf8_encode($data['Pancard No']));
			$save['industry_type'] 		= ucwords(utf8_encode($data['Industry Type']));
			
			if($user_type == 'vendor'){
			
			$save['additional_info']	= ucfirst(utf8_encode($data['Additional Info']));
			$save['main_services'] 		= ucwords(utf8_encode($data['Main Services']));
			$save['services'] 			= ucwords(utf8_encode($data['Services']));
			$save['featured'] 			= strtolower(utf8_encode($data['Featured'])) == 'yes' ? 1 : 0;
			
			}
			
			$save['city']				= ucwords(utf8_encode($data['City']));
			$save['contact_person'] 	= ucwords(utf8_encode($data['Contact Person']));
			$save['company_type'] 		= ucwords(strtolower(utf8_encode($data['Company Type'])));
			$save['company_name'] 		= ucwords(utf8_encode($data['Company Name']));
			$save['company_website'] 	= utf8_encode($data['Company Website']);
			$save['gst_no'] 			= utf8_encode($data['GSTIN Number']);
			$save['business_years']  	= utf8_encode($data['Business Years']);
			$save['password'] 			= base64_encode(ucwords(utf8_encode($data['Password'])));
			// $save['verification_docs'] 	= ucwords(utf8_encode($data['Consultant Name']));
			$save['user_type'] 			= $user_type;
			$save['status'] 			= strtolower(utf8_encode($data['Blocked'])) == 'yes' ? 0 : 1;
			
			$error 			= 0;
			$errorReason 	= "";
			
			if($save['first_name'] == "" || $save['email'] == "" || $save['industry_type'] == "" ||  $save['city'] == "" || $save['contact_person'] == "" || $save['company_type'] == "" || $save['company_name'] == "" || $save['business_years'] == "" || $save['password'] == ""){
				$error +=1;
				// echo 'here1 '.$error; die;
				$errorReason = "Empty <br>First Name or <br>Email or <br>Industry Type or <br>City or <br>Contact Person or <br>Company Type or <br>Company Name or <br>Business Years or <br>Password";
			}
			
			if($save['email'] != "" && $error == 0){
				if(!filter_var($save['email'], FILTER_VALIDATE_EMAIL)){
					$error +=1;
					// echo 'here2 '.$error; die;
					$errorReason = "Invalid Email";
				}
			}
			
			if($save['phone'] != "" && $error == 0){
				if(!is_numeric($save['phone']) && strlen($save['phone']) == 10){
					$error +=1;
					// echo 'here3 '.$error; die;
					$errorReason = "Invalid Phone";
				}
			}
			
			if($save['other_phone'] != "" && $error == 0){
				if(!is_numeric($save['other_phone']) && strlen($save['other_phone']) == 10){
					$error +=1;
					// echo 'here4 '.$error; die;
					$errorReason = "Invalid Other Phone";
				}
			}
			if($save['landline'] != "" && $error == 0){
				if(!is_numeric($save['landline']) && strlen($save['landline']) == 10){
					$error +=1;
					// echo 'here5 '.$error; die;
					$errorReason = "Invalid Landline";
				}
			}
			
			if($save['pancard_no'] != "" && $error == 0){
				
				$pattern = '/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/';
				
				$match = preg_match($pattern, $save['pancard_no']);
				
				if(!$match) {
					$error +=1;
				}
				// echo 'here6 '.$error; die;
				$errorReason = "Invalid Pancard";
			}
			
			if($save['company_type'] != "" && $error == 0){
				
				$companyTypeArr = ['Proprietorship', 'Partnership', 'Ltd.', 'Pvt. Ltd.'];
				
				if(!in_array($save['company_type'], $companyTypeArr)){
					$error +=1;
				}
				// echo 'here7 '.$error; die;
				$errorReason = "Invalid Company Type! <br>Values can be: <br>Proprietorship or <br>Partnership or <br>Ltd. or <br>Pvt. Ltd.";
			}
			
			if($save['company_website'] != "" && $error == 0){
				
				$pattern = '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i';
				
				$match = preg_match($pattern, $save['company_website']);
				
				if (!$match) {
					$error +=1;
				}
				// echo 'here8 '.$error; die;
				$errorReason = "Invalid Company Website";
			}
			
			if($user_type == 'vendor' && $error == 0){
				if($save['additional_info'] == "" || $save['main_services'] == "" || $save['services'] == ""){
					$error +=1;
				}
				// echo 'here9 '.$error; die;
				$errorReason = "Empty <br>Additional Info or <br>Main Services or <br>Services";
			}
			
			if($error == 0){
				$duplicateEmail = $this->checkEmail('', $save['email']);
				if($duplicateEmail != 0){
					$error +=1;
				}
				// echo 'here10 '.$error; die;
				$errorReason = "Duplicate Email";
			}
			
			if($error == 0){
				$duplicatePhone = $this->checkPhone('', $save['phone']);
				if($duplicatePhone != 0){
					$error +=1;
				}
				// echo 'here11 '.$error; die;
				$errorReason = "Duplicate Phone";
			}
			
			if($error != 0){
				$return_array['error']['count']++;
				$return_array['error']['errorRow'][$i+1] = $data;
				$return_array['error']['errorReason'][$i+1] = $errorReason;
				continue;
			}else{
				$dbId = $this->save_user($save);
				$update['id'] = $dbId;
				$update['login_code'] = generate_loginCode($user_type);
				
				// echo $update['login_code']; echo '<br>';
				$this->save_user($update);
				$return_array['insert']++;
			}
			// echo '<pre>'; print_r($save);	
		}
		// die;
		return ($return_array); 
	}
}