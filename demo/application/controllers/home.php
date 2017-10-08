<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Home extends BaseController
{
  public function __construct()
  {
    parent::__construct();
    session_start();
    //call model inti
    $this->load->model('project_model');
    $this->load->model('member_model');
  }

  function index()
  {
    $data["content"] = "home/home_view";
    $data["header"] = $this->get_header("home");
    $data["project_list"] = $this->project_model->get_project('',0,5);
    $data["member_list"] = $this->member_model->get_member('',0,20);
    $this->load->view("template/layout_front", $data);
  }

}
