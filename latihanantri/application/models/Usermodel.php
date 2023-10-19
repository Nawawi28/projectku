<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get('admin')->row_array();
    }

    public function add_user($data) {
        return $this->db->insert('admin', $data);
    }
}