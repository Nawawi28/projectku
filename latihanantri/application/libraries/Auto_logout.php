<?php
class Auto_logout {

protected $CI;

public function __construct() {
$this->CI =& get_instance();
$this->CI->load->library('session');
}

public function check_inactivity() {
$last_activity = $this->CI->session->userdata('last_activity');
$inactive_timeout = 1 * 60; // 30 menit (dalam detik)

if ($last_activity && (time() - $last_activity) > $inactive_timeout) {
$this->CI->session->unset_userdata('nik');
redirect('login/logout');
}

// Update waktu terakhir aktivitas
$this->CI->session->set_userdata('last_activity', time());
}
}