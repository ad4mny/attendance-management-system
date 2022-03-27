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
        $class_id = $result['class_id'];
        $class_date = $result['date'];
        $class_time = $result['time'];

        if ($current_date == $class_date) {
            if ($current_time <= $class_time) {
                $status = 'Ontime';
            } else {
                $status = 'Late';
            }
        } else {
            $status = 'Absent';
        }

        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->where('class_id', $class_id);
        $this->db->where('student_id', $_SESSION['id']);
        $result = $this->db->get();

        if ($result->num_rows() < 1) {

            $attendances = array(
                'student_id' => $_SESSION['id'],
                'class_id' => $class_id,
                'date' => date('Y-m-d'),
                'time' => date('h:i:s'),
                'status' => $status
            );

            return $this->db->insert('attendances', $attendances);
        } else {
            return false;
        }
    }

    public function setNewReviewModel($chapter, $learn, $understanding, $question, $attendance_id)
    {
        $attendances = array(
            'chapter_learn' => $chapter,
            'what_have_learn' => $learn,
            'understanding_rate' => $understanding,
            'question' => $question
        );

        $this->db->where('attendance_id', $attendance_id);
        return $this->db->update('attendances', $attendances);
    }

    public function setAbsentModel($type, $reason, $file, $attendance_id)
    {
        $attendances = array(
            'absent_type' => $type,
            'absent_reason' => $reason,
            'absent_file' => $file
        );

        $this->db->where('attendance_id', $attendance_id);
        return $this->db->update('attendances', $attendances);
    }
}
