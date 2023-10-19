<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Antrian_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function ambil_nomor_antrian($tanggal)
  {
    $this->db->where('tanggal_antrian', $tanggal);
    $this->db->from('antrian');
    $jumlah_supplier = $this->db->count_all_results() + 1;
    $query = $this->db->select('id_supplier')->order_by('id_supplier', "desc")->limit(1)->get('supplier');
    $row = $query->row();
    $id_supplier = $row->id_supplier;
    $data = array(
      'id_supplier' => $id_supplier,
      'nomor_antrian' => $jumlah_supplier,
      'tanggal_antrian' => $tanggal
    );

    $this->db->insert('antrian', $data);

    return $jumlah_supplier;
  }
  
  public function get_status_antrian_by_nomor($nomor_antrian) {
    $this->db->where('nomor_antrian', $nomor_antrian);
    $this->db->order_by('id_antrian', 'DESC'); // Mengurutkan berdasarkan ID secara menurun
    $this->db->limit(1); // Hanya mengambil 1 baris (data terbaru saja)

    $query = $this->db->get('antrian');
    return $query->row(); // Menggunakan row() karena mengambil 1 baris data
}
  
}