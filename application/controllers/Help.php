<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index()
	{
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('help');
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function freelance()
	{
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('help_freelance');
		$this->template->footer->view('footer');
		$this->template->publish();
	}

	public function owner()
	{
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('help_owner');
		$this->template->footer->view('footer');
		$this->template->publish();
	}	
}
