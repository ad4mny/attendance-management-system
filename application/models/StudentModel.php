<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{
    public function getAttendanceListModel()
    {
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->join('classes', 'attendances.class_id = classes.class_id');
        $this->db->where('attendances.student_id', $_SESSION['id']);
        $this->db->order_by('attendances.attendance_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function setNewAttendanceModel($class_code)
    {
        $this->db->select('class_id, date, time');
        $this->db->from('classes');
        $this->db->where('code', $class_code);
        $result = $this->db->get()->row_array();
        
        $current_date = date('Y-m-d');
        $current_time = date('h:i:s');

        if ($current_date == $result['date']) {
            if ($current_time == $result['time']) {
                $status = 'Ontime';
            } else {
                $status = 'Late';
            }
        } else {
            $status = 'Absent';
        }

        $attendances = array(
            'student_id' => $_SESSION['id'],
            'class_id' => $result['class_id'],
            'date' => date('Y-m-d'),
            'time' => date('h:i:s'),
            'status' => $status
        );

        return $this->db->insert('attendances', $attendances);
    }
}
