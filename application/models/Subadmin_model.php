<?php
Class Subadmin_model extends CI_Model
{
	function get_subadmins(){
		
		$query = $this->db->order_by('id', 'DESC')->get_where('admin', array('status' => '1'))->result();
		// echo $this->db->last_query(); die;
		// $this->db->select('admin.*, menu_master.menu_name')->from('admin')->join('role', 'admin.role = role.id')->join('role.id = menu_master.')->where(array('status' => '1'))->get();
		return $query;
    }
	
	function save_subadmin($save){
	   
		if ($save['id'] != ""){
			
			$this->db->where('id', $save['id']);
			$this->db->update('admin', $save);

			$id	= $save['id'];
		}
		else{
			
			$this->db->insert('admin', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function get_subadmin($id){
		
		$query = $this->db->get_where('admin', array('id'=>$id))->row();
		return $query;
    }
	
	function checkPhone($id, $phone){
		
		if($id == ""){
			$this->db->where('phone', $phone);
			$num = $this->db->count_all_results('admin');
		}else{
			$this->db->where('phone', $phone);
			$this->db->where_not_in('id', $id);
			$num = $this->db->count_all_results('admin');
		}
		return $num;
	}
	
	function checkEmail($id, $email){
		
		if($id == ""){
			$this->db->where('email', $email);
			$num = $this->db->count_all_results('admin');
		}else{
			$this->db->where('email', $email);
			$this->db->where_not_in('id', $id);
			$num = $this->db->count_all_results('admin');
		}
		return $num;
	}
	
	function delete_subadmin($id){
		
		return $this->db->where('id', $id)->delete('admin');
	}
	
}