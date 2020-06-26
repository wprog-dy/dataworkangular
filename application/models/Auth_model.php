<?php
Class Auth_model extends CI_Model
{
	function get_users($user_type){
		
		$query = $this->db->order_by('id', 'DESC')->get_where('users', array('user_type' => $user_type))->result();
		// echo $this->db->last_query(); die;
		return $query;
    }
}    
?>