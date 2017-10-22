<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Login extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->isLoggedIn();
    }

    public function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (!isset($isLoggedIn) || $isLoggedIn != true) {
            $data["content"] = "member/login_view";
            $data["header"] = $this->get_header("login");
            $this->load->view("template/layout_front", $data);
        } else {
            redirect('/home');
        }
    }

    public function authen()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|xss_clean|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->login_model->login_authen($email, $password);
            if (count($result) > 0) {
                if ($result["password"] != "") {
                    $sessionArray = array('menberId'=>$result["member_id"],
                            'memberName'=>$result["firstname"]." ".$result["lastname"],
                            'isLoggedIn' => TRUE
                      );
                    $this->session->set_userdata($sessionArray);
                    redirect('/home');
                } else {
                    $this->session->set_flashdata('error', 'password mismatch');
                    redirect('/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Email mismatch');
                redirect('/login');
            }
        }
    }
}
