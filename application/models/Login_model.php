<?php
class Login_model extends CI_Model{
 
    function validate($email,$password){
      $this->db->where('email',$email);
      $this->db->where('password',$password);
      $result = $this->db->get('login',1);
      return $result;
    }

    function insert($data)
    {
      $this->db->insert('login', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function insertStudents($data)
    {
      $this->db->insert('students', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    public function getreqStudents()
    {
        $this->db->where('roal','student');
        $query=$this->db->get('login');
        $result=$query->result();
        return $result;
        // $num_rows=$query->num_rows();
        // $last_three_record=array_slice($result,-3,3,true);
        // return array("all_data"=>$result,"num_rows"=>$num_rows,"last_three"=>$last_three_record);
    }

    public function getreqStudentsDetails($id)
    {
        $this->db->where('user_id',$id);
        $up=$this->db->get('students');
        return $up->row();
    }
    public function getreqstuid($stu_id)
    {
        //echo $stu_id; exit();
        $query=$this->db->query('select * from students where user_id='.$stu_id);
        
        return $query->result();
    }


    function insert_parent($data)
    {
      $this->db->insert('login', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function insertParentstable($data)
    {
      $this->db->insert('parents', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function updateStatus($stuId)
    {
      $this->db->set('status', 1);
      $this->db->where('user_id', $stuId);
      $update= $this->db->update('students');
      return $update;
    }

    /*Teacher*/

    function insert_teacher($data)
    {
      $this->db->insert('login', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function insertTeachertable($data)
    {
      $this->db->insert('teacher', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function insert_class($data)
    {
      $this->db->insert('class', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    /*Get Class */
    
    public function getreqClass()
    {

      $this->db->select('class_name');
      $this->db->distinct();
      $query = $this->db->get('class');
      return $query->result();
    }

    public function getreqDivision($classname)
    {

      $query = $this->db->query("SELECT DISTINCT division from class where class_name='".$classname."'");
      return $query->result();
    }

    /*Get Teacher */
    public function getreqteacher()
    {
      $this->db->where('roal','teacher');
        $query=$this->db->get('login');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        }
    }

    public function getreqteachid($teac_id)
    {
      $query=$this->db->query('select * from teacher where teacher_loginid='.$teac_id);
      return $query->result();
    }

    /*POST Class Teacher */

    function insert_classTeacher($data)
    {
      $this->db->insert('class_teacher', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    /* CHECK EXISTS */
    function checkexists($classname,$Division,$teacher)
    {
      $query = $this->db->query("SELECT * from class where class_name='".$classname."' AND division='".$Division."' OR teacher_id=".$teacher."");
      $count = $query->num_rows();
      //echo $count;
      return  $count;
    }

    function checkexistsEmail($email)
    {
      $query = $this->db->query("SELECT * from login where email='".$email."'");
      $count = $query->num_rows();
      //echo $count;
      return  $count;
    }

    function getClassTeacher(){
      $query=$this->db->query('select * from class');
      return $query->result();
    }

    function getreqClasswiseTeacher($teach_id)
    {
      $query=$this->db->query('select * from login where id='.$teach_id);
      return $query->result();
    }

    function admition_filter($ad_no)
    {
      $query=$this->db->query("select * from login where admission_no='".$ad_no."'");
      //print_r($query->result()); exit();

      return $query->result();
    }

    function req_filter_admition($id)
    {
      //echo $id; exit();
      $query=$this->db->query("select * from students where user_id='".$id."'");
      //print_r($query->result()); exit();
      return $query->result();
    }

    function filterClass($class){
      $query=$this->db->query("select * from students where class='".$class."'");
      //print_r($query->result()); exit();
      return $query->result();
    }

    public function filterClass_studentList($stu_id)
    {
        //echo $stu_id; exit();
        $query=$this->db->query('select * from login where id='.$stu_id);
        print_r($query->result()); exit();
        return $query->result();
    }
   
  }
?>