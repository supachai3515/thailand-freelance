<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Findfreelance extends CI_Controller {

	public function index()
	{
		$this->load->model('freelance_model');
		$this->load->library('pagination');

		$limit=20;

		$search_name=isset($_POST['search_name'])?$_POST['search_name']:isset($_GET['search_name'])?$_GET['search_name']:"";
		$search_typeid=isset($_POST['search_typeid'])?$_POST['search_typeid']:isset($_GET['search_typeid'])?$_GET['search_typeid']:"";
		$freelance_categoryid=isset($_POST['freelance_categoryid'])?$_POST['freelance_categoryid']:isset($_GET['freelance_categoryid'])?$_GET['freelance_categoryid']:"";


		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$page=($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		$freelances=$this->freelance_model->getFreelanceLimit($limit,(($page-1)*$limit));
		$freelance_total=$this->freelance_model->getFreelanceCount();
		$cat_list_arr=$this->freelance_model->getFreelanceCategoryList();
		$data_find_freelance['freelances']=$freelances;
		$data_find_freelance['cat_list_arr']=$cat_list_arr;

		$cat_arr=$this->freelance_model->getFreelanceCategory();

		$data_search['freelance_category'] =$cat_arr;
		$data_search['search_name'] =$search_name;
		$data_search['search_typeid'] =$search_typeid;
		$data_search['freelance_categoryid'] =$freelance_categoryid;


		//pagination settings
		$config['base_url'] = site_url('find-freelance/page');
		$config['total_rows'] = $freelance_total;
		$config['per_page'] = $limit;
		$config["uri_segment"] = 3;
        		$choice = $config["total_rows"] / $config["per_page"];
        		$config["num_links"] = 5;
        		$config['use_page_numbers'] = TRUE;
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
		$data_find_freelance['page'] = $page;
		$data_find_freelance['pagination'] = $this->pagination->create_links();
		$data_find_freelance['total_record']=$freelance_total;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		//$this->template->content->view('find_freelance_search_form',$data_search);
		$this->template->content->view('find_freelance',$data_find_freelance);
		$this->template->footer->view('footer');
		$this->template->publish();
	}


	public function search()
	{
		$this->load->model('freelance_model');
		$this->load->library('pagination');

		$limit=20;

		$search_name=(isset($_POST['search_name'])?$_POST['search_name']:(isset($_GET['search_name'])?$_GET['search_name']:""));
		$search_typeid=(isset($_POST['search_typeid'])?$_POST['search_typeid']:(isset($_GET['search_typeid'])?$_GET['search_typeid']:""));
		$freelance_categoryid=(isset($_POST['freelance_categoryid'])?$_POST['freelance_categoryid']:(isset($_GET['freelance_categoryid'])?$_GET['freelance_categoryid']:""));
		$condition = null;

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$page=($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

		$arr_field= array("1"=>"freelance_name","2"=>"freelance_loginname","3"=>"freelance_email");
		$field_search=(!empty($search_typeid))?$arr_field[$search_typeid]:"";

		if ((!empty($search_name)) && (!empty($search_typeid))){
			$condition[$field_search]=$search_name;
		}
		if (!empty($freelance_categoryid)){
			$condition["freelance_categoryid"]=$freelance_categoryid;
		}

		if ($condition){
			$freelance_total=$this->freelance_model->searchFreelanceCount($condition);
			$freelances=$this->freelance_model->searchFreelanceLimit($condition,$limit,(($page-1)*$limit));
		}else{
			$freelance_total=$this->freelance_model->getFreelanceCount();
			$freelances=$this->freelance_model->getFreelanceLimit($limit,(($page-1)*$limit));			
		}
		

		
		

		$cat_list_arr=$this->freelance_model->getFreelanceCategoryList();


		$data_find_freelance['freelances']=$freelances;
		$data_find_freelance['cat_list_arr']=$cat_list_arr;

		$cat_arr=$this->freelance_model->getFreelanceCategory();

		$data_search['freelance_category'] =$cat_arr;
		$data_search['search_name'] =$search_name;
		$data_search['search_typeid'] =$search_typeid;
		$data_search['freelance_categoryid'] =$freelance_categoryid;


		//pagination settings
		$config['base_url'] = site_url('freelance/search/page');
		$config['total_rows'] = $freelance_total;
		$config['per_page'] = $limit;
		$config["uri_segment"] = 4;
        		$choice = $config["total_rows"] / $config["per_page"];
        		$config["num_links"] = 5;
        		$config['use_page_numbers'] = TRUE;

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
		$config['suffix'] = '?search_name='.$search_name.'&search_typeid='.$search_typeid."&freelance_categoryid=".$freelance_categoryid;

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
		$freelance_id = (($this->uri->segment(3))?$this->uri->segment(3) :"");

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
			$result_portfolio = $this->portfolio_model->getPortfolioByLogin($freelance_loginname);
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

		$data['portfolios'] = $result_portfolio;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('freelance_detail',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}

}
