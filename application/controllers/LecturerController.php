<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LecturerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LecturerModel');
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/HeaderTemplate');
        $this->load->view('templates/NavigationTemplate');

        switch ($page) {
            case '':
                break;
            default:
                $data['classes'] = $this->getClassList();
                $this->load->view('lecturer/DashboardView', $data);
                break;
        }

        $this->load->view('templates/FooterTemplate');
    }

    public function getClassList()
    {
        return $this->LecturerModel->getClassListModel();
    }

    public function setNewClass()
    {
        $course = $this->input->post('course');
        $classSection = $this->input->post('section') . $this->input->post('group');
        $classCode  = uniqid();;

        if ($this->LecturerModel->setNewClassModel($course, $classSection, $classCode) !== false) {
            $this->session->set_tempdata('notice', 'Success!', 1);
            redirect('lecturer/dashboard');
        } else {
            $this->session->set_tempdata('error', 'Failed to create a new class, please try again.', 1);
            redirect('lecturer/dashboard');
        }
    }
}
