<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->check_login();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['adm'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['admins'] = $this->Admin_model->getAllAdmin();
        $data['antrianterbaru'] = $this->Admin_model->getAntrianByTanggalTerbaru();
        $data['jumlah_antrian'] = $this->Admin_model->getJumlahAntrian();
        $data['antrian_sekarang'] = $this->Admin_model->getAntrianSekarang();
        $data['antrian_selanjutnya'] = $this->Admin_model->getAntrianSelanjutnya();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer', $data);
    }
   
    protected function check_login() {
        if (!$this->session->userdata('nik')) {
            redirect('login');// Arahkan ke halaman login jika belum login
        }
    }

    public function ubah_status_antrian($id_antrian, $status_antrian)
    {
        $this->load->model('Admin_model');

        // panggil fungsi ubah_status_antrian pada model
        $result = $this->Admin_model->ubah_status_antrian($id_antrian, $status_antrian);

        if ($result) {
            $this->session->set_flashdata('success', 'Status antrian berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah status antrian.');
        }

        // redirect ke halaman daftar antrian
        redirect('admin');
    }
    public function hapus_dataantrian($id_supplier)
    {
        $this->Admin_model->hapusAntrian($id_supplier); // Panggil method hapusAntrian pada model
        $this->session->set_flashdata('success', 'data antrian berhasil dihapus');
        redirect('Dataantrian'); // Redirect ke halaman antrian setelah hapus
    }


    public function updateSupplier($id_supplier)
    {
        $data['supplier'] = $this->Admin_model->getSupplierById($id_supplier); // Ambil data supplier berdasarkan ID dari model

        if ($data['supplier']) {

            $data['adm'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
            $data['jumlah_antrian'] = $this->Admin_model->getJumlahAntrian();
            $data['antrian_sekarang'] = $this->Admin_model->getAntrianSekarang();
            $data['antrian_selanjutnya'] = $this->Admin_model->getAntrianSelanjutnya();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/ubahdatasupplier', $data);
            $this->load->view('admin/footer', $data);
        } else {
            $this->session->set_flashdata('error', 'data antrian tidak ditemukan.');
        }
    }

    public function processUpdateSupplier()
    {
        $id_supplier = $this->input->post('id_supplier');
        $nama_supplier = $this->input->post('nama_supplier');
        $no_telepon = $this->input->post('no_telepon');
        $tanggal_daftar = $this->input->post('tanggal_daftar');
        $jumlah_surat_jalan = $this->input->post('jumlah_surat_jalan');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama_supplier' => $nama_supplier,
            'no_telepon' => $no_telepon,
            'tanggal_daftar' => $tanggal_daftar,
            'jumlah_surat_jalan' => $jumlah_surat_jalan,
            'keterangan' => $keterangan
        );

        $this->Admin_model->updateSupplier($id_supplier, $data); // Panggil method updateSupplier pada model
        $this->session->set_flashdata('success', 'data antrian berhasil diubah.');
        redirect('Dataantrian'); // Redirect ke halaman supplier setelah update
    }

    public function exportexcel()
    {
        $this->load->model('Admin_model');
        $data = [
            'title' => 'Laporan Buku',
            'supplier' => $this->Admin_model->get_data()->result_array()
        ];
        $this->load->view('admin/excel', $data);
    }

    public function exportToPDF()
    {

        $this->load->library('Dompdf_gen');

        $data['judul'] = 'Laporan Kedatangan Supplier';
        $data['supplier'] = $this->Admin_model->get_data()->result_array();

        $this->load->view('admin/pdf', $data);

        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_data_supplier.pdf');
    }



  
   
}