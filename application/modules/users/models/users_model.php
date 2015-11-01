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
	//check user details by id
	function userDetailsById($id)
	{
			$sql = "SELECT * FROM doc_user where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//check email exists
	function register_email_exists($email)
	{
			$sql = "SELECT * FROM doc_user where email='$email'" ; 
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
		    $sql = "SELECT * FROM doc_user where email='$user' and password=md5('$pass')"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//check user details
	function checkcodedata($code)
	{
			$sql = "SELECT * FROM doc_user where passwordreset='$code'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	
}

?>