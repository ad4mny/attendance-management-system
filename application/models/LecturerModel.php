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

    public function setNewClassModel($course, $classSection, $classCode, $date, $time)
    {
        $classes = array(
            'lecturer_id' => $_SESSION['id'],
            'name' => $course,
            'section' => $classSection,
            'code' => $classCode,
            'date' => $date,
            'time' => $time
        );

        return $this->db->insert('classes', $classes);
    }

    public function getAttendancesListModel($class_id)
    {
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->join('users', 'attendances.student_id = users.id');
        $this->db->where('class_id', $class_id);
        $this->db->order_by('attendance_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function deleteClassModel($class_id)
    {
        $this->db->where('class_id', $class_id);
        return $this->db->delete('classes');
    }

    public function getClassReviewModel($attendance_id)
    {
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->join('users', 'attendances.student_id = users.id');
        $this->db->where('attendance_id', $attendance_id);
        $this->db->where('status !=', 'Absent');
        return $this->db->get()->row_array();
    }

    public function getAbsentReasonModel($attendance_id)
    {
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->join('users', 'attendances.student_id = users.id');
        $this->db->where('attendance_id', $attendance_id);
        $this->db->where('status', 'Absent');
        return $this->db->get()->row_array();
    }
}
