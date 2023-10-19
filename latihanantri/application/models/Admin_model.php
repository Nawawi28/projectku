<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_all()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('antrian');
        return $query->result();
    }
    public function get_join_data()
    {
        $this->db->select('*');
        $this->db->from('antrian');
        $this->db->join('supplier', 'antrian.id_supplier = supplier.id_supplier');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAntrianByTanggalTerbaru()
    {
        $this->db->select('antrian.*, supplier.nama_supplier'); // Pilih kolom yang ingin ditampilkan, termasuk kolom dari tabel supplier
        $this->db->from('antrian');
        $this->db->join('supplier', 'antrian.id_supplier = supplier.id_supplier');
        $this->db->where('antrian.tanggal_antrian', date('Y-m-d')); // Ambil data antrian dengan tanggal_antrian sama dengan tanggal sekarang
        $query = $this->db->get();

        return $query->result();
    }
   
    public function ubah_status_antrian($id_antrian, $status_antrian)
    {
        $this->db->where('id_antrian', $id_antrian);
        $data = array('status_antrian' => $status_antrian);
        return $this->db->update('antrian', $data);
    }
    public function hapusAntrian($id_supplier)
    {
        // Hapus data dari tabel antrian yang terkait dengan supplier
        $this->db->where('id_supplier', $id_supplier);
         $this->db->delete('supplier');
    }
    public function getAntrianById($id_antrian)
    {
        $this->db->where('id_antrian', $id_antrian);
        return $this->db->get('antrian')->row_array();
    }

    public function updateSupplier($id_supplier, $data)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
    }
    public function getSupplierById($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        return $this->db->get('supplier')->row_array();
    }
    public function get_data()
    {

        return $this->db->get('supplier');
    }
    public function getJumlahAntrian()
    {
        $tanggal = date('Y-m-d'); // Mendapatkan tanggal terbaru (tanggal sekarang)

        $this->db->select('COUNT(*) as total_antrian');
        $this->db->from('antrian');
        $this->db->where('antrian.tanggal_antrian', $tanggal);

        $query = $this->db->get();
        $result = $query->row();

        return $result->total_antrian;
    }
    public function getAntrianSekarang()
    {
        $this->db->select_max('nomor_antrian');
        $this->db->where('status_antrian', 'MASUK');
        $query = $this->db->get('antrian');
        $row = $query->row();
        return $row->nomor_antrian;
    }

    public function getAntrianSelanjutnya()
    {
        $this->db->select_min('nomor_antrian');
        $this->db->where('status_antrian', 'menunggu');
        $query = $this->db->get('antrian');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nomor_antrian;
        } else {
            return 0; // Tampilkan nol jika tidak ada data dengan status "menunggu"
        }
    }
    public function getAllAdmin()
    {
        return $this->db->get('admin')->result();
    }
    public function get_admin_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('admin')->row_array();
    }

   
}