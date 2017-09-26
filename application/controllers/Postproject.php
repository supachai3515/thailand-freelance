<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postproject extends CI_Controller {

	public function index()
	{
		$class_name=$this->router->fetch_class();
		$data_navigation['active']=$class_name;
		$this->template->header->view('header');
		$this->template->top_site_banner->view('site_banner');
		$this->template->navigation_bar->view('navbar',$data_navigation);
		$this->template->content->view('post_project');
		$this->template->footer->view('footer');
		$this->template->publish();
	}
}
