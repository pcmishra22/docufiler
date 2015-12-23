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
		$query = $this->db->get('admin');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}
	
	//delete template
	function deleteTemplate($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('email_templates'); 	
	}
	
	//delete user
	function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users'); 	
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
	//list all promo code
	
	function listAllPromoCodes()
	{
			$sql = "SELECT * FROM promotionalcode" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all pages
	
	function listAllpages()
	{
			$sql = "SELECT * FROM pages" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all settings
	
	function listAllSettings()
	{
			$sql = "SELECT * FROM settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list promotion by id
	
	function listPromotionById($id)
	{
			$sql = "SELECT * FROM promotionalcode where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list plan by id
	
	function listPlanById($id)
	{
			$sql = "SELECT * FROM plans where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list pages by id
	
	function listPageById($id)
	{
			$sql = "SELECT * FROM pages where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list template by id
	function listTemplateById($id)
	{
			$sql = "SELECT * FROM email_templates where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//settings details
	
	function getSettingsDetails()
	{
			$sql = "SELECT * FROM settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}	
	//list all email templates
	function listAlltemplates()
	{
			$sql = "SELECT * FROM email_templates" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all filesize
	function listAllFiles()
	{
		$sql = "SELECT * FROM user_files" ; 
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	//setting details
	function getSettings()
	{
			$sql = "SELECT * FROM settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all payments
	function listAllPayments()
	{
			$sql = "SELECT * FROM billing" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all plans
	
	function listAllPlans()
	{
			$sql = "SELECT * FROM plans" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//list all users
	function listAllusers()
	{
			$sql = "SELECT * FROM users" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//get file details by id
	function getFile($id)
	{
			$sql = "SELECT * FROM user_files where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	
	//delete plans
	function deletePlan($id)
	{
		$this->db->delete('plans', array('id' => $id));
	}
	
	//delete promotionalcode
	function deletePromotion($id)
	{
		$this->db->delete('promotionalcode', array('id' => $id));
	}
	//delete pages
	function deletePages($id)
	{
		$this->db->delete('pages', array('id' => $id));
	}
	//delete file
	function deleteFile($id)
	{
		$this->db->delete('user_files', array('id' => $id));
	}

}

