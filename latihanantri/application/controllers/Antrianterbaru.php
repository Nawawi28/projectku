<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrianterbaru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
  }
  public function index()
  {
    $data['adm'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
    $data['jumlah_antrian'] = $this->Admin_model->getJumlahAntrian();
    $data['antrian_sekarang'] = $this->Admin_model->getAntrianSekarang();
    $data['antrian_selanjutnya'] = $this->Admin_model->getAntrianSelanjutnya();
    $data['antrianterbaru'] = $this->Admin_model->getAntrianByTanggalTerbaru();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/footer', $data);
  }
  public function getLatestQueueData()
  {
    $antrianterbaru = $this->Admin_model->getAntrianByTanggalTerbaru();
        
    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($antrianterbaru);
}
}