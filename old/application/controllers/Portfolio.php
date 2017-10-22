<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function index()
	{
		$limit=20;

		$page=($this->uri->segment(3)) ? $this->uri->segment(3) : 1;

		$this->load->model('portfolio_model');
		$this->load->library('pagination');

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$portfolios=$this->portfolio_model->getPortfolioLimit($limit,(($page-1)*$limit));
		$portfolio_total=$this->portfolio_model->getPortfolioCount();

		$data['portfolios']= $portfolios;

		//pagination settings
		$config['base_url'] = site_url('portfolio/page');
		$config['total_rows'] = $portfolio_total;
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
		$data['page'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$data['total_record']=$portfolio_total;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('portfolio',$data);
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
		$portfolio_id = (($this->uri->segment(3))?$this->uri->segment(3) :"");

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;		

		$result = $this->portfolio_model->getPortfolioByID($portfolio_id);
		$arr_cat = $this->freelance_model->getFreelanceCategory();

		if ($result){
			foreach ($result as $rs) {
				$freelance_id = $rs['freelance_id'];
				$portfolio_id = $rs['portfolio_id'];
				$freelance_loginname = $rs['freelance_loginname'];
				$freelance_flogo = $rs['freelance_flogo'];
				$freelance_categoryid = $rs['freelance_categoryid'];
				$portfolio_name = $rs['portfolio_name'];
				$portfolio_detail = $rs['portfolio_detail'];
				$portfolio_url = $rs['portfolio_url'];
				$portfolio_images = $rs['portfolio_images'];
				$portfolio_createdate = $rs['portfolio_createdate'];
			}
			$result_portfolio = $this->portfolio_model->getPortfolioByLogin($freelance_loginname);
		}
		$data['freelance_category_name'] = (!empty($freelance_categoryid))?$arr_cat[$freelance_categoryid]:"";
		$data['portfolio_id'] = $portfolio_id;

		$data['portfolio_name'] = $portfolio_name;
		$data['portfolio_detail'] =$portfolio_detail;
		$data['portfolio_images '] = $portfolio_images ;
		$data['portfolio_createdate']=$portfolio_createdate;
		$data['portfolio_images']=$portfolio_images;

		$data['freelance_categoryid'] = $freelance_categoryid;
		$data['freelance_flogo'] =$freelance_flogo;
		$data['freelance_id'] = $freelance_id;
		$data['freelance_loginname'] = $freelance_loginname;
		$data['portfolios'] = $result_portfolio;

		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('portfolio_detail',$data);
		$this->template->footer->view('footer');
		$this->template->publish();
	}
}
