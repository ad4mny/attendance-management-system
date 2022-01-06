<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_username', $username);
        $this->db->where('u_password', $password);
        return $this->db->get()->row_array();
    }

    public function register($username, $password, $type)
    {
        $data = array(
            'u_username' => $username,
            'u_password' => $password,
            'u_type' => $type
        );

        return $this->db->insert('users', $data);
    }

    public function checkUsername($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_username', $username);
        return $this->db->get()->row_array();
    }
}
