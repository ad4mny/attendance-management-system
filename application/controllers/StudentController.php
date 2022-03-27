<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->library('upload');
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
            $this->session->set_tempdata('error', 'Failed! Please check your class code or you already submitted one.', 1);
            redirect(base_url() . 'dashboard');
        }
    }

    public function setNewReview()
    {
        $chapter = $this->input->post('chapter');
        $learn = $this->input->post('learn');
        $understanding = $this->input->post('understanding');
        $question = $this->input->post('question');
        $attendance_id = $this->input->post('review_attendance_id');

        if ($this->StudentModel->setNewReviewModel($chapter, $learn, $understanding, $question, $attendance_id) === TRUE) {
            $this->session->set_tempdata('notice', 'Success! Your class review has been recorded.', 1);
            redirect(base_url() . 'dashboard');
        } else {
            $this->session->set_tempdata('error', 'Failed! Please try again.', 1);
            redirect(base_url() . 'dashboard');
        }
    }

    public function setAbsent()
    {
        $type = $this->input->post('type');
        $reason = $this->input->post('reason');
        $attendance_id = $this->input->post('absent_attendance_id');

        $path = './upload/document/' . $_SESSION['id'];

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {

            $this->session->set_tempdata('error', $this->upload->display_errors('', ''), 1);
            redirect(base_url() . 'dashboard');
        } else {

            $file = $this->upload->data('file_name');
            if ($this->StudentModel->setAbsentModel($type, $reason, $file, $attendance_id) === TRUE) {
                $this->session->set_tempdata('notice', 'Success! Your absent has been recorded.', 1);
                redirect(base_url() . 'dashboard');
            } else {
                $this->session->set_tempdata('error', 'Failed! Please try again.', 1);
                redirect(base_url() . 'dashboard');
            }
        }
    }
}
