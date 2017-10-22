<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Member extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //call model inti
        $this->load->model('project_model');
        $this->load->model('member_model');
    }

    public function index()
    {
      $data["content"] = "member/member_view";
      $data["header"] = $this->get_header("member");
      $data["project_list"] = $this->project_model->get_project('', 0, 5);
      $data["member_list"] = $this->member_model->get_member('', 0, 20);
      $this->load->view("template/layout_front", $data);
    }

    public function view($id)
    {
      $data["content"] = "member/member_view_info";
      $data["header"] = $this->get_header("Member","Member info","Member info");
      $data["member_info"] = $this->member_model->get_member_info($id);
      $this->load->view("template/layout_front", $data);
    }
}
