<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('register');
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	function idcard_check($personID)
	{
		if (strlen($personID) != 13) {
			//$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
			return false;
		}

		$rev = strrev($personID); 
		$total = 0;
		for($i=1;$i<13;$i++) {
			$mul = $i +1;
			$count = $rev[$i]*$mul; 
			$total = $total + $count; 
		}
		$mod = $total % 11; 
		$sub = 11 - $mod; 
		$check_digit = $sub % 10; 

		if($rev[0] == $check_digit) {
			 return true; 
		}else{
			//$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
			 return false; 
		}
	}

	function user_check($usr_name)
	{
		if ((!empty($usr_name)) && (strlen($usr_name)>=2)){
			$this->load->model('member_model');
			$check_user=$this->member_model->checkUser($usr_name ); 
			if ($check_user){
				return false; 	
			}else{
				return true; 
			}
		}else{
			return false; 
		}
	}

	function user_owner_check($usr_name)
	{
		if ((!empty($usr_name)) && (strlen($usr_name)>=2)){
			$this->load->model('member_model');
			$check_user=$this->member_model->checkUserOwner($usr_name ); 
			if ($check_user){
				return false; 	
			}else{
				return true; 
			}
		}else{
			return false; 
		}
	}	

	function email_check($usr_email)
	{
		if ((!empty($usr_email)) && (strlen($usr_email)>=5)){
			$this->load->model('member_model');
			$check_email=$this->member_model->checkEmail($usr_email ); 
			if ($check_email){
				return false; 	
			}else{
				return true; 
			}
		}else{
			return false; 
		}
	}

	function email_owner_check($usr_email)
	{
		if ((!empty($usr_email)) && (strlen($usr_email)>=5)){
			$this->load->model('member_model');
			$check_email=$this->member_model->checkEmailOwner($usr_email ); 
			if ($check_email){
				return false; 	
			}else{
				return true; 
			}
		}else{
			return false; 
		}
	}


	public function project()
	{
		$login_in =isset($this->session->userdata['logged_in'])?$this->session->userdata['logged_in']:"";
		if((!$login_in) || ($login_in['member_type']!="2")){
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center" role="alert" data-auto-dismiss="5000"><h3>ส่วนนี้สำหรับเจ้าของ Owner เท่านั้นค่ะ</h3></div>');	
			 redirect('/', 'refresh');
			 exit;
		}

		$knowhowall="";
		$project_name=isset($_POST['project_name'])?$_POST['project_name']:"";	
		$project_type=isset($_POST['project_type'])?$_POST['project_type']:"";
		$knowhow=isset($_POST['knowhow'])?$_POST['knowhow']:"";
		$description=isset($_POST['description'])?$_POST['description']:"";
		$project_email=isset($_POST['project_email'])?$_POST['project_email']:"";	
		$budget_start=isset($_POST['budget_start'])?$_POST['budget_start']:"";
		$budget_end=isset($_POST['budget_end'])?$_POST['budget_end']:"";	
		$project_time=isset($_POST['project_time'])?$_POST['project_time']:"";
		$timetype_id=isset($_POST['timetype_id'])?$_POST['timetype_id']:"";
		$project_startdate=isset($_POST['project_startdate'])?$_POST['project_startdate']:"";
		$project_enddate=isset($_POST['project_enddate'])?$_POST['project_enddate']:"";
		$project_showvalue=isset($_POST['project_showvalue'])?$_POST['project_showvalue']:"0";
		$rdPaymentMethod=isset($_POST['rdPaymentMethod'])?$_POST['rdPaymentMethod']:"";
		$owner_id=isset($_POST['owner_id'])?$_POST['owner_id']:"";

		$this->load->library('form_validation');
		$this->load->model('owner_model');
		$this->load->model('freelance_model');
		$this->load->model('project_model');
				

		$this->form_validation->set_rules('project_name', 'ชื่อโปรเจค', 'required');
		$this->form_validation->set_rules('knowhow[]', 'ความสามารถเฉพาะตัว', 'required');	
		$this->form_validation->set_rules('description', 'ข้อมูลรายละเอียดงานอื่นๆ', 'required');
		$this->form_validation->set_rules('project_email', 'Email รับการแจ้งเตือน', 'required|valid_email');						
		$this->form_validation->set_rules('budget_start', 'งบประมาณตั้งแต่', 'required|integer');		
		$this->form_validation->set_rules('budget_end', 'จนถึง', 'required|integer');
		$this->form_validation->set_rules('project_time', 'ระยะเวลาการทำงาน', 'required|integer');


		$this->form_validation->set_message('required', 'กรุณากรอก %s ด้วยครับ');
		$this->form_validation->set_message('valid_email', '%s เป็นไปไม่ได้');
		$this->form_validation->set_message('numeric', '%s ต้องเป็็นตัวเลขเท่านั้น');
		$this->form_validation->set_message('integer', '%s ต้องเป็นจำนวนเต็มเท่านั้น');
		$this->form_validation->set_message('min_length', '{field} ตัวเลขขั้นต่ำ {param} หลักเท่านั้น');		
		$this->form_validation->set_message('idcard_check', 'หมายเลขประจำตัวประชาชนไม่ถูกต้อง');
		$this->form_validation->set_message('user_owner_check', 'ไม่สามารถใช้นามแฝงนี้ได้');
		$this->form_validation->set_message('email_owner_check', 'ไม่สามารถใช้อีเมล์นี้ได้');
		$this->form_validation->set_message('matches', 'รหัสผ่านไม่ตรงกัน');
		$this->form_validation->set_message('alpha_numeric', '%s ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น');
		

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$data['knowhow_list']=$this->freelance_model->getFreelanceCategoryList();
		$data['login_name']=$this->session->userdata['logged_in']['login_name'];
		$data['owner_id']=$this->session->userdata['logged_in']['id'];


		if ($this->form_validation->run() == FALSE) {
			$this->template->content->view('register_project',$data);
		}else{

			for ($i=0;$i<count($knowhow);$i++) {
				$knowhowall .=",".$knowhow[$i];
			}		

			$insert_data = array(
					"project_name" => $project_name,
					"project_type" => $project_type,
					"project_knowhow" => $knowhowall,
					"project_detail" => $description,
					"project_email" => $project_email,
					"project_value_start" => $budget_start,
					"project_value_end" => $budget_end,
					"project_showvalue" => ($project_showvalue=="0")?"1":"0",
					"project_startdate" => $project_startdate,
					"project_enddate" => $project_enddate,
					"project_time" => $project_time,
					"project_timetype" => $timetype_id,
					"owner_id" => $owner_id,
					"project_status" => "0",
					"project_cratedate" => date('Y-m-d H:i:s'),
					"project_ipaddress" => $this->input->ip_address(),
					"created" => date("Y-m-d H:i:s")
				);

			$project_id=$this->project_model->insertArray("project",$insert_data);
			redirect(site_url('register/projectsuccess/'.$project_id));
		}

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);		
		$this->template->footer->view('footer');
		$this->template->publish();
	}		

	public function freelance()
	{
		$login_in =isset($this->session->userdata['logged_in'])?$this->session->userdata['logged_in']:"";
		if($login_in){
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center" role="alert" data-auto-dismiss="5000"><h3>คุณเป็นสมาขิกอยู่แล้วค่ะ ไม่สามารถสมัครซ้ำได้ค่ะ</h3></div>');	
			 redirect('/', 'refresh');
			 exit;
		}		
		$this->config->load('my');
		$flogo_name="";
		$image_name_flogo="";
		$knowhowall="";
		$member_name=isset($_POST['member_name'])?$_POST['member_name']:"";	
		$idcard=isset($_POST['idcard'])?$_POST['idcard']:"";
		$login_name=isset($_POST['login_name'])?$_POST['login_name']:"";
		$sex=isset($_POST['sex'])?$_POST['sex']:"";	
		$age=isset($_POST['age'])?$_POST['age']:"";
		$freelance_typeid=isset($_POST['freelance_typeid'])?$_POST['freelance_typeid']:"";
		$freelance_companyname=isset($_POST['freelance_companyname'])?$_POST['freelance_companyname']:"";	
		$address=isset($_POST['address'])?$_POST['address']:"";
		$city=isset($_POST['city'])?$_POST['city']:"";
		$postcode=isset($_POST['postcode'])?$_POST['postcode']:"";	
		$phone=isset($_POST['phone'])?$_POST['phone']:"";
		$mobile=isset($_POST['mobile'])?$_POST['mobile']:"";
		$fax=isset($_POST['fax'])?$_POST['fax']:"";	
		$email=isset($_POST['email'])?$_POST['email']:"";
		$password=isset($_POST['password'])?$_POST['password']:"";
		$knowhow=isset($_POST['knowhow'])?$_POST['knowhow']:"";	
		$personalportfolio=isset($_POST['personalportfolio'])?$_POST['personalportfolio']:"";
		$knowhow_special=isset($_POST['knowhow_special'])?$_POST['knowhow_special']:"";
		$flogo=isset($_POST['flogo'])?$_POST['flogo']:"";

	


		$this->load->library('form_validation');
		$this->load->model('freelance_model');

		$this->form_validation->set_rules('member_name', 'ชื่อ-นามสกุล', 'required');
		$this->form_validation->set_rules('idcard', 'หมายเลขประจำตัวประชาชน', 'required|numeric|min_length[13]|callback_idcard_check');
		$this->form_validation->set_rules('login_name', 'นามแฝง(username)', 'required|alpha_numeric|callback_user_check');
		$this->form_validation->set_rules('age', 'อายุ', 'required|integer');	
		$this->form_validation->set_rules('address', 'ที่อยู่', 'required');						
		$this->form_validation->set_rules('city', 'จัหวัด', 'required');		
		$this->form_validation->set_rules('postcode', 'รหัสไปรษณีย์', 'required|numeric|min_length[5]');
		$this->form_validation->set_rules('phone', 'โทรศัพท์', 'required');
		$this->form_validation->set_rules('mobile', 'โทรศัพท์มือถือ', 'required');
		$this->form_validation->set_rules('email', 'อีเมล์', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');		
		$this->form_validation->set_rules('password2', 'ยืนยันรหัสผ่าน', 'required|matches[password]');
		$this->form_validation->set_rules('knowhow[]', 'ความสามารถเฉพาะตัว', 'required');		

		$this->form_validation->set_message('required', 'กรุณากรอก %s ด้วยครับ');
		$this->form_validation->set_message('valid_email', '%s เป็นไปไม่ได้');
		$this->form_validation->set_message('numeric', '%s ต้องเป็็นตัวเลขเท่านั้น');
		$this->form_validation->set_message('integer', '%s ต้องเป็นจำนวนเต็มเท่านั้น');
		$this->form_validation->set_message('min_length', '{field} ตัวเลขขั้นต่ำ {param} หลักเท่านั้น');		
		$this->form_validation->set_message('idcard_check', 'หมายเลขประจำตัวประชาชนไม่ถูกต้อง');
		$this->form_validation->set_message('user_check', 'ไม่สามารถใช้นามแฝงนี้ได้');
		$this->form_validation->set_message('email_check', 'ไม่สามารถใช้อีเมล์นี้ได้');
		$this->form_validation->set_message('matches', 'รหัสผ่านไม่ตรงกัน');
		$this->form_validation->set_message('alpha_numeric', '%s ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น');
		

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$data['category_list']=$this->freelance_model->getFreelanceCategory();
		$data['knowhow_list']=$this->freelance_model->getFreelanceCategoryList();
		$data['provinces']=$this->config->item('province_list');

		if ($this->form_validation->run() == FALSE) {
			$this->template->content->view('register_freelance',$data);
		}else{
			if ($_FILES['flogo']){
				$image_name_flogo = date('dmygis');
	 			$config['upload_path'] = FCPATH . 'images_flogo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width'] = '2048';
				$config['max_height'] = '2048';
				$config['file_name'] = $image_name_flogo;
				$thumb_path = FCPATH . 'images_flogo/thumbnail/';	
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('flogo')) {
					$file_data = $this->upload->data();  
					if (!is_file($thumb_path . $file_data['file_name'])) {
				        		$config = array(
								'source_image' => $file_data['full_path'],
								'create_thumb' => true,
								'thumb_marker'=> '_thumb',
								'new_image' => $thumb_path,
								'maintain_ratio' => true,
								'width' => 198,
								'height' => 150
				       			 );
						$this->load->library('image_lib');
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
		               		 $flogo_name=$file_data['file_name'];	             
		           		 }else{
		           		 	$error = array('error' => $this->upload->display_errors());
		           		 }
	           		}

			for ($i=0;$i<count($knowhow);$i++) {
				$knowhowall .=",".$knowhow[$i];
			}

			$insert_data = array(
					"freelance_name" => $member_name,
					"freelance_idcard" => $idcard,
					"freelance_loginname" => $login_name,
					"freelance_sex" => $sex,
					"freelance_age" => $age,
					"freelance_categoryid" => $freelance_typeid,
					"freelance_companyname" => $freelance_companyname,
					"freelance_address" => $address,
					"freelance_city" => $city,
					"freelance_postcode" => $postcode,
					"freelance_phone" => $phone,
					"freelance_mobile" => $mobile,
					"freelance_fax" => $fax,
					"freelance_email" => $email,
					"freelance_password" => $password,
					"freelance_knowhow" => $knowhowall,
					"freelance_knowhowspecial" => $knowhow_special,
					"freelance_personal" => $personalportfolio,
					"freelance_flogo" => $flogo_name,
					"freelance_rate" => "0",
					"freelance_status" => "1",
					"freelance_datetime" => date('dmygis'),
					"freelance_ipaddress" => $this->input->ip_address(),
					"created" => date("Y-m-d H:i:s")
				);	
			$freelance_id=$this->freelance_model->insertArray("freelance",$insert_data);
			redirect(site_url('register/freelancesuccess/'.$freelance_id));
		}

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);		
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function freelancesuccess()
	{
		$freelance_id=($this->uri->segment(3))?$this->uri->segment(3):"";
		$data['freelance_id'] = $freelance_id;
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('register_freelance_success',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function ownersuccess()
	{
		$owner_id=($this->uri->segment(3))?$this->uri->segment(3):"";
		$data['owner_id'] = $owner_id;
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('register_owner_success',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function projectsuccess()
	{
		$project_id=($this->uri->segment(3))?$this->uri->segment(3):"";
		$data['project_id'] = $project_id;
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('register_project_success',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}	
	
        
	public function check_user()
	{
		$usr_name=isset($_POST['usr_name'])?$_POST['usr_name']:"";
		if ((!empty($usr_name)) && (strlen($usr_name)>0)){
			$this->load->model('member_model');
			$check_user=$this->member_model->checkUser($usr_name ); 
			if ($check_user){
				echo "1";	
			}else{
				echo "0";
			}
		}else{
			echo "1";
		}
	}

	public function check_user_owner()
	{
		$usr_name=isset($_POST['usr_name'])?$_POST['usr_name']:"";
		if ((!empty($usr_name)) && (strlen($usr_name)>0)){
			$this->load->model('member_model');
			$check_user=$this->member_model->checkUserOwner($usr_name ); 
			if ($check_user){
				echo "1";	
			}else{
				echo "0";
			}
		}else{
			echo "1";
		}
	}	
	

	public function check_email()
	{
		$usr_email=isset($_POST['usr_email'])?$_POST['usr_email']:"";
		if ((!empty($usr_email)) && (strlen($usr_email)>0)){
			$this->load->model('member_model');
			$check_email=$this->member_model->checkEmail($usr_email ); 
			if ($check_email){
				echo "1";	
			}else{
				echo "0";
			}
		}else{
			echo "1";
		}
	}

	public function check_email_owner()
	{
		$usr_email=isset($_POST['usr_email'])?$_POST['usr_email']:"";
		if ((!empty($usr_email)) && (strlen($usr_email)>0)){
			$this->load->model('member_model');
			$check_email=$this->member_model->checkEmailOwner($usr_email ); 
			if ($check_email){
				echo "1";	
			}else{
				echo "0";
			}
		}else{
			echo "1";
		}
	}

	public function owner()
	{
		$login_in =isset($this->session->userdata['logged_in'])?$this->session->userdata['logged_in']:"";

		if($login_in){
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center" role="alert" data-auto-dismiss="5000"><h3>คุณเป็นสมาขิกอยู่แล้วค่ะ ไม่สามารถสมัครซ้ำได้ค่ะ</h3></div>');	
			 redirect('/', 'refresh');
			 exit;
		}

		$flogo_name="";
		$image_name_flogo="";

		$name=isset($_POST['name'])?$_POST['name']:"";	
		$idcard=isset($_POST['idcard'])?$_POST['idcard']:"";
		$login_name=isset($_POST['login_name'])?$_POST['login_name']:"";
		$sex=isset($_POST['sex'])?$_POST['sex']:"";	
		$age=isset($_POST['age'])?$_POST['age']:"";
		$companyname=isset($_POST['companyname'])?$_POST['companyname']:"";	
		$address=isset($_POST['address'])?$_POST['address']:"";
		$city=isset($_POST['city'])?$_POST['city']:"";
		$postcode=isset($_POST['postcode'])?$_POST['postcode']:"";	
		$phone=isset($_POST['phone'])?$_POST['phone']:"";
		$mobile=isset($_POST['mobile'])?$_POST['mobile']:"";
		$fax=isset($_POST['fax'])?$_POST['fax']:"";
		$website=isset($_POST['website'])?$_POST['website']:"";	
		$email=isset($_POST['email'])?$_POST['email']:"";
		$password=isset($_POST['password'])?$_POST['password']:"";
		$description=isset($_POST['description'])?$_POST['description']:"";
		$flogo=isset($_POST['flogo'])?$_POST['flogo']:"";

		$this->config->load('my');
		$this->load->library('form_validation');
		$this->load->model('owner_model');

		$this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'required');
		$this->form_validation->set_rules('idcard', 'หมายเลขประจำตัวประชาชน', 'required|numeric|min_length[13]|callback_idcard_check');
		$this->form_validation->set_rules('login_name', 'นามแฝง(username)', 'required|alpha_numeric|callback_user_owner_check');
		$this->form_validation->set_rules('age', 'อายุ', 'required|integer');	
		$this->form_validation->set_rules('address', 'ที่อยู่', 'required');						
		$this->form_validation->set_rules('city', 'จัหวัด', 'required');		
		$this->form_validation->set_rules('postcode', 'รหัสไปรษณีย์', 'required|numeric|min_length[5]');
		$this->form_validation->set_rules('phone', 'โทรศัพท์', 'required');
		$this->form_validation->set_rules('mobile', 'โทรศัพท์มือถือ', 'required');
		$this->form_validation->set_rules('email', 'อีเมล์', 'required|valid_email|callback_email_owner_check');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');		
		$this->form_validation->set_rules('password2', 'ยืนยันรหัสผ่าน', 'required|matches[password]');
	

		$this->form_validation->set_message('required', 'กรุณากรอก %s ด้วยครับ');
		$this->form_validation->set_message('valid_email', '%s เป็นไปไม่ได้');
		$this->form_validation->set_message('numeric', '%s ต้องเป็็นตัวเลขเท่านั้น');
		$this->form_validation->set_message('integer', '%s ต้องเป็นจำนวนเต็มเท่านั้น');
		$this->form_validation->set_message('min_length', '{field} ตัวเลขขั้นต่ำ {param} หลักเท่านั้น');		
		$this->form_validation->set_message('idcard_check', 'หมายเลขประจำตัวประชาชนไม่ถูกต้อง');
		$this->form_validation->set_message('user_owner_check', 'ไม่สามารถใช้นามแฝงนี้ได้');
		$this->form_validation->set_message('email_owner_check', 'ไม่สามารถใช้อีเมล์นี้ได้');
		$this->form_validation->set_message('matches', 'รหัสผ่านไม่ตรงกัน');
		$this->form_validation->set_message('alpha_numeric', '%s ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น');
		

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$data['provinces']=$this->config->item('province_list');

		if ($this->form_validation->run() == FALSE) {
			$this->template->content->view('register_owner',$data);
		}else{
			if ($_FILES['flogo']){
				$image_name_flogo = date('dmygis');
	 			$config['upload_path'] = FCPATH . 'images_flogo_owner/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width'] = '2048';
				$config['max_height'] = '2048';
				$config['file_name'] = $image_name_flogo;
				$thumb_path = FCPATH . 'images_flogo_owner/thumbnail/';	
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('flogo')) {
					$file_data = $this->upload->data();  
					if (!is_file($thumb_path . $file_data['file_name'])) {
				        		$config = array(
								'source_image' => $file_data['full_path'],
								'create_thumb' => true,
								'thumb_marker'=> '_thumb',
								'new_image' => $thumb_path,
								'maintain_ratio' => true,
								'width' => 198,
								'height' => 150
				       			 );
						$this->load->library('image_lib');
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
		               		 $flogo_name=$file_data['file_name'];	             
		           		 }else{
		           		 	$error = array('error' => $this->upload->display_errors());
		           		 }
	           		}

			$insert_data = array(
					"owner_name" => $name,
					"owner_idcard" => $idcard,
					"owner_loginname" => $login_name,
					"owner_sex" => $sex,
					"owner_age" => $age,
					"owner_companyname" => $companyname,
					"owner_address" => $address,
					"owner_provinceid" => $city,
					"owner_postcode" => $postcode,
					"owner_phone" => $phone,
					"owner_mobile" => $mobile,
					"owner_fax" => $fax,
					"owner_website" => $website,
					"owner_email" => $email,
					"owner_password" => $password,
					"owner_description" => $description,
					"owner_logo" => $flogo_name,
					"owner_status" => "1",
					"owner_datetime" => date('dmygis'),
					"owner_ipaddress" => $this->input->ip_address(),
					"created" => date("Y-m-d H:i:s")
				);	
			$owner_id=$this->owner_model->insertArray("owner",$insert_data);
			redirect(site_url('register/ownersuccess/'.$owner_id));
		}

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);		
		$this->template->footer->view('footer');
		$this->template->publish();
	}	
}
