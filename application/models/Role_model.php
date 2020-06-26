<?php
Class Role_model extends CI_Model
{
	function get_roles(){
		
		$query = $this->db->order_by('id', 'DESC')->get_where('role', array('status' => '1'))->result();
		// echo $this->db->last_query(); die;
		return $query;
    }
	
	function get_menus(){
		
		$query = $this->db->order_by('id', 'ASC')->get_where('menu_master', array('status' => '1'))->result();
		// echo $this->db->last_query(); die;
		return $query;
    }
	
	function save_role($save){
	   
		if ($save['id'] != ""){
			
			$this->db->where('id', $save['id']);
			$this->db->update('role', $save);

			$id	= $save['id'];
		}
		else{
			
			$this->db->insert('role', $save);
			$id	= $this->db->insert_id();
		}
		return $id;
	}
	
	function get_role($id){
		
		$query = $this->db->get_where('role', array('id'=>$id))->row();
		return $query;
    }
	
	function delete_role($id){
		
		return $this->db->where('id', $id)->delete('role');
	}
	
}