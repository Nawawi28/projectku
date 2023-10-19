<?php
class LoginMiddleware {

protected $CI;

public function __construct() {
    $this->CI =& get_instance();
    $this->CI->load->library('session');
}

public function check_login() {
    $allowed_pages = array('Login', 'register'); // Halaman yang diizinkan diakses tanpa login
    $current_page = $this->CI->uri->segment(1);

    if (!$this->CI->session->userdata('nik') && !in_array($current_page, $allowed_pages)) {
        redirect('Login');
    }
}
}