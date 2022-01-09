<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{
    public function getAttendanceListModel()
    {
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->join('classes', 'attendances.classID = classes.classID');
        $this->db->where('attendances.userID', $_SESSION['userID']);
        $this->db->order_by('attendances.attendanceID', 'DESC');
        return $this->db->get()->result_array();
    }
}
