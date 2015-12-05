 <?php

class Users_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	//update marks of user
	function updateMarksofUser($subject,$roll,$marks)
	{
		$sql = "SELECT * FROM exam_student where rollno=".$roll; 
		$query = $this->db->query($sql);
        $result = $query->result_array();

        if($subject=='aptitude')
        {
        	if($result[0]['aptitude_marks']=='')
        	{
        		$data=array('aptitude_marks'=>$marks);
				$this->db->where('rollno',$roll);
				$this->db->update('exam_student',$data);
        	}
        }
        else
        {
        	if($result[0]['technical_marks']=='')
        	{
        		$data=array('technical_marks'=>$marks);
				$this->db->where('rollno',$roll);
				$this->db->update('exam_student',$data);
        	}
        }

	}
	//get file details by id
	function getFile($id)
	{
			$sql = "SELECT * FROM user_files where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//all invited user by user id
	function invitedUserById($id)
	{
			$sql = "SELECT * FROM user_details where user_id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}	
	//check user details by id
	function userDetailsById($id)
	{
			$sql = "SELECT * FROM users where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//email checks in account table
	function register_email_exists_account($email)
	{
			$sql = "SELECT * FROM accounts where owneremailid='$email'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//check email exists
	function register_email_exists($email)
	{
			$sql = "SELECT * FROM users where emailid='$email'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//fetch settings data
	
	function fetchSettingsData()
	{
			$sql = "SELECT * FROM exam_settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//update data
	function updateData($field,$value,$tablename,$data)
	{
		$this->db->where($field, $value);
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
	//check user
	function checkUser($user,$pass)
	{
		    $sql = "SELECT * FROM users where emailid='$user' and password=md5('$pass')"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//check user details
	function checkcodedata($code)
	{
			$sql = "SELECT * FROM users where passwordreset='$code'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//user all files list

	function userAllFiles($id,$limit,$start)
	{
		$this->db->select('id,userid,name,uniquename,folder,device,filetype,location,size,created_date');
		$this->db->from('user_files');
		$this->db->limit($limit, $start);
		$this->db->where('userid', $id);
		$this->db->order_by("id","desc");
		$query = $this->db->get("");
		
		$data1=array();
		if ($query->num_rows() > 0) 
		{
			
		foreach ($query->result() as $row)
		{
			$data1[] = $row;
		}
		}
		return $data1;
	}

// total files	
	function record_count_total_files($id)
	{
			$sql = "SELECT count(*) as total FROM user_files where userid='$id'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
	//delete card
	function deleteCard($id)
	{
		$this->db->delete('user_cardinfo', array('id' => $id));
	}	
	//delete file
	function deleteFile($id)
	{
		$this->db->delete('user_files', array('id' => $id));
	}
	//setting details
	function getSettings()
	{
			$sql = "SELECT * FROM settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}	
	//user card list 
	function userCardList($userid)
	{
			$sql = "SELECT * FROM user_cardinfo where userid=".$userid ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//card details by id 
	function cardDetailsById($id)
	{
			$sql = "SELECT * FROM user_cardinfo where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
}

?>
