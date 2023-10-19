<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataadmin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        
	}
	public function index()
	{
		$data['adm'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['jumlah_antrian'] = $this->Admin_model->getJumlahAntrian();
        $data['antrian_sekarang'] = $this->Admin_model->getAntrianSekarang();
        $data['antrian_selanjutnya'] = $this->Admin_model->getAntrianSelanjutnya();
        
		$this->load->view('admin/header',$data);
		$this->load->view('admin/detailadmin',$data);
		$this->load->view('admin/footer',$data);
	}
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
        
        $this->form_validation->set_rules('username', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['adm'] = $this->db->get_where('admin', ['nik' => $this->session->userdata('nik')])->row_array();
            $data['jumlah_antrian'] = $this->Admin_model->getJumlahAntrian();
            $data['antrian_sekarang'] = $this->Admin_model->getAntrianSekarang();
             $data['antrian_selanjutnya'] = $this->Admin_model->getAntrianSelanjutnya();
		    $this->load->view('admin/header',$data);
		    $this->load->view('admin/editprofil',$data);
		    $this->load->view('admin/footer',$data);;
        } else {
            $nik = $this->session->userdata('nik');
            $name = $this->input->post('username');
          

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/admin/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['admin']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/admin/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah profile admin');
                }
            }

            $this->db->set('username', $name);
            $this->db->where('nik', $nik);
            $this->db->update('admin');

            $this->session->set_flashdata('success', 'profile admin berhasil diubah.');
            redirect('dataadmin');
        }
    }
   
    
}