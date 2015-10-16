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
	//fetch settings data
	
	function fetchSettingsData()
	{
			$sql = "SELECT * FROM exam_settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}	
	//save data
	function saveData($tablename,$data)
	{
		$this->db->insert($tablename, $data);
		$id = $this->db->insert_id(); 
		return @$id;
	}
	function getQuestionIds($subject)
	{
		if($subject=='aptitude')
		{
			$sql = "SELECT id FROM exam_question where type='a'"; 
		}
		else
		{
			$sql = "SELECT id FROM exam_question where type='t'"; 
		}
        	
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	function getQuestionById($id='')
	{
        	$sql = "SELECT * FROM exam_question where id=".$id; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	
}

?>