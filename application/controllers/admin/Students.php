<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	function __construct()
    {
    parent::__construct();
    $this->load->model('Login_model');
    }

	public function index()
	{
		$Class = $this->Login_model->getreqClass();
		$data['class'] = $Class;
		$data['message'] = $this->session->flashdata('message','');
		$this->load->view('admin/enroll_student',$data);
	}

	public function register()
    {
        if($_POST['submit'])
        {
			//echo "haiiii"; exit();
            
			$this->form_validation->set_rules('admission_no', 'Admission', 'required|trim'); 
			$this->form_validation->set_rules('name', 'Name', 'required|trim');

			if($this->form_validation->run() == false)
        	{
            	$this->load->view('admin/enroll_parent');
        	} else {
				$checkExists = $this->Login_model->checkexistsEmail($_POST['email']);
				if($checkExists === 0){
                $data = array(
					'name'  => $this->input->post('name'),
					'admission_no'  => $this->input->post('admission_no'),
                    'email'  => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'roal' => "student"
                   );
                   //$id = $this->register_model->insert($data);
                   $id = $this->Login_model->insert($data);
                   if($id>0){
                   
                    $data1 = array(
						'parent_name'  => $this->input->post('parent_name'),
						'relation'  => $this->input->post('relation'),
						'class'  => $this->input->post('class'),
						'division'  => $this->input->post('division'),
						'dob'  => $this->input->post('dob'),
						'gender'  => $this->input->post('gender'),
						'mob'  => $this->input->post('mob'),
						'bld_grp'  => $this->input->post('bld_grp'),
						'address'  => $this->input->post('address'),
						'adhar_no'  => $this->input->post('adhar_no'),
                        'user_id' => $id
                       );
					$id1 = $this->Login_model->insertStudents($data1);
					$this->session->set_flashdata('message', 'Student registration successful');
					
					redirect('admin/Students');
                }else {
					$this->session->set_flashdata('message', 'Student registration failed');
                    redirect('admin/Students');
                }
            } else {
				$this->session->set_flashdata('message', 'Email Allredy Exists');
				redirect('admin/Students');
			} 
		} 
            
        } else{
			$this->load->view('register');
		}
    }

	public function view_students()
	{
		$build_array = array();
		$result = $this->Login_model->getreqStudents();
		$i = 0;
		foreach ($result as $row) {
			// echo $row->admission_no;
			
			
			foreach($this->Login_model->getreqstuid($row->id) as $key){

			
				$build_array[$i] = array(
					'login' => $row,
					'student' => $key,
				);
			}
				$i=$i+1;
		}
		// exit;
		$result['message'] = $this->session->flashdata('message','');
		$result['students'] = $build_array;
		$this->load->view('admin/studentslist',$result);
	}

	public function enroll_parent()
	{
		$id = $_GET['id']; 
		$showd['data1']=$this->Login_model->getreqStudentsDetails($id);
		$showd['message'] = $this->session->flashdata('message','');
		$this->load->view('admin/enroll_parent',$showd);
	}

	public function parent_register()
	{
		
		if(isset($_POST['submit']))
		{
			$stuId=$_POST['student_id'];
			//echo "111";
			$this->form_validation->set_rules('parent_name', 'Parent Name', 'required|trim');
			// $this->form_validation->set_rules('address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('mob', 'Mobile', 'required|trim');
			// $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[login.email]');
			//  $this->form_validation->set_rules('password', 'Password', 'required');// 
			if($this->form_validation->run() == false)
        	{
            	$this->load->view('admin/enroll_parent');
        	} else{
				$checkExists = $this->Login_model->checkexistsEmail($_POST['email']);
				if($checkExists === 0){
					echo "222";
				$data = array(
					'name'  => $this->input->post('parent_name'),
                    'email'  => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'roal' => "parents"
				   );
				   $id = $this->Login_model->insert_parent($data);
				   //if($id>0){
					
					$data1 = array(
					'address'  => $this->input->post('address'),
					'mob'  => $this->input->post('mob'),
					'student_id'  => $this->input->post('student_id'),
					);
					$id1 = $this->Login_model->insertParentstable($data1);
					
					$UpdateStatus=$this->Login_model->updateStatus($stuId);

					if($UpdateStatus){
						echo "333";
						$this->session->set_flashdata('message', 'Parent registration successful');
						redirect('admin/Students/view_students');
					} else {
						echo "444";
						$this->session->set_flashdata('message', 'Parent registration fail');
						redirect('admin/Students/enroll_parent/?id=' . $stuId);
					//echo "Fail";
				   }
				} else {
					$this->session->set_flashdata('message', 'Email Allredy Exists');
					redirect('admin/Students/enroll_parent/?id=' . $stuId);
				}
			}
				
			}else{
				$this->load->view('admin/enroll_parent');
			}
		}

	public function view_parent(){
		$id = $_GET['id']; 
		$showd['data1']=$this->Login_model->getreqStudentsDetails($id);
		$this->load->view('admin/view_parent',$showd);
	}

	public function enroll_teacher()
	{
		$data['message'] = $this->session->flashdata('message','');
		$this->load->view('admin/enroll_teacher',$data);
	}

	public function teacher_register(){

		if(isset($_POST['submit']))
		{
			//echo "hai"; exit();

			$this->form_validation->set_rules('name', 'Teacher Name', 'required|trim');
			// $this->form_validation->set_rules('address', 'Address', 'required|trim');
			// $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|trim');
			// $this->form_validation->set_rules('mob', 'Mobile', 'required|trim');
			// $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[login.email]');
			// $this->form_validation->set_rules('password', 'Password', 'required');// 
			if($this->form_validation->run()){
				//echo "hai"; exit();

				$checkExists = $this->Login_model->checkexistsEmail($_POST['email']);
				if($checkExists === 0){
				$data = array(
					'name'  => $this->input->post('name'),
                    'email'  => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'roal' => "teacher"
				   );
				   $id = $this->Login_model->insert_teacher($data);
				   if($id>0){
					
					$data1 = array(
					'birthday'  => $this->input->post('dob'),
					'sex'  => $this->input->post('gender'),
					'blood_group'  => $this->input->post('bld_grp'),
					'address'  => $this->input->post('address'),
					'phone'  => $this->input->post('mob'),
					'teacher_loginid' => $id
					);
					$id1 = $this->Login_model->insertTeachertable($data1);
					$this->session->set_flashdata('message', 'Teacher registration successful');
					redirect('admin/Students/enroll_teacher');
				   } } else {
					$this->session->set_flashdata('message', 'Email Allredy Exists');
					redirect('admin/Students/enroll_teacher');
				   }
				} else {
					$data['message'] = $this->session->flashdata('message','');
					$this->load->view('admin/enroll_teacher',$data);
				}
			}else{
				$this->load->view('admin/enroll_teacher');
			}
	}

	public function enroll_class(){
		$build_array = array();
		$getclassTeacher = $this->Login_model->getClassTeacher();
		//print_r($getclassTeacher);exit;
		$i = 0;
		foreach ($getclassTeacher as $row) {
			//echo $row->name;
			foreach($this->Login_model->getreqClasswiseTeacher($row->teacher_id) as $key){
				$build_array[$i] = array(
					'class' => $row,
					'login' => $key,
				);
			}
			$i=$i+1;
		}
		$getTeacher = $this->Login_model->getreqteacher();
		$data['teacher'] = $getTeacher;
		$data['class'] = $build_array;
		$data['message'] = $this->session->flashdata('message','');
		$this->load->view('admin/enroll_class',$data);
	}

	public function add_class()
	{
		if($_POST['submit'])
		{
			$this->form_validation->set_rules('className', 'Class Name', 'required|trim');
			$this->form_validation->set_rules('division', 'Division', 'required|trim');
			$this->form_validation->set_rules('teacherName', 'Teacher Name', 'required|trim');
			if($this->form_validation->run()){

				$classname=$_POST['className'];
				$Division=$_POST['division'];
				$teacher = $_POST['teacherName'];
				$checkExists = $this->Login_model->checkexists($classname,$Division,$teacher);
				//echo $checkExists; exit;
				if($checkExists === 0){

					$data = array(
						'class_name'  => $this->input->post('className'),
						'division'  => $this->input->post('division'),
						'teacher_id'  => $this->input->post('teacherName')
					   );
					   $id = $this->Login_model->insert_class($data);
					   if($id>0){
							$this->session->set_flashdata('message', 'Class add successful');
							redirect('admin/Students/enroll_class');
						} else {
							redirect('admin/Students/enroll_class');
							$this->session->set_flashdata('message', 'Class add Fail');
							//echo "Fail";
						}
				} else{
					$this->session->set_flashdata('message', 'Class Allredy Exists');
					redirect('admin/Students/enroll_class');
					//echo "Allredy Exists";
				}
			}
		} else {
			$this->load->view('admin/enroll_class');
		}
	}
	
	public function getDivision(){
		$form_data=array();
		$Division = array();
		if(isset($_POST['class'])){
			$result = $this->Login_model->getreqDivision($_POST['class']);
			$i=0;
			foreach ($result as $key) {
				array_push($Division,$key->division);
			}
			$form_data['success']=true;
			$form_data['divisions']=$Division;
			echo json_encode($form_data);
		}
	}
	
	// public function enroll_division(){
	// 	$getClass = $this->Login_model->getreqClass();
	// 	$getTeacher = $this->Login_model->getreqteacher();
	// 	$data['class'] = $getClass;
	// 	$data['teacher'] = $getTeacher;
	// 	$this->load->view('admin/enroll_division',$data);
	// }

	// public function add_classTeacher()
	// {
	// 	$getClass = $this->Login_model->getreqClass();
	// 	$getTeacher = $this->Login_model->getreqteacher();
	// 	$data['class'] = $getClass;
	// 	$data['teacher'] = $getTeacher;

	// 	if($_POST['submit'])
	// 	{
	// 		$this->form_validation->set_rules('division', 'Division', 'required|trim');
	// 		$this->form_validation->set_rules('className', 'Class Name', 'required|trim');
	// 		$this->form_validation->set_rules('teacherName', 'Teacher Name', 'required|trim');

	// 		if($this->form_validation->run()){
	// 			$data = array(
	// 				'division'  => $this->input->post('division'),
	// 				'class_id'  => $this->input->post('className'),
	// 				'teacher_id'  => $this->input->post('teacherName')
	// 			   );
	// 			   $id = $this->Login_model->insert_classTeacher($data);
	// 			   if($id>0){
	// 				redirect('admin/Students/enroll_division');
	// 				} else {
	// 					echo "Fail";
	// 				}
	// 		}
	// 	} else {
	// 		$this->load->view('admin/enroll_division',$data);
	// 	}
	// }

	public function view_teacher()
	{
		$build_array = array();
		$result = $this->Login_model->getreqTeacher();
		$i = 0;
		foreach ($result as $row) {
			foreach($this->Login_model->getreqteachid($row->id) as $key){

				$build_array[$i] = array(
					'login' => $row,
					'teacher' => $key,
				);

			}
			$i=$i+1;
		}
		$data['teacher'] = $build_array;
		$this->load->view('admin/teacherlist',$data);
	}

	public function filter(){
		$form_data=array();
		//$data = array();
		$ad_no = $this->input->post('ad_no');
		$class = $this->input->post('class');
		$division = $this->input->post('division');
		//echo "123"; exit;
		
		if($ad_no){
			
			$filter_students =$this->Login_model->admition_filter($ad_no);
			$filter_reqID =$this->Login_model->req_filter_admition($filter_students[0]->id);
			
				$data = array(
					'id'=>$filter_students[0]->id,
					'admission_no'=>$filter_students[0]->admission_no,
					'name'=>$filter_students[0]->name,
					'email'=>$filter_students[0]->email,
					'class'=>$filter_reqID[0]->class,
					'division'=>$filter_reqID[0]->division,
					'parent_name'=>$filter_reqID[0]->parent_name,
					'mob'=>$filter_reqID[0]->mob,
					'status'=>$filter_reqID[0]->status
				);
			//echo($filter_students[0]->id); exit;
			//echo json_encode($data);
			$form_data['success']=true;
			$form_data['data']=$data;
			echo json_encode($form_data);

		} else if($class) {
			//echo "hai123"; exit;
			$filterClass = $this->Login_model->filterClass($class);
			$i = 0;
			foreach($filterClass as $row){
				foreach($this->Login_model->filterClass_studentList($row->user_id) as $key){
					// $data[$i] = array(
					// 	'login' => $row,
					// 	'teacher' => $key,
					// );

				}
				//$i=$i+1;
				//echo $key[0]->id;

			}
			//print_r($filterClass[0]->id);exit;
		}
		
	}

	public function student_promotion()
	{
		$this->load->view('admin/student_promotion');
	}
}
