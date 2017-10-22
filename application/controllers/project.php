<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class project extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
      $data["content"] = "project/project_view";
      $data["header"] = $this->get_header("project");

      $this->load->view("template/layout_front", $data);
    }

    public function view($id)
    {
      $data["content"] = "project/project_view_info";
      $data["header"] = $this->get_header("project","project info","project info");
      //$data["project_info"] = $this->project_model->get_project_info($id);
      $this->load->view("template/layout_front", $data);
    }
}
