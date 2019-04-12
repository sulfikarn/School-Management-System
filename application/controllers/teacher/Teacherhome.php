<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherhome extends CI_Controller {

	function __construct()
    {
    parent::__construct();
    $this->load->model('Teacher_model');
    }

	public function index()
	{
		// $students=array();
		if (isset($this->session->userdata['logged_in'])) {
			$email = ($this->session->userdata['email']);
			//echo $email; exit;
			
			$result = $this->Teacher_model->getreqTeacherDetails($email);
			$teacherId = $result->id;
			
			$class = $this->Teacher_model->getreqTeacherClass($teacherId);
				$teacher=$class;
				if(empty($teacher)){
					$stdata['message'] = $this->session->flashdata('message','No existing student record');
				//echo $data;exit;
				//print_r($students); exit;
				$stdata['class']=null;
				$stdata['teacher']=$teacherId;
				$this->load->view('teacher/dashboard',$stdata);
				}
				else{
				$ClassName=$teacher->class_name;
				$Division=$teacher->division;
				$class = $this->Teacher_model->getreqTeacherStudents($ClassName,$Division);
				
				if(empty($class)){
					$stdata['message'] = $this->session->flashdata('message','No existing student record');
				//echo $data;exit;
				//print_r($students); exit;
				$stdata['class']=null;
				$stdata['teacher']=$teacherId;
				$this->load->view('teacher/dashboard',$stdata);
				}
				else{
				//$students=new stdClass();
				$data=array();
				
				foreach($class as $list){
					$studentsID=$list->user_id; 
					array_push($data,$studentsID);
				}
				$students = $this->Teacher_model->getreqStudentsDetails($data);
				$stdata['class']=$students;
				$stdata['teacher']=$teacherId;
				//$stdata['message']="";
				$stdata['message'] = $this->session->flashdata('message','');
				//echo $data;exit;
				//print_r($students); exit;
				
				$this->load->view('teacher/dashboard',$stdata);
			}
		}
			// exit;
			} else {
			header("location: login");
			}

	}

	public function attendance()
	{


		if (isset($this->session->userdata['logged_in'])) {
			$email = ($this->session->userdata['email']);
			//echo $email; exit;
			$result = $this->Teacher_model->getreqTeacherDetails($email);
			$teacherId = $result->id;
			
			$class = $this->Teacher_model->getreqTeacherClass($teacherId);
				$teacher=$class;
				$ClassName=$teacher->class_name;
				$Division=$teacher->division;
				$class = $this->Teacher_model->getreqTeacherStudents($ClassName,$Division);
				//$students=new stdClass();
				$data=array();
				
				foreach($class as $list){
					$studentsID=$list->user_id; 
					array_push($data,$studentsID);
				}
				$students = $this->Teacher_model->getreqStudentsDetails($data);
				$stdata['class']=$students;
				//echo $data;exit;
				//print_r($students); exit;
				
				// $this->load->view('teacher/dashboard',$stdata);
			// exit;

			if($_POST['submit'])
			{
	
				//echo "hai"; exit;
			
					$att=$_POST['attendance'];
					// $date=date('d-m-y');
					$date=date("m/d/Y");
					$teacherId = $result->id; //exit;
				
				$DateCheck = $this->Teacher_model->checkDate($teacherId);
				$b=false;
				if($DateCheck > 0)
				{
					foreach($DateCheck as $key)
					{
						if($date==$key->date){
							$b=true;
							//$message="Attendance already taken today";
							$this->session->set_flashdata('message', 'Attendance already taken today');
							//$stdata['message']=$message;
							$stdata['teacher']=$teacherId;
							redirect('teacher/teacherhome');
							//$this->load->view('teacher/dashboard',$stdata);
						}
					}
					if(!$b){
						$Insert=false;
						foreach ($att as $key => $value) {
							echo $value;
							
							if($value=="Present"){
								$InsertAttendance = $this->Teacher_model->insertPresent('Present',$key,$date,$teacherId);
							} else {
								$InsertAttendance = $this->Teacher_model->insertPresent('Absent',$key,$date,$teacherId);
							}
							$Insert=true;
						}

						if($Insert){
							//$messages="Attendance taken Sucessfully";
							//$stdata['message']=$messages;
							$stdata['teacher']=$teacherId;
							$this->session->set_flashdata('message', 'Attendance taken Sucessfully');
							//$this->load->view('teacher/dashboard',$stdata);
							redirect('teacher/teacherhome');
						}
					}
				} else {
					
					$Insert=false;
					foreach ($att as $key => $value) {
						if($value=="Present"){
							$InsertAttendance = $this->Teacher_model->insertPresent('Present',$key,$date,$teacherId);
						} else {
							$InsertAttendance = $this->Teacher_model->insertPresent('Absent',$key,$date,$teacherId);
						}

						$Insert=true;
						
					} 
					//echo "hiiiii";
					if($Insert){
						//echo "haiiii"; exit;
						//$messages="Attendance taken Sucessfully";
						$stdata['class']=$students;
						//$stdata['message']=$messages;
						$stdata['teacher']=$teacherId;
						$this->session->set_flashdata('message', 'Attendance taken Sucessfully');
						redirect('teacher/teacherhome');
						//$this->load->view('teacher/dashboard',$stdata);
					}
				} 
			}

			}
	}

	public function view_attendance()
	{
		$id = $_GET['id']; 
		$studentsAttendance = $this->Teacher_model->getreqattendance($id);

		if($studentsAttendance > 0)
		{
			$data['details']=$studentsAttendance;
			$data['teacher_id']=$id;
			$data['message']="";
			$this->load->view('teacher/view_attendance',$data);
		} else {
			$data['message']="No Record";
			$data['teacher_id']=$id;
			$this->load->view('teacher/attendance',$data);
		}

	}

	public function datewiseattendance()
	{
		$id = $_GET['id']; 
		$date = $_GET['date']; 
		$build_array = array();
		$studentsAttendance = $this->Teacher_model->getreqdatewise($id,$date);
		$i=0;
		foreach($studentsAttendance as $row){
			foreach($this->Teacher_model->getreqstuid($row->stu_id) as $key){

			
			$build_array[$i] = array(
				'attendanceDetails' => $row,
				'student' => $key,
			);
		}
			$i=$i+1;
			
		}
		
		$data['attendance']=$build_array;
		$this->load->view('teacher/datewiseattendance',$data);
	}

	public function attendancelist(){
			if (isset($this->session->userdata['logged_in'])) {
				$email = ($this->session->userdata['email']);
				//echo $email; exit;
				$result = $this->Teacher_model->getreqTeacherDetails($email);
				$teacherId = $result->id;
				$stdata['teacher']=$teacherId;
				$this->load->view('teacher/attendance',$stdata);
			} else{
				redirect('/');
			}
	}

	public function ajaxattendance()
	{
		
			$fromDate=$_POST['fromdate'];
			
			$toDate=$_POST['todate'];
			$teacherId=$_POST['teacher_id'];
			
			
		$datewise=$this->Teacher_model->ajaxdatewise($fromDate,$toDate,$teacherId);
		$data=array();
		$formdata=array();
		$i=0;
		foreach($datewise as $key=>$value){

			$stu_id=$value->stu_id;
			$getCount = $this->Teacher_model->getSingleCount($stu_id,$fromDate,$toDate);
			$getStudent = $this->Teacher_model->getSingleStudent($stu_id);
			$data[$i]=array(
				'stu_id'=>$getCount[0]->stu_id,
				'name'=>$getStudent[0]->name,
				'count'=>$getCount[0]->count
			);
			$i=$i+1;
		
		}
		$formdata['success']=true;
		$formdata['data']=$data;
		echo json_encode($formdata);
	}
}
