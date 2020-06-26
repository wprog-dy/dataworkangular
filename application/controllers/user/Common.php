<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

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
		$this->load->model('User_model');
		
		if (!$this->session->userdata('is_user_login')) {
			redirect('/');
		}
    }
	
	public function import_excel($user_type, $processedData = false){	
		
		$data['page_title'] 	= "Upload Excel(".ucfirst($user_type).")";
		$data['user_type'] 		= $user_type;
		$data['processedData'] 	= $processedData;
		
		$this->form_validation->set_rules('excel_file', 'File', 'trim|xss_clean|callback_file_selected');
		
		//Validate the form
		if($this->form_validation->run() == false){	

			$this->load->view('user/vwImportExcel', $data);
		}else{	
			
			if(!empty($_FILES['excel_file']['name'])){	
				
				$filename = $_FILES['excel_file']['name'];
				$fieldname = 'excel_file';
				$path = "excel/$user_type";
				
				$config['upload_path']          = "./uploads/$path";
				$config['allowed_types']        = 'csv';
				$config['file_name'] 			= time().'_'.$filename;
				$config['remove_spaces'] 		= true;
				// $config['encrypt_name'] 		= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if ( !$this->upload->do_upload($fieldname))
				{
					$data['error'] = array('error' => $this->upload->display_errors());
					
					$this->session->set_flashdata('error', $data['error']);
					
					// redirect("user/common/import_excel/$user_type");
					$this->load->view('user/vwImportExcel', $data);
				}
				else
				{
					$data['upload_data'] = $this->upload->data();
					$data['uploaded_file_name'] = $data['upload_data']['file_name'];
					
					$location = $config['upload_path']."/".$data['uploaded_file_name'];
					
					$data['csvdata'] = $this->parse_file($location, $user_type);
					// echo $data['csvdata']['error']; die;
					$this->session->set_flashdata('message', 'File uploaded successfully.');
					if(isset($data['csvdata']['error'])){
						$this->session->set_flashdata('error', $data['csvdata']['error']);
					}
					$this->load->view('user/vwImportExcel', $data);
				}
			} 
		}
	}
	
	public function processExcel($user_type, $fileName){
		
		$location = "./uploads/excel/$user_type/$fileName";
		$data = $this->parse_file($location, $user_type);
		
		$result = $this->User_model->processExcel($data, $user_type);
		 
        // $processedData['insert']	= $result['insert'];
        // $processedData['error']	= $result['error'];
        $processedData		= $result;
        
		$this->import_excel($user_type, $processedData);
		// redirect("user/common/import_excel/$user_type/$processedData");
	}
	
	public function file_selected(){

		$this->form_validation->set_message('file_selected', 'Please select a file to upload!');
		
		if(empty($_FILES['excel_file']['name'])) {
			return false;
		}else{
			return true;
		}
	}

	public function checkPhone(){
		
		$id 	= $this->input->post('id');
		$phone 	= $this->input->post('phone');

		$num = $this->User_model->checkPhone($id, $phone);
		
		if ($num > 0) {
			echo json_encode(FALSE);
		}else{
			echo json_encode(TRUE);
		}
	}
	
	public function checkEmail(){
		
		$id 	= $this->input->post('id');
		$email 	= $this->input->post('email');
		
		$num = $this->User_model->checkEmail($id, $email);
		
		if ($num > 0) {
			echo json_encode(FALSE);
		}else{
			echo json_encode(TRUE);
		}
	}
	
	public function changeStatus(){
		
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');
		
		$this->db->where('id', $id);
		$this->db->update('users', array('status' => $status));
		
		$num  = $this->db->affected_rows();
		
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	
	public function changeFeatured(){
		
		$id 	= $this->input->post('id');
		$featured = $this->input->post('featured');
		
		$this->db->where('id', $id);
		$this->db->update('users', array('featured' => $featured));
		
		// echo $this->db->last_query(); 
		$num  = $this->db->affected_rows();
		// echo $num; die;
		if ($num > 0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	
	public function delete_user($id, $user_type){
		
		$del = $this->User_model->delete_user($id);
		
		if($del){
			$this->session->set_flashdata('message','Entry deleted successfully.');
		}else{
			$this->session->set_flashdata('error','Entry could not be deleted, please try again.');
		}
		redirect("user/$user_type");	
	}
	
	var $fields;           		//columns names retrieved after parsing
    var $separator = ';';    	//separator used to explode each line
    var $enclosure = '"';    	//enclosure used to decorate each field
    var $max_row_size = 4096;   //maximum row size to be used for decoding

    function parse_file($p_Filepath, $user_type) {
		//echo $p_Filepath; die;
		$file = fopen($p_Filepath, 'r');
		$this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
		$keys = str_getcsv($this->fields[0]);
		
		$count = count($keys);
		// echo $count; die;
		if($user_type == 'vendor'){
			if($count != '21'){
				fclose($file);
				$content['error'] = 'Wrong format uploaded! Please downlaod the compatible format, edit it and then upload the file.';
				return $content;
			}
		}else if($user_type == 'customer'){
			if($count != '17'){
				fclose($file);
				$content['error'] = 'Wrong format uploaded! Please download the compatible format, edit it and then upload the file.';
				return $content;
			}
		}
		
		$i = 0;
		while (($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false) {
			if ($row != null) { // skip empty lines
				$values = str_getcsv($row[0]);
				if (count($keys) == count($values)) {
					$arr = array();
					for ($j = 0; $j < count($keys); $j++) {
						if ($keys[$j] != "") {
							$arr[$keys[$j]] = $values[$j];
						}
					}
					// print_r($arr);
					$content[$i] = $arr;
					$i++;
				}
			}
		}
		fclose($file);

		// echo '<pre>'; print_r($content); die;

		return $content;
		}
	
}