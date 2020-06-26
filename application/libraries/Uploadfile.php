<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadfile
{	
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
        $this->CI->load->helper('form');
    }
    
	function do_upload($fieldname, $filename, $path){
		echo 'lalala'; 
		if(!file_exists(getcwd()."/uploads/$path") && !is_dir(getcwd()."/uploads/$path")){
			
			mkdir(getcwd()."/uploads/$path", 0777, true);
		}
		
		$config['upload_path']          = "./uploads/$path";
		$config['allowed_types']        = '*';
		/* $config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768; */
		$config['remove_spaces'] 		= true;
		$config['encrypt_name'] 		= true;
		
		$this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
		
		if ( !$this->CI->upload->do_upload($fieldname))
		{
			$data['error'] = array('error' => $this->CI->upload->display_errors());
		}
		else
		{
			$upload_data = $this->CI->upload->data();
			$data['uploaded_file_name'] = $upload_data['file_name'];
		}
		return $data;
	}
}