<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function index()
	{
		$this->load->model('freelance_model');
		$this->load->library('pagination');

		$limit=20;


		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;



		$this->pagination->initialize($config);
		$data_find_freelance['page'] = $page;
		$data_find_freelance['pagination'] = $this->pagination->create_links();
		$data_find_freelance['total_record']=$freelance_total;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('find_freelance_search_form',$data_search);
		$this->template->content->view('find_freelance',$data_find_freelance);
		$this->template->footer->view('footer');
		$this->template->publish();
	}



	public function detail()
	{
		$this->config->load('my');
		$this->load->model('freelance_model');
		$this->load->model('portfolio_model');
		$this->load->library('typography');

		$result_portfolio = null;		
		$owner_id = (($this->uri->segment(3))?$this->uri->segment(3) :"");

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;		

		$result = $this->freelance_model->getFreelanceByID($freelance_id);
		$arr_cat = $this->freelance_model->getFreelanceCategory();

		$arr_sex = array("1"=>"ชาย","2"=>"หญิง");

		$arr_province=$this->config->item('province_list');

		if ($result){
			foreach ($result as $rs) {
				$freelance_name = $rs['freelance_name'];
				$freelance_categoryid = $rs['freelance_categoryid'];
				$freelance_flogo = $rs['freelance_flogo'];
				$freelance_loginname = $rs['freelance_loginname'];
				$freelance_knowhow = $rs['freelance_knowhow'];
				$freelance_sex = $rs['freelance_sex'];
				$freelance_age = $rs['freelance_age'];
				$freelance_city = $rs['freelance_city'];
				$freelance_postcode = $rs['freelance_postcode'];
				$freelance_phone = $rs['freelance_phone'];
				$freelance_mobile = $rs['freelance_mobile'];
				$freelance_fax = $rs['freelance_fax'];
				$freelance_email = $rs['freelance_email'];
				$freelance_knowhowspecial = $rs['freelance_knowhowspecial'];
				$freelance_personal = $rs['freelance_personal'];
			}

		}
		$data['freelance_flogo'] = $freelance_flogo;
		$data['freelance_id'] = $freelance_id;
		$data['freelance_id_show'] = "TWB00".$freelance_id;
		$data['freelance_category_name'] = (!empty($freelance_categoryid))?$arr_cat[$freelance_categoryid]:"";
		$data['freelance_loginname'] = $freelance_loginname;
		$data['knowhow_list']=$this->freelance_model->getFreelanceCategoryList();
		$data['freelance_knowhow']=$freelance_knowhow;

		$data['freelance_sex'] = $arr_sex[$freelance_sex];
		$data['freelance_age'] = $freelance_age;
		$data['freelance_city'] = (!empty($freelance_city))?$arr_province[$freelance_city]:"";
		$data['freelance_postcode'] = $freelance_postcode;
		$data['freelance_phone'] = $freelance_phone;
		$data['freelance_mobile'] = $freelance_mobile;
		$data['freelance_fax'] = $freelance_fax;
		$data['freelance_email'] = $freelance_email;
		$data['freelance_knowhowspecial'] = $this->typography->nl2br_except_pre($freelance_knowhowspecial);
		$data['freelance_personal'] = $this->typography->nl2br_except_pre($freelance_personal);



		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('freelance_detail',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

}
