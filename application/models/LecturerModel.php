<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LecturerModel extends CI_Model
{
    public function getClassListModel()
    {
        $this->db->select('*');
        $this->db->from('classes');
        $this->db->where('lecturerID', $_SESSION['userID']);
        $this->db->order_by('classID', 'DESC');
        return $this->db->get()->result_array();
    }

    public function setNewClassModel($course, $classSection, $classCode)
    {
        $classes = array(
            'lecturerID' => $_SESSION['userID'],
            'className' => $course,
            'classSection' => $classSection,
            'classCode' => $classCode,
            'date' => date('Y-m-d'),
            'time' => date('h:i:s')
        );
        
        return $this->db->insert('classes', $classes);
    }
}
