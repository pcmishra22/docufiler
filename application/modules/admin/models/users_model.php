<?php

class Users_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	
	function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('doc_admin');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
	
	//delete template
	function deleteTemplate($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('doc_email_templates'); 	
	}
	
	//delete user
	function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('doc_user'); 	
	}

	//delete data
	function deleteData($id,$tablename)
	{
		$this->db->where('id', $id);
		$this->db->delete($tablename); 	
	}	
	
	//update data
	function updateData($id,$tablename,$data)
	{
		$this->db->where('id', $id);
		$this->db->update($tablename, $data);
		$id = $this->db->insert_id(); 
		return @$id;
	}
	
	//save data
	function saveData($tablename,$data)
	{
		$this->db->insert($tablename, $data);
		$id = $this->db->insert_id(); 
		return @$id;
	}
    
	/**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in_admin'] = $udata['is_logged_in_admin']; 
		}
		return $user;
	}
	//list template by id
	function listTemplateById($id)
	{
			$sql = "SELECT * FROM doc_email_templates where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all email templates
	function listAlltemplates()
	{
			$sql = "SELECT * FROM doc_email_templates" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	
	//list all users
	function listAllusers()
	{
			$sql = "SELECT * FROM doc_user" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	

}

