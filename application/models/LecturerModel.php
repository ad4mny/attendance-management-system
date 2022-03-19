<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LecturerModel extends CI_Model
{
    public function getClassListModel()
    {
        $this->db->select('*');
        $this->db->from('classes');
        $this->db->where('lecturer_id', $_SESSION['id']);
        $this->db->order_by('class_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function setNewClassModel($course, $classSection, $classCode)
    {
        $classes = array(
            'lecturer_id' => $_SESSION['id'],
            'name' => $course,
            'section' => $classSection,
            'code' => $classCode,
            'date' => date('Y-m-d'),
            'time' => date('h:i:s')
        );
        
        return $this->db->insert('classes', $classes);
    }
}
