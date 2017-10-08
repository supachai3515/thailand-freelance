<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Register extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        //call model inti
    }

    public function index()
    {
      $data["content"] = "user/register_view";
      $data["header"] = $this->get_header("member");
      $this->load->view("template/layout_front", $data);
    }
}
