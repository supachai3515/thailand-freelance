<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('login');
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('user_agent');

		$this->session->set_userdata('referrer_url', $this->agent->referrer() );

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;	

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('login');
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function signin()
	{

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->model('member_model');
		
		if (isset($this->session->userdata['remember_me']) && $this->session->userdata['remember_me'] == "1") {
			redirect('/', 'refresh');
		} else {
			// set validation rules
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_login');

			$this->form_validation->set_message('required', 'กรุณากรอก %s ด้วยครับ');
			$this->form_validation->set_message('alpha_numeric', '%s ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น');
			$this->form_validation->set_message('check_login', 'Username หรือ Password ไม่ถูกต้อง');

			//echo  $this->session->userdata('referrer_url');

			if ($this->form_validation->run() == false) {
				$this->template->header->view('header');
				$this->template->top_site_banner->view('site_banner');
				$this->template->navigation_bar->view('navbar',$data_navigation);
				$this->template->content->view('login');
				$this->template->footer->view('footer');
				$this->template->publish();
			}else{
				redirect('/', 'refresh');		
			}

		}



	}

	
	public function logout(){
   		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		setcookie('username','',0,"/");
		setcookie('password','',0,"/");		
   		redirect('member/login', 'refresh');
	}	



	function check_login($password){
		$this->load->library('encrypt');
		$this->load->library('user_agent');
		$this->load->model('member_model');

		$username = $this->input->post('username');
		$member_type = $this->input->post('member_type');
		$result = $this->member_model->checkUserLogin($username,$password,$member_type);

		$arr_member_type=array("1"=>"Freelance","2"=>"Owner");

		if($result){

			$remember = $this->input->post('remember_me');
			if ($remember) {
				$this->session->set_userdata('remember_me', true);
				setcookie('username',$username,time() + (86400 * 30),"/");
				setcookie('password',$password,time() + (86400 * 30),"/");
			}

			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row["id"],
					'login_name' => $row["loginname"],
					'member_type' => $member_type,
					'member_type_name' => $arr_member_type[$member_type],
					'image_profile'=> $row["image_profile"]
				);
			}

			$this->session->set_userdata('logged_in', $sess_array);
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center" role="alert" data-auto-dismiss="5000"><h3>คุณได้ทำการเข้าสู่ระบบเรียบร้อยแล้ว</h3></div>');			
			return true;
		}else{			
			return false;
		}
	}	

}
