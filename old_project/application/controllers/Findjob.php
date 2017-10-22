<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Findjob extends CI_Controller {

	public function index()
	{
		$this->load->model('project_model');
		$this->load->library('pagination');
		$limit=20;

		$search_name=(isset($_POST['search_name'])?$_POST['search_name']:(isset($_GET['search_name'])?$_GET['search_name']:""));
		$search_projecttype=(isset($_POST['search_projecttype'])?$_POST['search_projecttype']:(isset($_GET['search_projecttype'])?$_GET['search_projecttype']:""));
		$search_budget=(isset($_POST['search_budget'])?$_POST['search_budget']:(isset($_GET['search_budget'])?$_GET['search_budget']:""));
		$project_status=(isset($_POST['project_status'])?$_POST['project_status']:(isset($_GET['project_status'])?$_GET['project_status']:""));

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$page=($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		$projects=$this->project_model->getProjectLimit($limit,(($page-1)*$limit));
		$project_total=$this->project_model->getProjectCount();

		$data_search['search_name'] =$search_name;
		$data_search['search_projecttype'] =$search_projecttype;
		$data_search['search_budget'] =$search_budget;
		$data_search['project_status'] =$project_status;

		$data['projects']=$projects;
		//$data['cat_list_arr']=$cat_list_arr;

		//pagination settings
		$config['base_url'] = site_url('find-job/page');
		$config['total_rows'] = $project_total;
		$config['per_page'] = $limit;
		$config["uri_segment"] = 3;
        		$choice = $config["total_rows"] / $config["per_page"];
        		
        		$config['use_page_numbers'] = TRUE;
        		$config["num_links"] = 5;

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['page'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$data['total_record']=$project_total;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('find_job_search_form',$data_search);
		$this->template->content->view('find_job',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function search()
	{
		$this->load->model('project_model');
		$this->load->library('pagination');
		$limit=20;

		$search_name=(isset($_POST['search_name'])?$_POST['search_name']:(isset($_GET['search_name'])?$_GET['search_name']:""));
		$search_projecttype=(isset($_POST['search_projecttype'])?$_POST['search_projecttype']:(isset($_GET['search_projecttype'])?$_GET['search_projecttype']:""));
		$search_budget=(isset($_POST['search_budget'])?$_POST['search_budget']:(isset($_GET['search_budget'])?$_GET['search_budget']:""));
		$project_status=(isset($_POST['project_status'])?$_POST['project_status']:(isset($_GET['project_status'])?$_GET['project_status']:""));

		$condition = null;

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$page=($this->uri->segment(4)) ? $this->uri->segment(4) : 1;


		if (!empty($search_name)){
			$condition["project_name"]=$search_name;
		}

		if (!empty($search_projecttype)){
			$condition["project_type"]=$search_projecttype;
		}

		if (!empty($search_budget)){
			$condition["project_value_start"]=$search_budget;
		}

		if (!empty($project_status)){
			$condition["project_status"]=$project_status;
		}		

		if ($condition){
			$project_total=$this->project_model->searchProjectCount($condition);
			$projects=$this->project_model->searchProjectLimit($condition,$limit,(($page-1)*$limit));
		}else{
			$projects=$this->project_model->getProjectLimit($limit,(($page-1)*$limit));
			$project_total=$this->project_model->getProjectCount();
		}

		$data['projects']=$projects;
		//$data['cat_list_arr']=$cat_list_arr;

		//$data_search['freelance_category'] =$cat_arr;
		$data_search['search_name'] =$search_name;
		$data_search['search_projecttype'] =$search_projecttype;
		$data_search['search_budget'] =$search_budget;
		$data_search['project_status'] =$project_status;
		

		//pagination settings
		$config['base_url'] = site_url('job/search/page');
		$config['total_rows'] = $project_total;
		$config['per_page'] = $limit;
		$config["uri_segment"] = 4;
        		$choice = $config["total_rows"] / $config["per_page"];
        		
        		$config['use_page_numbers'] = TRUE;
        		$config["num_links"] = 5;

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['suffix'] = '?search_name='.$search_name.'&search_projecttype='.$search_projecttype."&search_budget=".$search_budget."&project_status=".$project_status;

		$this->pagination->initialize($config);
		$data['page'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$data['total_record']=$project_total;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('find_job_search_form',$data_search);
		$this->template->content->view('find_job',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	function detail(){

		$login_in =isset($this->session->userdata['logged_in'])?$this->session->userdata['logged_in']:"";

		$this->load->config('my');
		$this->load->model('project_model');
		$this->load->model('freelance_model');
		$this->load->library('typography');

		$arr_project_type  = array('1' =>'งานฟรีแลนซ์' ,'2'=>'งานประจำ' );
		$arr_project_status = array('1' =>'ได้คนทำแล้ว' ,'2'=>'เปิดหาคนทำ' );
		$arr_project_timetype = array('1' =>'วัน' ,'2'=>'เดือน','3'=>'ปี' );

		$result_portfolio = null;		
		$project_id = (($this->uri->segment(3))?$this->uri->segment(3) :"");

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;		

		$result = $this->project_model->getProjectByID($project_id);
		if ($result){
			foreach ($result as $rs) {
				$project_name = $rs['project_name'];
				$project_type = $rs['project_type'];
				$project_knowhow = $rs['project_knowhow'];
				$project_detail = $rs['project_detail'];
				$project_email = $rs['project_email'];
				$project_value_start = $rs['project_value_start'];
				$project_value_end = $rs['project_value_end'];
				$project_showvalue = $rs['project_showvalue'];
				$project_startdate = $rs['project_startdate'];
				$project_enddate = $rs['project_enddate'];
				$project_time = $rs['project_time'];
				$project_timetype = $rs['project_timetype'];
				$project_status = $rs['project_status'];
				$project_cratedate = $rs['project_cratedate'];
				$project_view = $rs['project_view'];
				$owner_name = $rs['owner_name'];
				$owner_id = $rs['owner_id'];
				$owner_loginname = $rs['owner_loginname'];
				$owner_logo = $rs['owner_logo'];
				$owner_companyname = $rs['owner_companyname'];
				$owner_postcode = $rs['owner_postcode'];
				$owner_phone = $rs['owner_phone'];
				$owner_mobile = $rs['owner_mobile'];
				$owner_fax = $rs['owner_fax'];
				$owner_website = $rs['owner_website'];
				$owner_email = $rs['owner_email'];
			}
		}

		$data['project_name'] = $project_name;
		$data['project_type'] = $project_type;
		$data['project_type_name'] = $arr_project_type[$project_type];
		//$data['project_knowhow'] = "TWB00".$freelance_id;
		$data['project_detail'] = $this->typography->nl2br_except_pre($project_detail);
		$data['project_email'] = $project_email;
		$data['knowhow_list']=$this->freelance_model->getFreelanceCategoryList();
		$data['project_value_start']=$project_value_start;
		$data['project_knowhow'] = $project_knowhow;
		$data['project_value_end'] = $project_value_end;
		$data['project_showvalue'] = $project_showvalue;
		//$data['freelance_city'] = (!empty($freelance_city))?$arr_province[$freelance_city]:"";
		$data['project_startdate'] = $project_startdate;
		$data['project_enddate'] = $project_enddate;
		$data['project_time'] = $project_time;
		$data['project_timetype'] = $arr_project_timetype[$project_timetype];
		$data['project_status'] = $project_status;
		$data['project_cratedate'] = $project_cratedate;
		$data['project_view'] = $project_view;
		$data['owner_name'] = $owner_name;
		$data['owner_id'] = $owner_id;
		$data['owner_loginname'] = $owner_loginname;
		$data['owner_logo'] = $owner_logo;
		$data['owner_companyname'] = $owner_companyname;
		$data['owner_postcode'] = $owner_postcode;

		$data['owner_phone'] = $owner_phone;
		$data['owner_mobile'] = $owner_mobile;
		$data['owner_fax'] = $owner_fax;
		$data['owner_website'] = $owner_website;
		$data['owner_email'] = $owner_email;

		//$data['freelance_knowhowspecial'] = $this->typography->nl2br_except_pre($freelance_knowhowspecial);
		//$data['freelance_personal'] = $this->typography->nl2br_except_pre($freelance_personal);

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('job_detail',$data);
		$this->template->footer->view('footer');
		$this->template->publish();		

	}

}
