<?php
class Teacher_model extends CI_Model{
 
    function getreqTeacherDetails($email){
    //echo $email; exit;
        $this->db->where('email',$email);
        $query=$this->db->get('login');
        $result=$query->row();
        return $result;
    }

    function getreqTeacherClass($teacherId)
    {
        //echo $teacherId; exit;
        $this->db->where('teacher_id',$teacherId);
        $query=$this->db->get('class');
        $result=$query->row();
        return $result;
    }

    function getreqTeacherStudents($ClassName,$Division){
        //echo $ClassName;
        //echo $Division; exit();
        // $this->db->where('class',$ClassName and 'division',$Division);
        $query=$this->db->query("select * from students where class=".$ClassName." and division='".$Division."'");
        return $query->result();
        // $query=$this->db->get('students');
        // $result=$query->result();
        // return $result;
    }

    public function getreqStudentsDetails($id)
    {
        $sql = "SELECT * FROM `login` WHERE `id` IN (".implode(',',$id).")";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function checkDate($teacherId)
    {
        // $sql ="select distinct date from attendance";
        $sql ="select distinct date from attendance where teacher_id='".$teacherId."'";
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0)
        { 
          return $query->result();
        }
        
    }

    public function insertPresent($Present,$key,$date,$teacherId)
    {
        //echo $teacherId; exit;
        $this->db->query("insert into attendance(value,stu_id,date,teacher_id) values('".$Present."',".$key.",'".$date."','".$teacherId."')");
    }

    public function getreqattendance($id)
    {
        
        $query=$this->db->query('select distinct date from attendance where teacher_id='.$id);
        $result=$query->result();
        return $result;
    }

    public function getreqdatewise($id,$date)
    {
        $query=$this->db->query("select stu_id,value from attendance where teacher_id=".$id." and date='".$date."'");
        return $query->result();
    }

    public function getreqstuid($stu_id)
    {
        //echo $stu_id; exit();
        $query=$this->db->query('select * from login where id='.$stu_id);
        
        return $query->result();
    }

    public function ajaxdatewise($fromDate,$toDate,$teacherId)
    {
        $query = $this->db->query("SELECT distinct stu_id FROM attendance WHERE teacher_id= ".$teacherId." AND date BETWEEN '" . $fromDate . "' AND  '" . $toDate . "'");
        
        return $query->result();
    }

    public function getSingleCount($id,$fromDate,$toDate){
        $query = $this->db->query("SELECT stu_id,count(value) as 'count' from attendance WHERE stu_id=".$id." AND value='Present' AND date BETWEEN '" . $fromDate . "' AND  '" . $toDate . "'");
        return $query->result();
    }

    public function getSingleStudent($id){
        $query = $this->db->query("SELECT * FROM login where id=".$id);
        return $query->result();
    }

    

}
?>