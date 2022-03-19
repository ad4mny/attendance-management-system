<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/HeaderTemplate');
        $this->load->view('templates/NavigationTemplate');

        switch ($page) {
            case '':
                break;
            default:
                $data['attendances'] = $this->getAttendaceList();
                $this->load->view('DashboardView', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate');
    }

    public function getAttendaceList()
    {
        return $this->StudentModel->getAttendanceListModel();
    }

    public function setNewAttendance()
    {
        if ($this->StudentModel->setNewAttendanceModel($this->input->post('code')) === TRUE) {
            $this->session->set_tempdata('notice', 'Success! Your attendance has been recorded.', 1);
            redirect(base_url() . 'dashboard');
        } else {
            $this->session->set_tempdata('notice', 'Failed! Please check your class code.', 1);
            redirect(base_url() . 'dashboard');
        }
    }
}
