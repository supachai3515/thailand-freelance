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
    $this->load->model('initdata_model');
  }

  function index()
  {
    $data["content"] = "home/home_view";
    $data["header"] = $this->get_header("home");
    $this->load->view("template/layout_front", $data);
  }

}
