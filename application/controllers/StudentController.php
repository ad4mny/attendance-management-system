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
}
