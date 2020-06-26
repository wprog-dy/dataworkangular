<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_loginCode($user_type, $lastLoginCode = false){
	
	$CI = &get_instance();
	$CI->load->model('User_model');
	
	if(!$lastLoginCode){
		$lastLoginCode = $CI->User_model->get_lastLoginCode($user_type);
	}	
	
	if($user_type == 'vendor'){
		$prefix = 'LWV';
	}elseif($user_type == 'customer'){
		$prefix = 'LWC';
	}
	// $lastLoginCode = 'LWV999';
	
	if(empty($lastLoginCode)){
		$suffix = 1;
	}else{
		$prevSuffix = substr($lastLoginCode, 3);
		$suffix = $prevSuffix + 1;
	} 
	
	$padAmount = 3;
	if($suffix > 999){
		$padAmount = strlen($suffix);;
	}
	
	// $paddingCode = str_pad($suffix, 3, '0', STR_PAD_LEFT);
	$paddingCode = str_pad($suffix, $padAmount, '0', STR_PAD_LEFT);
	$nextLoginCode = $prefix.$paddingCode;
	
	// echo $user_type; 
	$validLoginCode = $CI->User_model->check_loginCode($user_type, $nextLoginCode);
	
	if($validLoginCode > 0){
		generate_loginCode($user_type, $nextLoginCode);
	}
	return $nextLoginCode;
}