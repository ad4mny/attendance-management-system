<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get()->row_array();
    }

    public function register($firstName, $lastName, $username, $password, $role)
    {
        $users = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );

        return $this->db->insert('users', $users);
    }

    public function checkUsername($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $this->db->get()->row_array();
    }
}
