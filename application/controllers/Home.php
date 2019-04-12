<!--Author: Sulfikar
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
    {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
        
        $data['title']='Login Boiler Plate';
        //echo "haiii";
        if($_POST['submit'])
        {
            //echo "aaaa"; exit;
            $email    = $this->input->post('email',TRUE);
            $password = $this->input->post('password',TRUE);
                // if validation passes, check for user credentials from database
                $validate = $this->Login_model->validate($email,$password);
                if($validate->num_rows() > 0){
                    $data  = $validate->row_array();
                    $email = $data['email'];
                    $level = $data['roal'];
                    $sesdata = array(
                        'email'     => $email,
                        'level'     => $level,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($sesdata);
                    // access login for admin
                    if($level === 'admin'){
                        redirect('admin/Students');
             
                    // access login for staff
                    }elseif($level === 'teacher'){
                        
                        redirect('teacher/teacherhome');
                        
                    }elseif($level === 'student'){
                        redirect('page/staff');
             
                    // access login for author
                    }else{
                        redirect('page/author');
                    }
                }else{
                    echo $this->session->set_flashdata('msg','Username or Password is Wrong');
                    redirect('/');
                }
           
    	}
		else
		{
			$this->load->view('login',$data);
		}
	}
}
