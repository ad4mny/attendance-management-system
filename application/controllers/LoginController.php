<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('templates/HeaderTemplate');
        $this->load->view('LoginView');
        $this->load->view('templates/FooterTemplate');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->login($username, $password);

        if ($return !== NULL) {
            $this->session->set_userdata('uid', $return['u_id']);
            $this->session->set_tempdata('notice', 'Login successful.', 1);
            redirect(base_url() . 'dashboard');
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password entered.', 1);
            redirect(base_url() . 'login');
        }
    }

    public function register()
    {
        $username = $this->input->post('username');
        $type = $this->input->post('type');
        $password = $this->input->post('password');
        $c_password = $this->input->post('c_password');

        if ($password !== $c_password) {
            $this->session->set_tempdata('error', 'Password does not match, please register again.', 1);
            redirect(base_url() . 'login');
        } else if ($this->checkUsername($username) !== null) {
            $this->session->set_tempdata('error', 'Username has been taken, please choose another username.', 1);
            redirect(base_url() . 'login');
        } else {
            if ($this->LoginModel->register($username, md5($password), $type) === true) {
                $this->login($username, $password);
            } else {
                $this->session->set_tempdata('error', 'Registration failed, please register again.', 1);
                redirect(base_url() . 'login');
            }
        }
    }

    public function checkUsername($username)
    {
        return $this->LoginModel->checkUsername($username);
    }

    public function logout()
    {
        $session_data = array(
            'uid',
        );

        $this->session->set_tempdata('notice', 'You have logout successfully.', 1);
        $this->session->unset_userdata($session_data);

        redirect();
    }
}
