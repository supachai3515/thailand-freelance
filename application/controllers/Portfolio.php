<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class portfolio extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
      $data["content"] = "portfolio/portfolio_view";
      $data["header"] = $this->get_header("portfolio");
      //$data["project_list"] = $this->project_model->get_project('', 0, 5);
      //$data["portfolio_list"] = $this->portfolio_model->get_portfolio('', 0, 20);
      $this->load->view("template/layout_front", $data);
    }

    public function view($id)
    {
    }
}
