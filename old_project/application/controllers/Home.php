<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('freelance_model');
		$this->load->model('project_model');
		$this->load->model('owner_model');

		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;

		$projects=$this->project_model->getProjectLimit(5);
		$cat=$this->freelance_model->getFreelanceCategoryAll();
		$top_freelance=$this->freelance_model->getFreelanceAllLimit(10);
		$data_recommend['projects']=$projects;
		//$data_find_freelance['cat_list_arr']=$cat_list_arr;
		$data_cat['cat']=$cat;
		$data_top_freelance['top_freelance'] = $top_freelance;
		$data_site_reviews['site_reviews']=$this->owner_model->getOwnerAllLimit(10);
		
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('job_recommend',$data_recommend);
		$this->template->content->view('find_freelance_cat',$data_cat);
		$this->template->content->view('top10_freelance',$data_top_freelance);
		$this->template->content->view('site_reviews',$data_site_reviews);
		$this->template->content->view('web_partner');
		$this->template->footer->view('footer');
		$this->template->publish();
	}
}
