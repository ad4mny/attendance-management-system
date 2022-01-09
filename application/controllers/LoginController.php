<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index($page = 'login')
    {
        $this->load->view('templates/HeaderTemplate');
        if ($page == 'register') {
            $this->load->view('RegisterView');
        } else {
            $this->load->view('LoginView');
        }
        $this->load->view('templates/FooterTemplate');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->login($username, $password);

        if ($return !== NULL) {
            $this->session->set_userdata('userID', $return['userID']);
            $this->session->set_userdata('role', $return['role']);
            $this->session->set_tempdata('notice', 'Login successful.', 1);

            if ($this->session->userdata('role') == 1) {
                redirect(base_url() . 'lecturer/dashboard');
            } else {
                redirect(base_url() . 'dashboard');
            }
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password entered.', 1);
            redirect(base_url() . 'login');
        }
    }

    public function register()
    {
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $username = $this->input->post('username');
        $role = $this->input->post('role');
        $password = $this->input->post('password');
        $comparePassword = $this->input->post('comparePassword');

        if ($password !== $comparePassword) {
            $this->session->set_tempdata('error', 'Password does not match, please register again.', 1);
            redirect(base_url() . 'register');
        } else if ($this->checkUsername($username) !== null) {
            $this->session->set_tempdata('error', 'Username has been taken, please choose another username.', 1);
            redirect(base_url() . 'register');
        } else {
            if ($this->LoginModel->register($firstName, $lastName, $username, md5($password), $role) === true) {
                $this->login($username, $password);
            } else {
                $this->session->set_tempdata('error', 'Registration failed, please register again.', 1);
                redirect(base_url() . 'register');
            }
        }
    }

    public function checkUsername($username)
    {
        return $this->LoginModel->checkUsername($username);
    }

    public function logout()
    {
        $this->session->set_tempdata('notice', 'You have logout successfully.', 1);

        $this->session->unset_userdata(array(
            'userID',
            'role'
        ));

        redirect();
    }
}
