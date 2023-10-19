<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Antrian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('supplier_model');
    $this->load->model('Antrian_model');
   
  }

  public function index()
  {
    $this->load->view('template/header');
    $this->load->view('template/index');
    $this->load->view('template/footer');
  }
 
  public function tambah_supplier()
{
    // Set aturan validasi untuk nama_supplier
    $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');

    // Set aturan validasi untuk no_telepon
    $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');

    // Set aturan validasi untuk jumlah_surat_jalan
    $this->form_validation->set_rules('jumlah_surat_jalan', 'Jumlah Surat Jalan', 'required|numeric');

    // Set aturan validasi untuk keterangan
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    // Periksa apakah validasi berhasil
    if ($this->form_validation->run() === FALSE) {
        // Jika validasi gagal, tampilkan kembali formulir dengan pesan kesalahan
        $this->load->view('template/header');
        $this->load->view('template/index');
        $this->load->view('template/footer2');
    } else {
        // Jika validasi berhasil, lanjutkan dengan pemrosesan data supplier
        $data_supplier = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'no_telepon' => $this->input->post('no_telepon'),
            'tanggal_daftar' => date('Y-m-d'),
            'jumlah_surat_jalan' => $this->input->post('jumlah_surat_jalan'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->supplier_model->tambah_supplier($data_supplier);
        // Ambil nomor antrian
        $tanggal_antrian = date('Y-m-d');
        $nomor_antrian = $this->Antrian_model->ambil_nomor_antrian($tanggal_antrian);

        $data_antrian = array(
            'nomor_antrian' => $nomor_antrian,
            'tanggal_antrian' => $tanggal_antrian
        );
        // Simpan nomor antrian dalam sesi
        $this->session->set_userdata('nomor_antrian', $nomor_antrian);
        // Redirect ke halaman tampilan antrian
        redirect('antrian/status_antrian');
    }
}

  
  public function status_antrian() { // status_antrian() menangani tampilan status antrian. Nomor antrian diambil dari sesi, dan kemudian data status antrian diperoleh dari model Antrian_model. Tiga tampilan dimuat untuk membentuk halaman tampilan antrian.

    // Ambil nomor antrian dari session
    $nomor_antrian = $this->session->userdata('nomor_antrian');

    $data['antrian'] = $this->Antrian_model->get_status_antrian_by_nomor($nomor_antrian);
    $this->load->view('template/header');
    $this->load->view('template/tampilantrian',$data);
    $this->load->view('template/footer3');
}
public function get_status_antrian_ajax() { // endpoint AJAX yang mengambil status antrian dalam format JSON. Ini digunakan untuk mendapatkan status antrian secara dinamis dalam aplikasi web
  $nomor_antrian = $this->session->userdata('nomor_antrian');
  $antrian = $this->Antrian_model->get_status_antrian_by_nomor($nomor_antrian);

  header('Content-Type: application/json');
  echo json_encode($antrian);
}
}