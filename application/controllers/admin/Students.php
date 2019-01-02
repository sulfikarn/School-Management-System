<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/enroll_student');
	}

	public function view_students()
	{
		$this->load->view('admin/studentslist');
	}

	public function student_promotion()
	{
		$this->load->view('admin/student_promotion');
	}
}
